<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use PHPUnit\Event\Code\Throwable;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::latest()->get();
        return view('admin.administrator.role.index', compact('role'));
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
                'role' => 'required|unique:role',
                'fungsi' => 'required'
            ]);

            Role::create([
                'role' => $request->role,
                'fungsi' => $request->fungsi
            ]);

            Alert::success('Success', 'Role berhasil ditambahakan!');
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('role.index');
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
            // $request->validate([
            //     'role' => 'required|unique:role',
            //     'fungsi' => 'required'
            // ]);

            $role = Role::findOrfail($id);
            $role->role = $request->role;
            $role->fungsi = $request->fungsi;
            $role->save;

            Alert::info('Success', 'Role berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('role.index');
          }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Role::find($id)->delete();
            Alert::warning('Success', 'Role berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('role.index');
          }
    }
}
