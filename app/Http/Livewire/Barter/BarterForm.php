<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Category;
use App\Models\BarterPeople;
use App\Http\Requests\BarterFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; 

class BarterForm extends Component
{

    use WithFileUploads;

    
    public $name;
    public $description;
    public $category_id;
    public $quantity;
    public $condition;
    public $image;
    public $selectedBarter;

    

    
    public $categories;
    // public $selectedBarter;
    // public $category_id;


    public function mount()
{
    $this->categories = Category::all();

    if (session()->has('selectedBarter')){
        return $this->selectedBarter = session('selectedBarter');
    }

    $this->selectedBarter = BarterPeople::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->first();
   

}



    public function render()
    {
        return view('livewire.barter.barter-form');
    }

    public function store(Request $request)
    {

        $category = Category::findOrFail($this->category_id);



        $barterData = [
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'quantity' => $this->quantity,
            'condition' => $this->condition,
            'barterPeople_id' =>  $this->selectedBarter->id,
            'user_id' => Auth::id(),
        ];

        $barter = $category->barters()->create($barterData);

        if ($this->image) {
            foreach ($this->image as $imageFile) {
                $uploadPath = 'uploads/products/';
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $imageFile->storeAs($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $barter->barterImages()->create([
                    'barter_id' => $barter->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        

        return redirect('category/{category_slug}/{product_name}')->with('message','Product Barter Succesfully');

        

        // return $product->id;

    }
}
