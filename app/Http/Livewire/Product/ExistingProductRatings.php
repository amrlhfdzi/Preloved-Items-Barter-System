<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Rating;

class ExistingProductRatings extends Component
{

    public $selectedRating;

    public function mount($selectedRating)
    {
        $this->selectedRating= $selectedRating;
    }

    public function render()
{
    // Retrieve the product details based on the selectedProduct ID
    $rating = Rating::find($this->selectedRating);

    return view('livewire.product.existing-product-ratings', [
        'ratingId' => $this->selectedRating,
        'rating' => $rating,
    ]);
}


   
}
