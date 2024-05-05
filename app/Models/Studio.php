<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    protected $table = 'studio';
    protected $fillable = [
        'nama',
        'foto',
        'foto_detail',
        'deskripsi',
        'alat_musik_id'
    ];

    public function alatmusik()
    {
        return $this->belongsTo(AlatMusik::class);
    }
}
