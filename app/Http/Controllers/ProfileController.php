<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Profile;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index()
     {
        $user = Auth::user();
        $profil = Profile::where('user_id', $user->id)->first();
        return view('user.profile.index', compact('profil'));
     }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'tgl_lahir' => 'required',
                'nik' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
                'kota' => 'required',
                'grade' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required',
            ]);
            $user = Auth::user();
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/profile/". $file_name;
                $request->foto->storeAs('public/profile', $file_name);
            } else {
                $file_name = null;
            }

            $profile = Profile::create([
                        'user_id'=> $user->id,
                        'nama_depan' => $request->nama_depan,
                        'nama_belakang' => $request->nama_belakang,
                        'tgl_lahir' => $request->tgl_lahir,
                        'nik' => $request->nik,
                        'no_telp' => $request->no_telp,
                        'foto' => $txt,
                        'alamat' => $request->alamat,
                        'kota' => $request->kota,
                        'provinsi' => $request->provinsi,
                        'kode_pos' => $request->kode_pos,
                    ]);

            Alert::success('Success', 'Profile berhasil ditambahakan!');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->back();
          }
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    public function update(Request $request, $id)
    {
        try {

            $profile = Profile::findOrfail($id);
            $profile->nama_depan = $request->nama_depan;
            $profile->nama_belakang = $request->nama_belakang;
            $profile->tgl_lahir = $request->tgl_lahir;
            $profile->nik = $request->nik;
            $profile->no_telp = $request->no_telp;
            $profile->alamat = $request->alamat;
            $profile->kota = $request->kota;
            $profile->provinsi = $request->provinsi;
            $profile->kode_pos = $request->kode_pos;
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/profile/". $file_name;
                $request->foto->storeAs('public/profile', $file_name);
                $profile->foto = $txt;
            } else {
                $file_name = null;
            }
            $profile->save;

            Alert::info('Success', 'Profile berhasil diperbarui!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('profile.view');
          }
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
