<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Profile;
use App\Models\Resepsionis;
use App\Models\Course;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id == 1) {
        $reservasi = Reservasi::latest()->paginate(10);
        // $profile = Profile::where('user_id', $reservasi->user_id)->first();
        return view('admin.reservasi.index', compact('reservasi'));
        } elseif(Auth::user()->role_id == 2) {
        $reservasi = Reservasi::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.reservasi.index', compact('reservasi'));
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
        // $user = Auth::user();
        // $profil = Profile::where('user_id', $user->id)->first();
        // if(is_null($profil) && $user->role_id == '2'){
        //     return redirect()->route('profil.create')
        //     ->with('danger', 'Anda belum menambahkan data profil!');
        // } else {
        try {
            $request->validate([
                'catatan' => 'required',
            ]);

            Reservasi::create([
                'course_id' => $request->course_id,
                'user_id' => Auth::user()->id,
                'resepsionis_id' => 1,
                // 'resepsionis_id' => Resepsionis::select('id')->inRandomOrder()->first(),
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
        $id1 = decrypt($id);
        $reservasi = Reservasi::where('id', $id1)->first();
        return view('admin.reservasi.view', compact('reservasi'));
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

    public function approve(Request $request, string $id)
    {
        try {

            $reservasi = Reservasi::findOrfail($id);
            $reservasi->nama_approver = Auth::user()->name;
            $reservasi->tgl_approve = new DateTime('now');
            $reservasi->proses = 'Disetujui';
            $reservasi->save;

            $payment = new PaymentController();
            $payment->store($reservasi->id);

            // return route('payment.store', $reservasi->id)
            Alert::info('Success', 'Reservasi berhasil disetujui!');
          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return route('reservasi.store', $reservasi->id);
          }
    }

    public function reject(Request $request, string $id)
    {
        try {

            $reservasi = Reservasi::findOrfail($id);
            $reservasi->nama_approver = Auth::user()->name;
            $reservasi->tgl_approve = new DateTime('now');
            $reservasi->proses = 'Ditolak';
            $reservasi->save;

            Alert::info('Success', 'Reservasi berhasil ditolak!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('reservasi.index');
          }
    }
}
