<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\User;
use App\Models\Role;
use App\Models\AlatMusik;
use App\Models\Reservasi;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       if (Auth::user()->role_id == '1') {
        $siswa_aktif= DB::table('payment')
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
            'periode.tgl_awal_pembelajaran as tgl_join')
            ->get();

        $siswa_tdk_aktif= DB::table('payment')
            ->join('reservasi', 'reservasi.id', '=', 'payment.reservasi_id')
            ->join('course', 'course.id', '=', 'reservasi.course_id')
            ->join('periode', 'periode.id', '=', 'course.periode_id')
            ->join('level', 'level.id', '=', 'course.level_id')
            ->join('users', 'users.id', '=', 'payment.user_id')
            ->join('profile', 'profile.user_id', '=', 'users.id')
            ->where('payment.status', '=', 'success')
            ->where('periode.tgl_akhir_ujian', '<', Carbon::now())
            ->select('profile.nama_depan as nama_depan', 'profile.nama_belakang as nama_belakang',
            'course.judul as judul_course', 'level.nama as level', 'course.harga as harga', 'periode.nama_periode as periode',
            'periode.tgl_awal_pembelajaran as tgl_join')
            ->get();
        return view('admin.laporan.index', compact('siswa_aktif', 'siswa_tdk_aktif'));
        }
        else if(Auth::user()->role_id == '2') {
            $user = Auth::user();
            if(isset($user->profile)){
                $course_aktif= DB::table('payment')
                ->join('reservasi', 'reservasi.id', '=', 'payment.reservasi_id')
                ->join('course', 'course.id', '=', 'reservasi.course_id')
                ->join('periode', 'periode.id', '=', 'course.periode_id')
                ->join('level', 'level.id', '=', 'course.level_id')
                ->join('users', 'users.id', '=', 'payment.user_id')
                ->join('profile', 'profile.user_id', '=', 'users.id')
                ->where('payment.status', '=', 'success')
                ->where('periode.tgl_akhir_ujian', '>=', Carbon::now())
                ->where('users.id', '=', Auth::user()->id)
                ->select('profile.nama_depan as nama_depan', 'profile.nama_belakang as nama_belakang',
                'course.judul as judul_course', 'level.nama as level', 'course.harga as harga', 'periode.nama_periode as periode',
                'periode.tgl_awal_pembelajaran as tgl_join')
                ->get();

            $course_tdk_aktif= DB::table('payment')
                ->join('reservasi', 'reservasi.id', '=', 'payment.reservasi_id')
                ->join('course', 'course.id', '=', 'reservasi.course_id')
                ->join('periode', 'periode.id', '=', 'course.periode_id')
                ->join('level', 'level.id', '=', 'course.level_id')
                ->join('users', 'users.id', '=', 'payment.user_id')
                ->join('profile', 'profile.user_id', '=', 'users.id')
                ->where('payment.status', '=', 'success')
                ->where('periode.tgl_akhir_ujian', '<', Carbon::now())
                ->where('users.id', '=', Auth::user()->id)
                ->select('profile.nama_depan as nama_depan', 'profile.nama_belakang as nama_belakang',
                'course.judul as judul_course', 'level.nama as level', 'course.harga as harga', 'periode.nama_periode as periode',
                'periode.tgl_awal_pembelajaran as tgl_join')
                ->get();
            return view('user.laporan.index', compact('course_aktif', 'course_tdk_aktif'));
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
}
