<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::latest()->paginate(10);
        return view('user.reservasi.index', compact('reservasi'));
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
                'catatan' => 'required',
                'proses' => 'required',
            ]);

            Reservasi::create([
                'course_id' => $request->course_id,
                'user_id' => Auth::user()->id,
                'resepsionis_id' => $request->resepsionis_id,
                'proses' => 'Dalam Proses',
                'catatan' => $request->catatan,
                'grand_total' => $request->grand_total
            ]);

            Alert::success('Success', 'Reservasi berhasil ditambahakan!');
            return redirect()->route('reservasi.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('reservasi.index');
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
