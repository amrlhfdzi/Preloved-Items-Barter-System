<form wire:submit.prevent="addRating({{ $selectedProduct }}, {{ $selectedReceiver }})" action="#">
    @csrf
    

    <h3>Rate the Product</h3>
    <h4>{{ $product->name }}</h4>

    
        @foreach ($product->productImages as $itemImg)
            <img src="{{ asset($itemImg->image)}}" alt="Product Image" width="200">
        @endforeach
    

    <div class="rating-css">
        <div class="star-icon">
            <input type="radio" value="1" wire:model="rating" id="rating1">
            <label for="rating1" class="fa fa-star"></label>
            <input type="radio" value="2" wire:model="rating" id="rating2">
            <label for="rating2" class="fa fa-star"></label>
            <input type="radio" value="3" wire:model="rating" id="rating3">
            <label for="rating3" class="fa fa-star"></label>
            <input type="radio" value="4" wire:model="rating" id="rating4">
            <label for="rating4" class="fa fa-star"></label>
            <input type="radio" value="5" wire:model="rating" id="rating5">
            <label for="rating5" class="fa fa-star"></label>
        </div>
    </div>

    <div>
        <label for="comment">Review:</label>
        <textarea wire:model="comment" name="comment" rows="4" class="form-control"></textarea>
    </div>

    <div class="text-center mt-3">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

