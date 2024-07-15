<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resepsionis extends Model
{
    use HasFactory;
    protected $table = 'resepsionis';
    protected $fillable = [
        'nama',
        'foto',
        'email',
        'no_telp',
        'deskripsi',
        'user_id'

    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
