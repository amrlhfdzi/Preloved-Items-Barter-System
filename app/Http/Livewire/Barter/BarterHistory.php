<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Barter;
use App\Models\BarterPeople;
use App\Models\Rating;

class BarterHistory extends Component
{

    public $selectedBarter;
    public $productId;
    public $rating;
    public $ratings;

    
    public function render()
    {
        $barters = Barter::query()
    ->whereIn('barterPeople_id', $this->selectedBarter->pluck('id'))
    ->with('user', 'category', 'barterPeople', 'barterPeople.product')
    ->get();

    
        // Fetch all ratings based on the authenticated user's ID
        $this->ratings = Rating::where('user_id', auth()->id())->get();

    
        return view('livewire.barter.barter-history', [
            'barters' => $barters,
        ]);
    }

    public function mount()
    {
        $this->selectedBarter = BarterPeople::query()
            ->where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->get();
    }

    public function viewDetails($barterId)
{
    return redirect('barterHistory/' . $barterId)->with('selectedHistory', $barterId);
}

// public function add(Request $request, $productId)
// {
//     // $ratingValue = $request->input('product_rating');
//     $userId = auth()->id();

//     // Perform database insertion logic to save the rating
//     // Example code assuming you have a "Rating" model:
//     Rating::create([
//         'user_id' => $userId,
//         'product_id' => $productId,
//         'rating' => $this->rating,
//     ]);

//     // Reset the input values after submission
    

//     return redirect()->back()->with('status', "Product rated completed");
// }

public function add($productId, $receiverId)
{
    return redirect('productRate/' . $productId . '/' . $receiverId )->with('selectedProduct', $productId)->with('selectedReceiver', $receiverId);
}

public function adds($barterId, $senderId)
{
    return redirect('productRates/' . $barterId . '/' . $senderId )->with('selectedBarter', $barterId)->with('selectedSender', $senderId);
}


public function viewRate($ratingId)
{
    return redirect('viewRating/' . $ratingId)->with('selectedRating', $ratingId);
}

public function viewRates($ratingId)
{
    return redirect('viewRatings/' . $ratingId)->with('selectedRating', $ratingId);
}




// public function viewRate($ratingId)
// {
//     return redirect()->route('viewRating', ['ratingId' => $ratingId]);
// }




    
}
