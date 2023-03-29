<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Barter;
use App\Models\BarterPeople;

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
        
        // return redirect()->route('admin.userApproval')->withMessage('User approved successfully');
        return redirect('approval')->with('message','Barter approved successfully');
    }

    public function rejectBarter($barter_id)
    {
        $barter = Barter::findOrFail($barter_id);
        $barter->update(['status' => 'rejected']);
        
        // return redirect()->route('admin.userApproval')->withMessage('User approved successfully');
        return redirect('approval')->with('message','Barter reject successfully');
    }



    


}
