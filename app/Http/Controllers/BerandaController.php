<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\NotificationLog;
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
        return view('admin.beranda.index');
        }
        else if(Auth::user()->role_id == '2') {
            $user = Auth::user();
            if(isset($user->profile)){
            Alert::success('Welcome', 'Selamat datang di dashboard user!');
            return view('user.beranda.index');
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
