<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Rating;
use App\Models\Barter;

class ProductRatingNew extends Component
{
    public $rating;
    public $selectedBarter;
    public $comment;
    public $selectedSender;

   

    public function mount($selectedBarter,$selectedSender)
    {
        $this->selectedBarter= $selectedBarter;
        $this->selectedSender= $selectedSender;
    }

    public function render()
{
    // Retrieve the product details based on the selectedProduct ID
    $barter = Barter::find($this->selectedBarter);

    $sender = Barter::find($this->selectedSender);

    

    return view('livewire.product.product-rating-new', [
        'barterId' => $this->selectedBarter,
        'barter' => $barter,
        'SenderId' => $this->selectedSender,
        'sender' => $sender,
        
    ]);
}


   

    public function addRatings($barterId,$senderId)
    {
        $userId = auth()->id();

        // Perform database insertion logic to save the rating
        Rating::create([
            'user_id' => $userId,
            'barter_id' => $barterId,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'receiver_id' => $senderId,
        ]);

        

        return redirect('history')->with('message', "Product rated completed");
    }

   
}
