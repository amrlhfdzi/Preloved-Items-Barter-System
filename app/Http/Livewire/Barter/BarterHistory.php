<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Barter;
use App\Models\BarterPeople;

class BarterHistory extends Component
{

    public $selectedBarter;
    public $productId;

    
    public function render()
    {
        $barters = Barter::query()
    ->whereIn('barterPeople_id', $this->selectedBarter->pluck('id'))
    ->with('user', 'category', 'barterPeople', 'barterPeople.product')
    ->get();

    
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

}
