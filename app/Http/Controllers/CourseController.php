<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\AlatMusik;
use App\Models\Level;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Periode;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id == 1) {
        $course = Course::latest()->paginate(10);
        $alatmusik = AlatMusik::get();
        $level = Level::get();
        $periode = Periode::latest()->get();
        return view('admin.course.index', compact('course', 'alatmusik', 'level', 'periode'));
        }
        elseif(Auth::user()->role_id == 2) {
            $course = Course::where('status', '=', '1')->latest()->paginate(10);
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
                'periode_id' => 'required',
                'harga' => 'required',
            ]);

            $data_exist = Course::where('periode_id', '=', $request->periode_id)
            ->where('alat_musik_id', '=', $request->alat_musik_id)
            ->where('level_id', '=', $request->level_id)
            ->first();

            $periode_input = Periode::where('id', '=', $request->periode_id)->select('tgl_awal_pendaftaran');
            $data_period = DB::table('course')
                            ->join('periode', 'course.periode_id', '=', 'periode.id')
                            ->where('course.alat_musik_id', '=', $request->alat_musik_id)
                            ->where('course.level_id', '=', $request->level_id)
                            ->where('periode.tgl_akhir_ujian', '<=', $periode_input)
                            ->get();

            if($data_exist){
                Alert::info('Info', 'Course sudah pernah ditambahakan, silahkan cek kembali!');
                return redirect()->back();
            }
            else if(count($data_period) > 0){
                Alert::info('Info', 'Periode Course berdekatan dengan course sebelumnya yang masih aktif, silahkan cek kembali!');
                return redirect()->back();
            }

            else {

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
                'periode_id' => $request->periode_id,
                'created_by' => Auth::user()->name
            ]);

            Alert::success('Success', 'Course berhasil ditambahakan!');
            return redirect()->route('course.index');
        }
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
        if(Auth::user()->role_id == 2) {
        $id1 = decrypt($id);
        $course = Course::where('alat_musik_id', $id1)->where('status', '=', '1')->get();
        return view('user.course.list', compact('course'));
        } else {
            $id = decrypt($id);
            $course = Course::where('alat_musik_id',$id)->get();
            return view('admin.course.list', compact('course'));
        }
    }

    public function view(string $id)
    {
        if(Auth::user()->role_id == 2) {
            if(isset(Auth::user()->profile)) {
            $id1 = decrypt($id);
            $course = Course::where('id', $id1)->first();
            $profile = Profile::where('user_id', Auth::user()->id)->first();
            return view('user.course.view', compact('course', 'profile'));
            } else {
                Alert::warning('Info', 'Silahkan lengkapi profile terlebih dahulu!');
                return redirect()->back();
            }
        } else {
            $id1 = decrypt($id);
            $course = Course::where('id', $id1)->first();
            return view('admin.course.view', compact('course'));
        }
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
            $course->periode_id = $request->periode_id;
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
