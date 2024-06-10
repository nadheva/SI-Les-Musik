<?php

namespace App\Http\Controllers;
use App\Models\Resepsionis;
use App\Models\User;
use App\Models\Role;
use App\Models\AlatMusik;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resepsionis = Resepsionis::latest()->get();
        return view('admin.master.resepsionis.index', compact('resepsionis'));
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
                'deskripsi' => 'required',
                'password' => 'required',
            ]);
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => '4'
            ]);

            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/resepsionis/". $file_name;
                $request->foto->storeAs('public/resepsionis', $file_name);
            } else {
                $file_name = null;
            }

            $resepsionis = Resepsionis::create([
                        'nama' => $request->nama,
                        'email' => $request->email,
                        'no_telp' => $request->no_telp,
                        'deskripsi' => $request->deskripsi,
                        'foto' => $txt,
                        'user_id' => $user->id,
                    ]);

            Alert::success('Success', 'Resepsionis berhasil ditambahakan!');
            return redirect()->route('resepsionis.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::info('Error', $e->getMessage());
            return redirect()->route('resepsionis.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id1 = decrypt($id);
        $resepsionis = Resepsionis::where('id', $id1)->first();
        return view('admin.master.resepsionis.view', compact('resepsionis'));
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

            $resepsionis = Resepsionis::findOrfail($id);
            $resepsionis->nama = $request->nama;
            $resepsionis->no_telp = $request->no_telp;
            $resepsionis->deskripsi = $request->deskripsi;
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/resepsionis/". $file_name;
                $request->foto->storeAs('public/resepsionis', $file_name);
                $resepsionis->foto = $txt;
            } else {
                $file_name = null;
            }
            $resepsionis->save;

            Alert::info('Success', 'Resepsionis berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('resepsionis.index');
          }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user_id = Resepsionis::where('id', $id)->first()->user_id;
            User::where('id', $user_id)->delete();
            Resepsionis::where('id', $id)->delete();
            Alert::warning('Success', 'Resepsionis berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('resepsionis.index');
          }
    }
}
