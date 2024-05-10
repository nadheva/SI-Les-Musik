<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'user_id',
        'nama_depan',
        'nama_belakang',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'email',
        'instagram',
        'nama_ortu',
        'pekerjaan_ortu',
        'alat_musik_dimiliki',
        'foto'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
