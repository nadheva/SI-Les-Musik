<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'lulusan',
        'tahun_lulus',
        'alat_musik_id',
        'grade',
        'deskripsi',
        'foto',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
