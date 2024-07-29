<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\AlatMusik;
use Illuminate\Support\Facades\Auth;

class AlatMusikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id == '1') {
            $alatmusik = AlatMusik::latest()->paginate(10);
            return view('admin.master.alat-musik.index', compact('alatmusik'));
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

            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/alat_musik/". $file_name;
                $request->foto->storeAs('public/alat_musik', $file_name);
            } else {
                $file_name = null;
            }

            AlatMusik::create([
                'nama' => $request->nama,
                'foto' => $txt,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::success('Success', 'Alat Musik berhasil ditambahakan!');
            return redirect()->route('alat-musik.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('alat-musik.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {        // $sewa_perangkat = SewaPerangkat::where('id',$id)->first();
        $id1 = decrypt($id);
        $alatmusik = AlatMusik::where('id', $id1)->first();
        return view('admin.master.alat-musik.view', compact('alatmusik'));
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
            $alatmusik = AlatMusik::findOrfail($id);
            $alatmusik->nama = $request->nama;
            $alatmusik->deskripsi = $request->deskripsi;
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/alat_musik/". $file_name;
                $request->foto->storeAs('public/alat_musik', $file_name);
                $alatmusik->foto = $txt;
            } else {
                $file_name = null;
            }
            $alatmusik->save;

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
            AlatMusik::find($id)->delete();
            Alert::warning('Success', 'Alat musik berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('alat-musik.index');
          }
    }
}
