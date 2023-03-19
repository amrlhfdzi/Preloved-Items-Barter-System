<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Barter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
    'name',
    'slug',
    'description',
    'image',
    'meta_title',
    'meta_keyword',
    'meta_description',
    'status',

    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function barters(){
        return $this->hasMany(Barter::class, 'category_id', 'id');
    }
}
