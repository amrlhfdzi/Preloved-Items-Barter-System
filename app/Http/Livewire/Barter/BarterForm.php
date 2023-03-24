<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Category;

class BarterForm extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.barter.barter-form');
    }
}
