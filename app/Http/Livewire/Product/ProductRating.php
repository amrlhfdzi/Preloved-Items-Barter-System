<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Notifications\ProductNotification;
use App\Models\Rating;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


class ProductRating extends Component
{

    public $rating;
    public $selectedProduct;
    public $comment;
    public $selectedReceiver;

   

    public function mount($selectedProduct,$selectedReceiver)
    {
        $this->selectedProduct= $selectedProduct;
        $this->selectedReceiver= $selectedReceiver;
    }

    public function render()
{
    // Retrieve the product details based on the selectedProduct ID
    $product = Product::find($this->selectedProduct);

    $receiver = Product::find($this->selectedReceiver);

    

    return view('livewire.product.product-rating', [
        'productId' => $this->selectedProduct,
        'product' => $product,
        'receiverId' => $this->selectedReceiver,
        'receiver' => $receiver,
        
    ]);
}


   

    public function addRating($productId,$receiverId)
    {
        $userId = auth()->id();

        $senderId = $receiverId; // Assuming `user_id` is the column name for the sender's ID in the `barters` table

        $message = 'Your product have been rated.';
        $sender = User::find($senderId);
    
        Notification::send($sender, new ProductNotification($message, $senderId));
        

        // Perform database insertion logic to save the rating
        Rating::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'receiver_id' => $receiverId,
        ]);

        

        return redirect('history')->with('message', "Product rated completed");
    }

}
