<form wire:submit.prevent="addRatings({{ $selectedBarter }}, {{ $selectedSender }})" action="#">
    @csrf
    

    <h3>Rate the Product</h3>
    <h4>{{ $barter->name }}</h4>

    
        @foreach ($barter->barterImages as $images)
            <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" alt="Barter Image" width="200">
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

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
