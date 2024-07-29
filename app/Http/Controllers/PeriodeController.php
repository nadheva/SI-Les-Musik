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
                'kode' => 'required|min:4|max:4',
                'nama_periode' => 'required',
                'tgl_awal_pendaftaran' => 'required|date|before:tgl_akhir_pendaftaran',
                'tgl_akhir_pendaftaran' => 'required|date|after:tgl_awal_pendaftaran|before:tgl_awal_pembelajaran',
                'tgl_awal_pembelajaran' => 'required|date|after:tgl_akhir_pendaftaran|before:tgl_akhir_pembelajaran',
                'tgl_akhir_pembelajaran' => 'required|date|after:tgl_awal_pembelajaran|before:tgl_awal_ujian',
                'tgl_awal_ujian' => 'required|date|before:tgl_akhir_ujian|after:tgl_akhir_pembelajaran',
                'tgl_akhir_ujian' => 'required|date|after:tgl_awal_ujian|after:tgl_akhir_pembelajaran'
            ],
            [
                'tgl_awal_pendaftaran.required' => 'Tanggal awal pendaftaran wajib diisi!',
                'tgl_awal_pendaftaran.date' => 'Tanggal tidak valid!',
                'tgl_awal_pendaftaran.before' => 'Tanggal awal pendaftaran harus sebelum tanggal akhir pendaftaran!',

                'tgl_akhir_pendaftaran.required' => 'Tanggal akhir pendaftaran wajib diisi!',
                'tgl_akhir_pendaftaran.date' => 'Tanggal tidak valid!',
                'tgl_akhir_pendaftaran.after' => 'Tanggal akhir pendaftaran harus setelah tanggal awal pendaftaran!',
                'tgl_akhir_pendaftaran.before' => 'Tanggal akhir pendaftaran harus sebelum tanggal awal pembelajaran',

                'tgl_awal_pembelajaran.required' => 'Tanggal awal pembelajaran wajib diisi!',
                'tgl_awal_pembelajaran.date' => 'Tanggal tidak valid!',
                'tgl_awal_pembelajaran.after' => 'Tanggal awal pembelajaran harus setelah tanggal akhir pendaftaran!',
                'tgl_awal_pembelajaran.before' => 'Tanggal awal pembelajaran harus sebelum tanggal akhir pembelajaran',

                'tgl_akhir_pembelajaran.required' => 'Tanggal akhir pembelajaran wajib diisi!',
                'tgl_akhir_pembelajaran.date' => 'Tanggal tidak valid!',
                'tgl_akhir_pembelajaran.after' => 'Tanggal akhir pembelajaran harus setelah tanggal awal pendaftaran!',
                'tgl_akhir_pembelajaran.before' => 'Tanggal akhir pembelajaran harus sebelum tanggal awal ujian',

                'tgl_awal_ujian.required' => 'Tanggal awal ujian wajib diisi!',
                'tgl_awal_ujian.date' => 'Tanggal tidak valid!',
                'tgl_awal_ujian.after' => 'Tanggal awal ujian harus setelah tanggal akhir pembelajaran!',
                'tgl_awal_ujian.before' => 'Tanggal awal ujian harus sebelum tanggal akhir ujian',

                'tgl_akhir_ujian.required' => 'Tanggal akhir ujian wajib diisi!',
                'tgl_akhir_ujian.date' => 'Tanggal tidak valid!',
                'tgl_akhir_ujian.after' => 'Tanggal akhir ujian harus setelah tanggal awal ujian!',
                'tgl_akhir_ujian.before' => 'Tanggal akhir ujian harus setelah tanggal akhir pembelajaran!',
            ]);

            $periode_check = Periode::Where('status', '=', 1)
                                    ->Where('tgl_awal_pendaftaran', '>=', $request->tgl_akhir_ujian)
                                    ->orWhere('tgl_akhir_ujian', '<=', $request->tgl_awal_pendaftaran)
                                    ->get();

            if(count($periode_check) > 0) {
                Alert::info('Info', 'Periode tidak valid, silahkan cek kembali!');
                return redirect()->back();
            }else {

            Periode::create([
                'kode' => $request->kode,
                'nama_periode' => $request->nama_periode,
                'tgl_awal_pendaftaran' => $request->tgl_awal_pendaftaran,
                'tgl_akhir_pendaftaran' => $request->tgl_akhir_pendaftaran,
                'tgl_awal_pembelajaran' => $request->tgl_awal_pembelajaran,
                'tgl_akhir_pembelajaran' => $request->tgl_akhir_pembelajaran,
                'tgl_awal_ujian' => $request->tgl_awal_ujian,
                'tgl_akhir_ujian' => $request->tgl_akhir_ujian,
                'status' => '1',
            ]);

            Alert::success('Success', 'Periode berhasil ditambahakan!');
            return redirect()->route('periode.index');
        }
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
