<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Barter;
use App\Models\BarterPeople;


class BarterHistoryDetails extends Component
{
    public $selectedHistory;
    

    public function mount($selectedHistory)
    {
        $this->selectedHistory = $selectedHistory;
    }
    
    public function render()
    {
        $barters = Barter::with('barterPeople.product.productImages', 'barterPeople.receiver')
            ->find($this->selectedHistory);

        return view('livewire.barter.barter-history-details', [
            'barters' => $barters,
        ]);
    }

   
}
