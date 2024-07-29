<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\AlatMusik;
use App\Models\Studio;
use Illuminate\Support\Facades\Auth;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id == '1') {
            $studio = Studio::latest()->paginate(10);
            $alatmusik = AlatMusik::latest()->get();
            return view('admin.master.studio.index', compact('studio', 'alatmusik'));
        } else {
            Alert::warning('Info', 'Anda tidak diizinkan mengakses halaman tersebut!');
            return view('user.beranda.index');
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
                'nama' => 'required',
                'deskripsi' => 'required',
            ]);

            $image = array();
            if($file = $request->file('foto_detail')){
                foreach($file as $f){
                    $image_name = md5(rand(1000,10000));
                    $ext = $f->extension();
                    $image_full_name =  $image_name . '.' . $ext;
                    $upload_path = "storage/studio/studio_detail/".$image_full_name;
                    // $image_url = $uploade_path;
                    $f->storeAs('public/studio/studio_detail/', $image_full_name);
                    $image[] = $upload_path;
                    // $perangkat->gambar_detail = json_encode($image);
                }
            } else {
                $image_full_name = null;
            }

            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/studio/". $file_name;
                $request->foto->storeAs('public/studio', $file_name);
            } else {
                $file_name = null;
            }

            Studio::create([
                'nama' => $request->nama,
                'foto' => $txt,
                'foto_detail' => json_encode($image),
                'deskripsi' => $request->deskripsi,
                'alat_musik_id' => $request->alat_musik_id
            ]);

            Alert::success('Success', 'Studio berhasil ditambahakan!');
            return redirect()->route('studio.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('studio.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id1 = decrypt($id);
        $studio = Studio::where('id', $id1)->first();
        return view('admin.master.studio.view', compact('studio'));
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

            $studio = Studio::findOrfail($id);
            $studio->nama = $request->nama;
            $studio->deskripsi = $request->deskripsi;
            $studio->alat_musik_id = $request->alat_musik_id;
            $image = array();
            if($file = $request->file('foto_detail')){
                foreach($file as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = $file->extension();
                    $image_full_name =  $image_name . '.' . $ext;
                    $upload_path = "storage/studio/foto_detail/".$image_full_name;
                    // $image_url = $uploade_path;
                    $file->storeAs('public/studio/foto_detail/', $image_full_name);
                    $image[] = $upload_path;
                    $studio->foto_detail = json_encode($image);
                }
            } else {
                $image_full_name = null;
            }

            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/studio/". $file_name;
                $request->foto->storeAs('public/studio', $file_name);
                $studio->foto = $txt;
            } else {
                $file_name = null;
            }
            $studio->save;

            Alert::info('Success', 'Studio berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('studio.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Studio::find($id)->delete();
            Alert::warning('Success', 'Studio berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('studio.index');
          }
    }
}
