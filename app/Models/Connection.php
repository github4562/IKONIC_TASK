<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'connection_id',
        'status',
    ];

    public function sendUser()
    {
        return $this->belongsTo(User::class, 'connection_id');
    }
    public function receivedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
