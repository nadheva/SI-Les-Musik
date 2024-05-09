<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = [
        'judul',
        'level_id',
        'alat_musik_id',
        'deskripsi',
        'modul',
        'header',
        'status',
        'expired_date',
        'created_by',
        'updated_by'
    ];


    public function level(){
        return $this->belongsTo(level::class);
    }

    public function alat_musik()
    {
        return $this->belongsTo(AlatMusik::class);
    }
}