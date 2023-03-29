<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BarterPeople;
use App\Models\Category;
use App\Models\BarterImage;

class Barter extends Model
{
    use HasFactory;

    protected $table = 'barters';

    protected $fillable = [
        
        'name',
        'description',
        'category_id',
        'quantity',
        'condition',
        'status',
        'barterPeople_id',
        'user_id',


    ];

    public function barterPeople()
    {
        return $this->belongsTo(BarterPeople::class, 'barterPeople_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function barterImages(){
        return $this->hasMany(BarterImage::class, 'barter_id', 'id');
    }

    public function receive()
    {
        return $this->belongsTo(User::class);
    }
}
