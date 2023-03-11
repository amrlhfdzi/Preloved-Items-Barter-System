<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\User;


class Conversation extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class);
    }
}
