<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Notifications\ProductNotification;
use App\Models\Barter;
use App\Models\User;
use App\Models\BarterPeople;
use Illuminate\Support\Facades\Notification;

class BarterApprove extends Component
{

    public $selectedBarter;
    public $productId;


    public function mount()
    {
        $this->selectedBarter = BarterPeople::query()
            ->where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->get();
    }



    public function render()
    {
        $barters = Barter::query()
    ->whereIn('barterPeople_id', $this->selectedBarter->pluck('id'))
    ->with('user', 'category', 'barterPeople', 'barterPeople.product')
    ->get();

    
        return view('livewire.barter.barter-approve', [
            'barters' => $barters,
        ]);
    }



public function approveBarter($barter_id)
    {
        $barter = Barter::findOrFail($barter_id);
        $barter->update(['status' => 'accepted']);

        $senderId = $barter->user_id; // Assuming `user_id` is the column name for the sender's ID in the `barters` table

        $message = 'Your barter request has been approved.';
        $sender = User::find($senderId);
    
        Notification::send($sender, new ProductNotification($message, $senderId));
        
        // return redirect()->route('admin.userApproval')->withMessage('User approved successfully');
        return redirect('approvals')->with('message','Barter approved successfully');
    }

    public function rejectBarter($barter_id)
    {
        $barter = Barter::findOrFail($barter_id);
        $barter->update(['status' => 'rejected']);

        
        $senderId = $barter->user_id; // Assuming `user_id` is the column name for the sender's ID in the `barters` table

        $message = 'Your barter request has been rejected.';
        $sender = User::find($senderId);
    
        Notification::send($sender, new ProductNotification($message, $senderId));
        
        // return redirect()->route('admin.userApproval')->withMessage('User approved successfully');
        return redirect('approvals')->with('message','Barter reject successfully');
    }

    public function viewDetails($barterId)
    {
        return redirect('barterHistory/' . $barterId)->with('selectedHistory', $barterId);
    }



    


}
