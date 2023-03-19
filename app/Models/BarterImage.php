<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarterImage extends Model
{
    use HasFactory;

    protected $table = 'barter_images';

    protected $fillable = [
        'barter_id',
        'image'
    ];


}
