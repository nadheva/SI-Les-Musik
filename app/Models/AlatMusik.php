<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatMusik extends Model
{
    use HasFactory;
    protected $table = 'alatmusik';
    protected $fillable = [
        'nama',
        'foto',
        'deskripsi'
    ];

    public function course()
    {
        return $this->hasMany(Course::class, 'alat_musik_id', 'id');
        // return $this->belongsTo(Course::class);
    }
}
