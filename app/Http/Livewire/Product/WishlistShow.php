<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{

    public function removeWishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->emit('wishlistAddedUpdated');
        session()->flash('message','Wishlist Item Removed Successfully');
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.product.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
}
