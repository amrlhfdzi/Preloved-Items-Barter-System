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
        $filteredProducts = $this->products;

        if ($this->newConditionInput) {
            $filteredProducts = $filteredProducts->where('condition', 'New');
        }
        
        if ($this->usedConditionInput) {
            $filteredProducts = $filteredProducts->where('condition', 'Used');
        }

        return view('livewire.product.category', [
            'products' => $filteredProducts,
            'category' => $this->category
        ]);
    }
}
