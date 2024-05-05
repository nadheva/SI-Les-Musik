<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::latest()->get();
        return view('admin.master.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
                'email' => 'required',
                'no_telp' => 'required',
                'lulusan' => 'required',
                'tahun_lulus' => 'required',
                'grade' => 'required',
                'deskripsi' => 'required',
                'password' => 'required',
            ]);

            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/guru/". $file_name;
                $request->foto->storeAs('public/foto', $file_name);
            } else {
                $file_name = null;
            }
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => '3'
            ]);

            $guru = Guru::create([
                        'nama' => $request->nama,
                        'email' => $request->email,
                        'no_telp' => $request->no_telp,
                        'lulusan' => $request->lulusan,
                        'tahun_lulus' => $request->tahun_lulus,
                        'kursus_id' => $request->kursus_id,
                        'grade' => $request->grade,
                        'deskripsi' => $request->deskripsi,
                        'foto' => $txt,
                        'user_id' => $user->id,
                    ]);

            Alert::success('Success', 'Guru berhasil ditambahakan!');
            return redirect()->route('guru.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('guru.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::where('id', $id)->first();
        return view('admin.master.guru.view', compact('guru'));
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

            $guru = Guru::findOrfail($id);
            $guru->nama = $request->nama;
            $guru->no_telp = $request->no_telp;
            $guru->lulusan = $request->lulusan;
            $guru->tahun_lulus = $request->tahun_lulus;
            $guru->kursus_id = $request->kursus_id;
            $guru->grade = $request->grade;
            $guru->deskripsi = $request->deskripsi;
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/guru/". $file_name;
                $request->foto->storeAs('public/guru', $file_name);
                $guru->foto = $txt;
            } else {
                $file_name = null;
            }
            $guru->save;

            Alert::info('Success', 'Guru berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('guru.index');
          }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user_id = Guru::select('user_id')->where('id', $id)->get();
            User::where('id', $user_id)->delete();
            Guru::find($id)->delete();
            Alert::warning('Success', 'Guru berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('guru.index');
          }
    }
}
