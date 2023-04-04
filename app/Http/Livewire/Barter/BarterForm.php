<?php

namespace App\Http\Livewire\Barter;

use Livewire\Component;
use App\Models\Category;
use App\Models\BarterPeople;
use App\Http\Requests\BarterFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; 
use App\Models\Product;

class BarterForm extends Component
{

    use WithFileUploads;

    
    public $name;
    public $description;
    public $category_id;
    public $quantity;
    public $condition;
    public $image = [];
    public $selectedBarter;
    public $receive_id;
    public $barterPeopleId;
    
    
    public $categories;
    public $selectedProduct;
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

        $barterPeople = BarterPeople::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->get();

        return view('livewire.barter.barter-form', [
            'barterPeople' => $barterPeople
        ]);
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

        if(isset($this->image)){
            $i = 1;
            foreach ($this->image as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $finalImagePathName = $imageFile->storeAs('public/uploads/barters', $filename);
                $barter->barterImages()->create([
                    'barter_id' => $barter->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        

        

        return redirect('barters')->with('message','Product Barter Successfully');



        

        // return $product->id;

    }

}
