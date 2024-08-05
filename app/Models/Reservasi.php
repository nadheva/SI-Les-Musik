<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = [
        'course_id',
        // 'resepsionis_id',
        'user_id',
        'nama_approver',
        'tgl_approve',
        'catatan',
        'proses',
        'grand_total'
    ];


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function resepsionis()
    {
        return $this->hasMany(Resepsionis::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Payment::class);
    }
}
