<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id == 1) {
            $periode = Periode::latest()->paginate(10);
            return view('admin.master.periode.index', compact('periode'));
        } else {
            Alert::info('Error', 'Maaf anda tidak diizinkan untuk mengakses halaman ini!');
            return redirect()->back();
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
                'kode' => 'required|min:4|max:4',
                'nama_periode' => 'required',
                'tgl_awal_pendaftaran' => 'required',
                'tgl_akhir_pendaftaran' => 'required',
                'tgl_awal_pembelajaran' => 'required',
                'tgl_akhir_pembelajaran' => 'required',
                'tgl_awal_ujian' => 'required',
                'tgl_akhir_ujian' => 'required',
                'status' => 'required',
            ]);

            Periode::create([
                'kode' => $request->kode,
                'nama_periode' => $request->nama_periode,
                'tgl_awal_pendaftaran' => $request->tgl_awal_pendaftaran,
                'tgl_akhir_pendaftaran' => $request->tgl_akhir_pendaftaran,
                'tgl_awal_pembelajaran' => $request->tgl_awal_pembelajaran,
                'tgl_akhir_pembelajaran' => $request->tgl_akhir_pembelajaran,
                'tgl_awal_pujian' => $request->tgl_awal_ujian,
                'tgl_akhir_ujian' => $request->tgl_akhir_ujian,
                'status' => '1',
            ]);

            Alert::success('Success', 'Periode berhasil ditambahakan!');
            return redirect()->route('periode.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('periode.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            $periode = Periode::findOrfail($id);
            $periode->kode = $request->kode;
            $periode->nama_periode= $request->nama_periode;
            $periode->tgl_awal_pendaftaran = $request->tgl_awal_pendaftaran;
            $periode->tgl_akhir_pendaftaran = $request->tgl_akhir_pendaftaran;
            $periode->tgl_awal_pembelajaran = $request->tgl_awal_pembelajaran;
            $periode->tgl_akhir_pembelajaran = $request->tgl_akhir_pembelajaran;
            $periode->tgl_awal_ujian = $request->tgl_awal_ujian;
            $periode->tgl_akhir_ujian = $request->tgl_akhir_ujian;
            $periode->status = $request->status;
            $periode->save;

            Alert::info('Success', 'Periode berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('periode.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Periode::find($id)->delete();
            Alert::warning('Success', 'Periode berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('periode.index');
          }
    }
}
