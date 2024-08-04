<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Models\Profile;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index(){

        if (Auth::user()->role_id == '2') {
            $profile = Profile::where('user_id', Auth::user()->id)->first();
            if(is_null($profile) && Auth::user()->role_id == '2'){
                return redirect()->route('profile.create')
                ->with('danger', 'Anda belum menambahkan data profil!');
            } else {
            return view('user.profile.index', compact('profile'));
            }
        }
        else {
            Alert::warning('Info', 'Anda tidak diizinkan mengakses halaman tersebut!');
            return view('admin.beranda.index');
        }
     }

     public function create()
     {
        return view('user.profile.create');
     }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'email' => 'required',
                'nama_ortu' => 'required',
                'pekerjaan_ortu' => 'required',
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
                        'tempat_lahir' => $request->tempat_lahir,
                        'tanggal_lahir' => $request->tanggal_lahir,
                        'alamat' => $request->alamat,
                        'no_telp' => $request->no_telp,
                        'email' => $user->email,
                        'instagram' => $request->instagram,
                        'nama_ortu' => $request->nama_ortu,
                        'pekerjaan_ortu' => $request->pekerjaan_ortu,
                        'alat_musik_dimiliki' => $request->alat_musik_dimiliki,
                        'foto' => $txt,
                    ]);

            Alert::success('Success', 'Profile berhasil ditambahakan!');
            // return redirect()->route('profile.show', encrypt($user->id));
            return redirect()->route('profile.index');
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

    public function show($id)
    {
    //    $id1 = Crypt::decrypt($id);
       $profile = Profile::findOrFail($id);
    //    $profile = Profile::findOrFail(Crypt::decrypt($id));
       if(is_null($profile)){
        Alert::warning('Info', 'Anda belum menambahkan data profil!');
        return redirect()->route('profile.create');
       } else {
       return view('user.profile.index', compact('profile'));
       }


    //    if (Auth::user()->role_id == '2') {
    //     $profile = Profile::where('user_id', Auth::user()->id)->first();
    //     if(is_null($profile) && Auth::user()->role_id == '2'){
    //         return redirect()->route('profile.create')
    //         ->with('danger', 'Anda belum menambahkan data profil!');
    //     } else {
    //     return view('user.profile.index', compact('profile'));
    //     }
    // }
    // else {
    //     Alert::warning('Info', 'Anda tidak diizinkan mengakses halaman tersebut!');
    //     return view('admin.beranda.index');
    // }
    }


    public function update(Request $request, string $id)
    {
        try {
            // $request->validate([
            //     'nama_depan' => 'required',
            //     'nama_belakang' => 'required',
            //     'tempat_lahir' => 'required',
            //     'tanggal_lahir' => 'required',
            //     'alamat' => 'required',
            //     'no_telp' => 'required',
            //     'nama_ortu' => 'required',
            //     'pekerjaan_ortu' => 'required',
            // ]);
            $profile = Profile::findOrFail($id);
            $profile->user_id = $request->user_id;
            $profile->nama_depan = $request->nama_depan;
            $profile->nama_belakang = $request->nama_belakang;
            $profile->tempat_lahir = $request->tempat_lahir;
            $profile->tanggal_lahir = $request->tanggal_lahir;
            $profile->alamat = $request->alamat;
            $profile->email = $request->email;
            $profile->no_telp = $request->no_telp;
            $profile->instagram = $request->instagram;
            $profile->nama_ortu = $request->nama_ortu;
            $profile->pekerjaan_ortu = $request->pekerjaan_ortu;
            $profile->alat_musik_dimiliki = $request->alat_musik_dimiliki;
            if (isset($request->foto)) {
                $extention = $request->foto->extension();
                $file_name = time() . '.' . $extention;
                $txt = "storage/profile/". $file_name;
                $request->foto->storeAs('public/profile', $file_name);
                $profile->foto = $txt;
            } else {
                $file_name = null;
            }
            $profile->save();

            Alert::info('Success', 'Profile berhasil diperbarui!');
            return redirect()->route('profile.show', $profile->id);

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->back();
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

    public function getProfile()
    {
        $profile_id = Profile::select('id')->where('user_id', '=', Auth::user()->id)->first();
        return $profile_id;
    }
}
