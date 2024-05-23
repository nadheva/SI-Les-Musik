<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Profile;
use App\Models\Payment;
use App\Models\Course;
use Midtrans\Snap;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth')->except('notificationHandler');

        $this->request = $request;
        // Set midtrans configuration
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }

    public function index()
    {
        $user = Auth::user()->id;
        $profil = Profile::where('user_id', $user)->first();
        if(Auth::user()->role_id == 2) {
        $transaksi = Payment::where('user_id', $user)->get();
            if(is_null($profil)){
                return redirect()->route('profile.index')
                ->with('danger', 'Anda belum menambahkan data profil!');
            } else {
                return view('user.transaksi.index', compact('transaksi'));
            }
        } else {
            $transaksi = Payment::latest()->get();
            return view('admin.transaksi.index', compact('transaksi'));
        }
    }

    public function create($id)
    {
        $perangkat = Perangkat::where('id', $id)->first();
        return view('user.sewa-perangkat.sewa', compact('perangkat'));
    }

    public function pay($reservasi_id)
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
        // $id = $reservasi_id;
        DB::transaction(function() use($reservasi_id) {
        $length = 10;
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }

        $invoice =  'INV-'.Str::upper($random);
        $user = Auth::user()->id;
        $reservasi = Reservasi::where('id', '=', $reservasi_id)->first();


      $payment =  Payment::create([
            'invoice' => $invoice,
            'status' => 'pending',
            'grand_total' => $reservasi->grand_total,
            'user_id' => $reservasi->user_id,
            'reservasi_id' => $reservasi_id,
        ]);


        $payload = [
            'transaction_details' => [
                'order_id' => $payment->invoice,
                'gross_amount' => $payment->grand_total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ]
        ];

        //snap token
        $snapToken = Snap::getSnapToken($payload);
        $payment->snap_token = $snapToken;
        $payment->save();

        // $this->response['id'] = $sewa_perangkat;

        });
        // Alert::success('Success', 'Pembayaran berhasil ditambahkan!');
        // return redirect()->route('reservasi.index');

    }

    public function notificationHandler(Request $request)
    {
        $payload      = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . config('services.midtrans.serverKey'));

        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $transaction  = $notification->transaction_status;
        $type         = $notification->payment_type;
        $orderId      = $notification->order_id;
        $fraud        = $notification->fraud_status;

        //data tranaction
        $data_transaction = Payment::where('invoice', $orderId)->first();
        // $data_transaction1 = SewaStudio::where('invoice', $orderId)->first();
        // $data_transaction2 = Denda::where('invoice', $orderId)->first();

        if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {

                /**
                *   update invoice to pending
                */
                $data_transaction->update([
                    'status' => 'pending'
                ]);


              } else {

                /**
                *   update invoice to success
                */
                $data_transaction->update([
                    'status' => 'success'
                ]);


              }

            }

        } elseif ($transaction == 'settlement') {

            /**
            *   update invoice to success
            */
            $data_transaction->update([
                'status' => 'success'
            ]);



        } elseif($transaction == 'pending'){


            /**
            *   update invoice to pending
            */
            $data_transaction->update([
                'status' => 'pending'
            ]);



        } elseif ($transaction == ('failure')) {


            /**
            *   update invoice to failed
            */
            $data_transaction->update([
                'status' => 'failed'
            ]);


        } elseif ($transaction == 'expire') {


            /**
            *   update invoice to expired
            */
            $data_transaction->update([
                'status' => 'expired'
            ]);


        } elseif ($transaction == 'cancel') {

            /**
            *   update invoice to failed
            */
            $data_transaction->update([
                'status' => 'failed'
            ]);

        }

    }

    public function show($id)
    {
        // $sewa_perangkat = SewaPerangkat::where('id',$id)->first();
        $id1 = decrypt($id);
        $sewa_perangkat = SewaPerangkat::find($id1);
        return view('user.transaksi.show', compact('sewa_perangkat'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $sewa_perangkat = SewaPerangkat::findOrFail($id);
        $perangkat = Perangkat::get();
        $sewa_perangkat->update([
            'proses' => 'Dikembalikan'
        ]);

        foreach(Order::where('sewa_perangkat_id', $id)->get() as $order) {
          $perangkat->where('id', $order->perangkat->id);
          foreach (Perangkat::where('id', $order->perangkat->id)->get() as $i)
          $i->stok = $i->stok + $order->jumlah;
          $i->save();
        }
        Alert::info('Info', 'Sewa Perangkat VR berhasil dikembalikan!');
        return redirect()->route('pengembalian-perangkat');
    }

    public function destroy($id)
    {
        SewaPerangkat::find($id)->delete();
        Alert::warning('Warning', 'Sewa Perangkat VR berhasil dihapus!');
        return redirect()->back();
    }


}
