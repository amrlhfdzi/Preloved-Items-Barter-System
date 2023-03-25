<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Conversation;
use App\Models\BarterPeople;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public $category, $product;
    public $productId;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already added to wishlist');
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Wishlist Added successfully');
            }

        }
        else{
            session()->flash('message','Please Login to continue');
            return false;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product.view',[
        'category' => $this->category,
        'product' => $this->product
        ]);
    }

    public function startConversation($userId)
    {
        $conversation = Conversation::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $userId,
        ]);

        return redirect('messages')->with('selectedConversation', $conversation);
    }

    // public function startBarter()
    // {
    //     return redirect('barters');

    // }

    public function startBarter($userId, $productId)
{
    $barterPeople = BarterPeople::firstOrCreate([
        'sender_id' => auth()->id(),
        'receiver_id' => $userId,
        'product_id' => $productId,
    ]);

    return redirect('barters')->with('selectedBarter', $barterPeople);
}


    
    
}