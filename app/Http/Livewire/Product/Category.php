<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Barter;

class Category extends Component
{
    public $products, $category, $newConditionInput = false, $usedConditionInput = false;
  

    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }

    public function render()
    {
        $this->products = $this->getProducts();

        $barters = Barter::all();


        return view('livewire.product.category', [
            'products' =>  $this->products,
            'category' => $this->category,
            'barters' => $barters,
        ]);
    }

    public function getProducts()
    {
        $user = auth()->user();
    
        return Product::where('category_id', $this->category->id)
            ->where('user_id', '!=', $user->id)
            ->when($this->newConditionInput, function ($query) {
                return $query->where('condition', 'New');
            })
            ->when($this->usedConditionInput, function ($query) {
                return $query->where('condition', 'Used');
            })
            ->get();
    }
    

    
}
