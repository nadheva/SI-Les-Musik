<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id == '1') {
            Alert::success('Welcome', 'Selamat datang di dashboard admin!');
        return view('dashboard');
        }
        else if(Auth::user()->role_id == '2') {
            $user = Auth::user();
            if(isset($user->profile)){
            Alert::success('Welcome', 'Selamat datang di dashboard user!');
            return view('dashboard');
            }
            else {
                Alert::warning('Warning', 'Anda belum mengisi profil, silahkan isi profil anda terlebih dahulu!');
                return redirect()->route('profile.create');
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
