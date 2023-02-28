<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Category extends Component
{
    public $products, $category;

    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.product.category', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
