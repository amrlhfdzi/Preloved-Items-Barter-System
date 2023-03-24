<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BarterPeople;
use App\Models\Category;

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
        return $this->belongsTo(BarterPeople::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
