<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\AlatMusik;
use App\Models\Level;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id == 1) {
        $course = Course::orderBy('expired_date', 'desc')->paginate(10);
        $alatmusik = AlatMusik::get();
        $level = Level::get();
        return view('admin.course.index', compact('course', 'alatmusik', 'level'));
        }
        elseif(Auth::user()->role_id == 2) {
            $course = Course::where('status', '=', '1')->orderBy('expired_date', 'desc')->paginate(10);
            $alatmusik = AlatMusik::get();
            return view('user.course.index', compact('course', 'alatmusik'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required',
                'level_id' => 'required',
                'alat_musik_id' => 'required',
                'deskripsi' => 'required',
                'modul' => 'required',
                'header' => 'required',
                'expired_date' => 'required',
                'harga' => 'required',
            ]);

            if($modul = $request->file('modul')) {
                $new_modul_name = rand() . '.' . $modul->getClientOriginalExtension();
                $file_modul = "storage/modul/". $new_modul_name;
                $modul->storeAs('public_/modul', $new_modul_name);
            } else {
                $new_modul_name = null;
            }

            if (isset($request->header)) {
                $extention = $request->header->extension();
                $file_name = time() . '.' . $extention;
                $header = "storage/course/header". $file_name;
                $request->header->storeAs('public/course/header', $file_name);
            } else {
                $file_name = null;
            }
            Course::create([
                'judul' => $request->judul,
                'level_id' => $request->level_id,
                'alat_musik_id' => $request->alat_musik_id,
                'deskripsi' => $request->deskripsi,
                'modul' => $file_modul,
                'header' => $header,
                'status' => '1',
                'harga' => $request->harga,
                'expired_date' => $request->expired_date,
                'created_by' => Auth::user()->name
            ]);

            Alert::success('Success', 'Course berhasil ditambahakan!');
            return redirect()->route('course.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('course.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id1 = decrypt($id);
        $course = Course::findOrFail($id1);
        return view('admin.course.view', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $course = Course::findOrfail($id);
            $course->judul = $request->judul;
            $course->level_id= $request->level_id;
            $course->alat_musik_id = $request->alat_musik_id;
            $course->deskripsi = $request->deskripsi;
            $course->status = $request->status;
            $course->harga = $request->harga;
            $course->expired_date = $request->expired_date;
            $course->updated_by = Auth::user()->name;

            if($modul = $request->file('modul')) {
                $new_modul_name = rand() . '.' . $modul->getClientOriginalExtension();
                $file_modul = "storage/modul/". $new_modul_name;
                $modul->storeAs('public_/modul', $new_modul_name);
                $course->modul = $file_modul;
            } else {
                $new_modul_name = null;
            }

            if (isset($request->header)) {
                $extention = $request->header->extension();
                $file_name = time() . '.' . $extention;
                $header = "storage/course/header". $file_name;
                $request->header->storeAs('public/course/header', $file_name);
                $course->header = $header;
            } else {
                $file_name = null;
            }
            $course->save;

            Alert::info('Success', 'Alat Musik berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('alat-musik.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Course::find($id)->delete();
            Alert::warning('Success', 'Course berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('course.index');
          }
    }

    public function download_modul($id)
    {
        try {
            $modul = Course::select('modul')->where('id', $id)->first();
            Storage::download($modul);
            Alert::success('Success', 'Modul berhasil diunduh!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('course.index');
          }
    }
}
