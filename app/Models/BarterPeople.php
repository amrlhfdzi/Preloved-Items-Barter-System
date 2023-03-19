<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barter;
use App\Models\User;

class BarterPeople extends Model
{
    use HasFactory;
    public $table="barter_people";

    public function barters()
    {
        return $this->hasMany(Barter::class);
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
