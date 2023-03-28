<div class="col-md-8">
      @if(count($barters) > 0)
        @foreach($barters as $barter)
        @if($barter->status === 'pending' && auth()->id() === $barter->barterPeople->receiver_id)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Product Name:</strong>{{ $barter->name }}</h5>
                        <p class="card-text"><strong>Description:</strong>{{ $barter->description }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $barter->category->name }}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{ $barter->quantity }}</p>
                        <p class="card-text"><strong>Condition:</strong> {{ $barter->condition }}</p>
                        <p class="card-text"><strong>Owner:</strong> {{ $barter->user->name }}</p>
                     <div class="d-flex justify-content-end">
                        <form wire:submit.prevent="approveBarter({{ $barter->id }})">
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </form>
                        <form wire:submit.prevent="rejectBarter({{ $barter->id }})">
                            <button type="submit" class="btn btn-danger ml-2">Reject</button>
                        </form>
                     </div>
                    </div>
                </div>
        @endif
        @endforeach
     @else
            <div class="alert alert-info" role="alert">
                You have no pending barters at the moment.
            </div>
@endif
                
    
    
</div>
