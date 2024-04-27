<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $fillable = [
        'reservasi_id',
        'user_id',
        'invoice',
        'status',
        'snap_token',
        'grand_total'
    ];

    public function reservasi(){
        return $this->belongsTo(Reservasi::class);
    }
}
