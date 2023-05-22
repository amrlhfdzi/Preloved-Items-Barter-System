<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\ProductImage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        $user = Auth::user();
        $notifications = $user->notifications()->latest()->get();
        $notificationCount = $user->unreadNotifications->count();

        return view('productsView', compact('products', 'notifications', 'notificationCount'));
        
    }

    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        $notifications = $user->notifications()->latest()->get();
        $notificationCount = $user->unreadNotifications->count();
        return view('products',compact('categories', 'notifications', 'notificationCount'));
    }

    public function store(ProductFormRequest $request)
    {

        

        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'tags' => json_encode($validatedData['tags']),
            'quantity' => $validatedData['quantity'],
            'condition' => $validatedData['condition'],
            'user_id' => auth()->user()->id,
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

    public function view()
    {
        return view('productsView');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        $user = Auth::user();
        $notifications = $user->notifications()->latest()->get();
        $notificationCount = $user->unreadNotifications->count();
        
        return view('editProduct', compact('categories','product','notifications', 'notificationCount'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                          ->products()->where('id',$product_id)->first();
        if($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'tags' => $validatedData['tags'],
                'quantity' => $validatedData['quantity'],
                'condition' => $validatedData['condition'],
                'user_id' => auth()->user()->id,
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
    
            
    
            return redirect('view')->with('message','Product Updated Succesfully');
        }
        else
        {
            return redirect('view')->with('message','No Such Product Id Found');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('message','Product Image Deleted');

    }

    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product Deleted');
    }

    public function productView(string $category_slug, string $product_name)
    {
        $category = Category::where('slug',$category_slug)->first();

        $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
        if($category){
            $product = $category->products()->with('user')->where('name',$product_name)->first();
    
            if($product){
                $uploaded_by = $product->user->name;
                return view('productDetails',compact('product','category','uploaded_by','notifications', 'notificationCount'));
            }
        }
    
        return redirect()->back();
    }
    public function products($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        $user = Auth::user();
        $notifications = $user->notifications()->latest()->get();
        $notificationCount = $user->unreadNotifications->count();

        if($category){

            $products = $category->products()->get();
            return view('productsCategory',compact('products','category','notifications', 'notificationCount'));
        }else{
            return redirect()->back();
        }
    }



    // public function show()
    // {
    //     $data = Product::paginate(10);

    //     return view('home',['products'=>$data]);
    // }

    // public function show()
    // {
    //     $products = Product::paginate(10);

    //     return view('home',compact('products'));
    // }


    //

    public function searchProducts(Request $request)
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();

    if ($request->search) {
        $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tags', 'LIKE', '%' . $request->search . '%')
            ->latest()->paginate(15);
        return view('search', compact('searchProducts','notifications', 'notificationCount'));
    } else {
        return redirect()->back()->with('message', 'Empty Search');
    }
}

// public function showUserProducts($userId)
// {
//     $products = Product::where('user_id', $userId)->get();
//     return view('userProductPage')->with('products', $products);
// }

// public function showUserProducts($userId)
// {
//     $products = Product::where('user_id', $userId)->get();
//     return view('userProductPage', compact('products'));
// }



// public function showUserProducts($id)
// {
//     $user = User::findOrFail($id);
//     $products = $user->products;

//     return view('userProductPage', compact('products', 'user'));
// }


// public function showUserProducts($username)
// {
//     $user = User::where('username', $username)->firstOrFail();
//     $products = $user->products;

//     return view('userProductPage', compact('products', 'user'));
// }


// public function barterStart()
//     {
//         return view('barterDetails');
//     }

    
}
