<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periode';
    protected $fillable = [
        'kode',
        'nama_periode',
        'tgl_awal_pendaftaran',
        'tgl_akhir_pendaftaran',
        'tgl_awal_pembelajaran',
        'tgl_akhir_pembelajaran',
        'tgl_awal_ujian',
        'tgl_akhir_ujian',
        'status'
    ];
}
