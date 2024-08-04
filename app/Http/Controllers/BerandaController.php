<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Payment;
use App\Models\Course;
use App\Models\Reservasi;
use App\Models\NotificationLog;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id == '1') {
            $reservasi = Reservasi::where('proses', '=', 'Dalam Proses')->get();
            $transaksi = Payment::where('status', '=', 'success')->get();
            $course = Course::latest()->get();
            $notification = NotificationLog::where('approver_role_id', '=', 1 )->where('is_read', '=', '0')->latest()->take(5)->get();
            $siswa_aktif= DB::table('payment')
            ->join('reservasi', 'reservasi.id', '=', 'payment.reservasi_id')
            ->join('course', 'course.id', '=', 'reservasi.course_id')
            ->join('periode', 'periode.id', '=', 'course.periode_id')
            ->join('level', 'level.id', '=', 'course.level_id')
            ->join('users', 'users.id', '=', 'payment.user_id')
            ->join('profile', 'profile.user_id', '=', 'users.id')
            ->where('payment.status', '=', 'success')
            ->where('periode.tgl_akhir_ujian', '>=', Carbon::now())
            ->count();
            $data_siswa_aktif= DB::table('payment')
            ->join('reservasi', 'reservasi.id', '=', 'payment.reservasi_id')
            ->join('course', 'course.id', '=', 'reservasi.course_id')
            ->join('periode', 'periode.id', '=', 'course.periode_id')
            ->join('level', 'level.id', '=', 'course.level_id')
            ->join('users', 'users.id', '=', 'payment.user_id')
            ->join('profile', 'profile.user_id', '=', 'users.id')
            ->where('payment.status', '=', 'success')
            ->where('periode.tgl_akhir_ujian', '>=', Carbon::now())
            ->select('profile.nama_depan as nama_depan', 'profile.nama_belakang as nama_belakang',
            'course.judul as judul_course', 'level.nama as level', 'course.harga as harga', 'periode.nama_periode as periode',
            'periode.tgl_akhir_ujian as tgl_left', 'periode.nama_periode as nama_periode')
            ->get();
            Alert::success('Welcome', 'Selamat datang di dashboard admin!');
        return view('admin.beranda.index', compact('reservasi', 'transaksi', 'course', 'notification', 'siswa_aktif', 'data_siswa_aktif'));
        }
        else if(Auth::user()->role_id == '2') {
            $user = Auth::user();
            if(isset($user->profile)){
            $reservasi = Reservasi::where('user_id', '=', Auth::user()->id)->get();
            $transaksi = Payment::where('user_id', '=', Auth::user()->id)->get();
            $course = Course::where('status', '=', '1')->latest()->get();
            $notification = NotificationLog::where('user_receiver_id', '=', Auth::user()->id)->latest()->take(5)->get();
            $course_aktif= DB::table('payment')
            ->join('reservasi', 'reservasi.id', '=', 'payment.reservasi_id')
            ->join('course', 'course.id', '=', 'reservasi.course_id')
            ->join('periode', 'periode.id', '=', 'course.periode_id')
            ->join('level', 'level.id', '=', 'course.level_id')
            ->join('users', 'users.id', '=', 'payment.user_id')
            ->join('profile', 'profile.user_id', '=', 'users.id')
            ->where('payment.status', '=', 'success')
            ->where('periode.tgl_akhir_ujian', '>=', Carbon::now())
            ->where('users.id', '=', Auth::user()->id)->count();
            Alert::success('Welcome', 'Selamat datang di dashboard user!');
            return view('user.beranda.index', compact('reservasi', 'notification', 'transaksi', 'course_aktif', 'course'));
            }
            else {
                Alert::info('Info', 'Silahkan isi profil anda terlebih dahulu!');
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

    public function notification_approver()
    {
        return NotificationLog::where('approver_role_id', '=', 1 )->where('is_read', '=', '0')->latest()->paginate(3);
    }

    public function notification_user()
    {
        return NotificationLog::where('user_receiver_id', '=', Auth::user()->id)->where('is_read', '=', '0')->latest()->paginate(3);
    }

    public function read_notification_approver()
    {
        DB::table('notification_log')->where('approver_role_id', '=', 1 )->where('is_read', '=', '0')
        ->update(['is_read' => 1]);
        Alert::success('Success', 'Notifikasi telah dibaca!');
        return redirect()->back();
    }

    public function read_notification_user()
    {
        DB::table('notification_log')->where('user_receiver_id', '=', Auth::user()->id)->where('is_read', '=', '0')
        ->update(['is_read' => 1]);
        Alert::success('Success', 'Notifikasi telah dibaca!');
        return redirect()->back();
    }

}
