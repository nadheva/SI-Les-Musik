<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = Level::latest()->paginate(10);
        return view('admin.master.level.index', compact('level'));
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


            Level::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::success('Success', 'Level berhasil ditambahakan!');
            return redirect()->route('level.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('level.index');
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id1 = decrypt($id);
        $level = Level::where('id', $id1)->first();
        return view('admin.master.level.view', compact('level'));
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
            $level = Level::findOrfail($id);
            $level->nama = $request->nama;
            $level->deskripsi = $request->deskripsi;
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/alat_musik/". $file_name;
                $request->foto->storeAs('public/alat_musik', $file_name);
                $level->foto = $txt;
            } else {
                $file_name = null;
            }
            $level->save;

            Alert::info('Success', 'Level berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('level.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Level::find($id)->delete();
            Alert::warning('Success', 'Level berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('level.index');
          }
    }
}
