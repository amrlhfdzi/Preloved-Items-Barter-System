<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Barter;
use App\Models\BarterPeople;

class BarterApprove extends Component
{

    public $selectedBarter;

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
        ->whereHas('barterPeople', function($query) {
            $query->where('receiver_id', auth()->id());
        })
        ->with('user', 'category')
        ->get();

    return view('livewire.barter.barter-approve', [
        'barters' => $barters,
    ]);
}



    


}
