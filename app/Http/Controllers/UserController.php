<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ViewErrorBag;
use App\Services\PayUService\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->get()->except(Auth::user()->id, 'id');
        $role = Role::get();
        return view('admin.administrator.user.index', compact('user', 'role'));
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
                'name' => 'required|max:255',
                'email' => 'required|unique:users',
                'password' => 'required'
            ]);

            User::create([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
                Alert::success('Success', 'User berhasil ditambahakan!');
                return redirect()->route('user.index');

          } catch (\Exception $e) {
              Alert::info('Error', $e->getMessage());
              return redirect()->route('user.index');
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
            //     'name' => 'required|max:255',
            //     'email' => 'required|unique:users',
            //     'password' => 'required'
            // ]);

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            Alert::info('Success', 'User berhasil diperbarui!');
            return redirect()->back();


          } catch (\Exception $e) {

            Alert::info('Error', $e->getMessage());
            return redirect()->route('user.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            User::find($id)->delete();
            Alert::warning('Success', 'User berhasil dihapus!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('user.index');
          }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            Alert::info('Warning', 'Password tidak cocok!');
            return redirect()->back();
        } else {
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            Alert::info('Success', 'Password berhasil diperbarui!');
            return redirect()->back();
        }
    }
}
