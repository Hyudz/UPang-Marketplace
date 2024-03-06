<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'message_type',
        'user_id'
    ];

    public function sender()
    {
        return $this->belongsTo(user_table::class);
    }

    public function receiver()
    {
        return $this->belongsTo(user_table::class);
    }

    public function user()
    {
        return $this->belongsTo(user_table::class);
    }
}
