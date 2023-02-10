<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{

    public function index()
    {
        return view('products');
    }

    public function create()
    {
        $categories = Category::all();
        return view('products',compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'tags' => $validatedData['tags'],
            'quantity' => $validatedData['quantity'],
            'condition' => $validatedData['condition'],
            'request' => $validatedData['request'],

        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            $i = 1;

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('create')->with('message','Product Added Succesfully');

        

        // return $product->id;

    }
    //
}
