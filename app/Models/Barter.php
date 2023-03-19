<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
