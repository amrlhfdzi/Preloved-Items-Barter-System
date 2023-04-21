<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Category;
use App\Models\BarterPeople;
use App\Http\Requests\BarterFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; 
use App\Models\Product;

class BarterExistingForm extends Component
{

    public $name;
    public $description;
    public $category_id;
    public $quantity;
    public $condition;
    public $image = [];
    public $selectedBarter;
    public $receive_id;
    public $barterPeopleId;
    
    
    public $categories;
    public $selectedProduct;
    public $userProducts;

    
    public function render()
    {

        $barterPeople = BarterPeople::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->get();

        return view('livewire.barter.barter-existing-form', [
            'barterPeople' => $barterPeople
        ]);
        
        // return view('livewire.barter.barter-existing-form');
    }

    public function mount()
    {
        $this->categories = Category::all();

    if (session()->has('selectedBarter')){
        return $this->selectedBarter = session('selectedBarter');
    }

    $this->selectedBarter = BarterPeople::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->first();
   
        // $this->selectedProduct = request('selectedProduct');
        $this->userProducts = auth()->user()->products;
    }

    public function updatedSelectedProduct($value)
{
    $selectedProduct = auth()->user()->products()->find($value);

    if ($selectedProduct) {
        $this->selectedProductDetails = $selectedProduct;
        $this->name = $selectedProduct->name;
        $this->description = $selectedProduct->description;
        $this->category_id = $selectedProduct->category_id;
        $this->quantity = $selectedProduct->quantity;
        $this->condition = $selectedProduct->condition;
    } else {
        $this->selectedProductDetails = null;
        $this->name = '';
        $this->description = '';
        $this->quantity = '';
        $this->condition = '';
    }
}

public function storeListing(Request $request)
{
    $selectedProduct = $this->selectedProductDetails;
    $category = Category::findOrFail($this->category_id);

    $barterData = [
        'name' => $this->name,
        'description' => $this->description,
        'category_id' => $this->category_id,
        'quantity' => $this->quantity,
        'condition' => $this->condition,
        'barterPeople_id' => $this->selectedBarter->id,
        'user_id' => auth()->id(),
    ];

    $barter = $category->barters()->create($barterData);

    if ($selectedProduct) {
        foreach ($selectedProduct->productImages as $image) {
            $barter->barterImages()->create([
                'barter_id' => $barter->id,
                'image' => $image->image,
            ]);
        }
    }

    // $barter->image = $request->image->store('public/images');
    $barter->save();

    return redirect('bartersDetailsExisting')->with('message', 'Product Barter Successfully');
}


// public function storeListing(Request $request)
// {
//     $selectedProduct = $this->selectedProductDetails;
//     $category = Category::findOrFail($this->category_id);

//     $barterData = [
//         'name' => $this->name,
//         'description' => $this->description,
//         'category_id' => $this->category_id,
//         // 'category_id' => $this->category,
//         'quantity' => $this->quantity,
//         'condition' => $this->condition,
//         'barterPeople_id' => $this->selectedBarter->id,
//         'user_id' => auth()->id(),
//     ];

//     $barter = $category->barters()->create($barterData);

//     if ($selectedProduct) {
//         foreach ($selectedProduct->productImages as $image) {
//             $barter->barterImages()->create([
//                 'barter_id' => $barter->id,
//                 'image' => $image->image,
//             ]);
//         }
//     }

//     return redirect('bartersDetailsExisting')->with('message', 'Product Barter Successfully');
// }




//     public function storeListing(Request $request)
// {
//     $selectedProduct = auth()->user()->products()->find($this->selectedProduct);
//     $category = Category::findOrFail($this->category_id);

//     $barterData = [
//         'name' => $selectedProduct->name,
//         'description' => $selectedProduct->description,
//         'category_id' => $this->category_id,
//         'quantity' => $selectedProduct->quantity,
//         'condition' => $selectedProduct->condition,
//         'barterPeople_id' => $this->selectedBarter->id,
//         'user_id' => auth()->id(),
//     ];

//     $barter = $category->barters()->create($barterData);

//     foreach ($selectedProduct->productImages as $image) {
//         $barter->barterImages()->create([
//             'barter_id' => $barter->id,
//             'image' => $image->image,
//         ]);
//     }

//     // $selectedProduct->delete();

//     return redirect('bartersDetailsExisting')->with('message', 'Product Barter Successfully');
// }


    // public function mount()
    // {
    //     $this->categories = Category::all();
    
    //     if (session()->has('selectedBarter')){
    //         return $this->selectedBarter = session('selectedBarter');
    //     }
    
    //     $this->selectedBarter = BarterPeople::query()
    //         ->where('sender_id', auth()->id())
    //         ->orWhere('receiver_id', auth()->id())
    //         ->first();
       
    // }

    // public function render()
    // {
    //     $barterPeople = BarterPeople::query()
    //     ->where('sender_id', auth()->id())
    //     ->orWhere('receiver_id', auth()->id())
    //     ->get();
        
    //     return view('livewire.barter.barter-existing-form', [
    //         'barterPeople' => $barterPeople
    //     ]);
    // }
}
