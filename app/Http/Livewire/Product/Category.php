<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

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

        return view('livewire.product.category', [
            'products' =>  $this->products,
            'category' => $this->category
        ]);
    }

    public function getProducts()
    {
        return Product::where('category_id', $this->category->id)
            ->when($this->newConditionInput, function ($query) {
                return $query->where('condition', 'New');
            })
            ->when($this->usedConditionInput, function ($query) {
                return $query->where('condition', 'Used');
            })
            ->get();
    }

    
}
