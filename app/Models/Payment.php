<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'invoice',
        'status',
        'snap_token',
        'grand_total',
        'reservasi_id'
    ];

    public function reservasi(){
        return $this->belongsTo(Reservasi::class);
    }
}
