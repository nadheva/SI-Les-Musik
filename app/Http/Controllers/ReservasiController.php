<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Profile;
use App\Models\Resepsionis;
use App\Models\Course;
use App\Models\NotificationLog;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentMail;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id == 1) {
        $reservasi = Reservasi::latest()->paginate(10);
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
        try {
            $request->validate([
                'catatan' => 'required',
            ]);
            $user_id =

           $reservasi =     Reservasi::create([
                            'course_id' => $request->course_id,
                            'user_id' => Auth::user()->id,
                            // 'resepsionis_id' => null,
                            // 'resepsionis_id' => Resepsionis::select('id')->inRandomOrder()->first(),
                            'proses' => 'Dalam Proses',
                            'catatan' => $request->catatan,
                            'grand_total' => $request->grand_total
                        ]);

            NotificationLog::create([
                'reservasi_id' => $reservasi->id,
                'user_create_id' => Auth::user()->id,
                'approver_role_id' => '1',
                'user_receiver_id' => null,
                'message' => "Reservasi course {$reservasi->course->judul} oleh {$reservasi->user->name} butuh approval, Silahkan menuju halaman reservasi untuk melakukan proses approval"
            ]);

            Alert::success('Success', 'Reservasi berhasil ditambahakan!');
            return redirect()->route('reservasi.index');
        } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->back();
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

            $reservasi = Reservasi::find($id);
            $transaksi= new TransaksiController();
            $transaksi->pay($reservasi->id);
            // Mail::to($reservasi->user->email)->send(new PaymentMail([
            //     'title' => 'Tagihan Pembayaran Sekolah Musik',
            //     'body' => 'The Body',
            // ]));
            $reservasi->nama_approver = Auth::user()->name;
            $reservasi->tgl_approve = \Carbon\Carbon::now();
            $reservasi->proses = 'Disetujui';
            $reservasi->save();

            NotificationLog::create([
                'reservasi_id' => $reservasi->id,
                'user_create_id' => Auth::user()->id,
                'approver_role_id' => null,
                'user_receiver_id' => $reservasi->user->id,
                'message' => "Reservasi {$reservasi->course->judul} telah disetujui, Silahkan menuju halaman transaksi dan melakukan pembayaran transaksi",
            ]);
            Alert::info('Success', 'Reservasi berhasil disetujui!');
            return redirect()->route('reservasi.index');
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
            $reservasi->tgl_approve = \Carbon\Carbon::now();
            $reservasi->proses = 'Ditolak';
            $reservasi->save;

            NotificationLog::create([
                'reservasi_id' => $reservasi->id,
                'user_id' => $reservasi->user_id,
                'message' => 'Reservasi ditolak, silahkan hubungi resepsionis dan majukan reservasi kembali',
                'is_read' => 0
            ]);
            Alert::info('Success', 'Reservasi berhasil ditolak!');
            return redirect()->back();

          } catch (\Exception $e) {
            Alert::info('Error', $e->getMessage());
            return redirect()->route('reservasi.index');
          }
    }
}
