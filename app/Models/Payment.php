<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'invoice',
        'status',
        'snap_token',
        'grand_total',
        'reservasi_id',
        'user_id'
    ];

    public function reservasi(){
        return $this->belongsTo(Reservasi::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function user(){
    // return  $user = DB::table('users')
    //             ->join('reservasi', 'users.id', '=', 'reservasi.user_id')
    //             ->join('payment', 'reservasi.id', '=', 'payment.reservasi_id')
    //             ->select('users.*')
    //             ->get();
    // }
}
