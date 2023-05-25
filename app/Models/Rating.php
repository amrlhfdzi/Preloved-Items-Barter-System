<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Barter;


class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        'receiver_id',
        'barter_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barter()
    {
        return $this->belongsTo(Barter::class);
    }

}
