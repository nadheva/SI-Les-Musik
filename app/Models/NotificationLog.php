<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
    use HasFactory;
    protected $table = 'notification_log';
    protected $fillable = [
        'reservasi_id',
        'user_create_id',
        'approver_role_id',
        'user_receiver_id',
        'message',
        'is_read'
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);

    }
}
