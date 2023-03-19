<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\BarterFormRequest;

class BarterController extends Controller
{

    public function barterStart($userId)
    {
        $categories = Category::all();
        return view('barterDetails', compact('categories'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('barter')
    // }
    //

    public function store(BarterFormRequest $request, $userId)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $barter = $category->barters()->create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $userId,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'quantity' => $validatedData['quantity'],
            'condition' => $validatedData['condition'],
            
            

        ]);

        return $barter->id;
    }
}
