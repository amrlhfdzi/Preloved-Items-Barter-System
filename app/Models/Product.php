<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\BarterPeople;
use App\Models\Barter;
use App\Models\Rating;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'tags',
        'quantity',
        'condition',
        'user_id',
        'request',

    ];



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barterPeople()
    {
        return $this->hasMany(BarterPeople::class, 'product_id', 'id');
    }

    public function barters()
    {
    return $this->hasManyThrough(Barter::class, BarterPeople::class, 'product_id', 'barterPeople_id');
    }  

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    
}
