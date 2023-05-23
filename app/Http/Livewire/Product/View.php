<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Conversation;
use App\Models\BarterPeople;
use App\Models\User;
use App\Models\Product;
use App\Models\Barter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class View extends Component
{

    public $category, $product;
    public $productId;

    public $userProducts;
    public $selectedProduct;

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

        // $this->userProducts = auth()->user()->products;

    }

    public function render()
    {
        $barters = Barter::all();

        return view('livewire.product.view',[
        'category' => $this->category,
        'product' => $this->product,
        'barters' => $barters
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
        $product = Product::findOrFail($productId);

        if ($product->barters()->where('status', 'accepted')->exists()) {
            return redirect('/redirect')->with('error', 'Product has already been bartered and cannot be bartered again.')->with('closeModal', true);

            
        }

        $barterPeople = BarterPeople::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $userId,
            'product_id' => $productId,
        ]);
    
            
            return redirect('barters')->with('selectedBarter', $barterPeople);
         
    }

    public function startBarterExisting($userId, $productId)
    {
        $product = Product::findOrFail($productId);

        // $selectedProduct = Product::findOrFail($selectedProductId);

        if ($product->barters()->where('status', 'accepted')->exists()) {
            return redirect('/redirect')->back()->with('error', 'Product has already been bartered and cannot be bartered again.');
        }

        $barterPeople = BarterPeople::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $userId,
            'product_id' => $productId,
        ]);
    
            
        return redirect('bartersDetailsExisting')->with('barterPeople', $barterPeople);

        // return redirect()->route('bartersDetailsExisting', [$barterPeople, $selectedProduct])->with('selectedBarter', $barterPeople)->with('selectedProduct', $selectedProduct);

         
    }
    


    
    
}
