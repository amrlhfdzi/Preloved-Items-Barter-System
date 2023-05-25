<div class="col-md-8">
    @if(count($barters) > 0)
        @foreach($barters as $barter)
            @if($barter->status === 'pending' && auth()->id() === $barter->barterPeople->receiver_id)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title"><strong>Product Name:</strong> {{ $barter->name }}</h5>
                                <div class="row">
                                    @foreach($barter->barterImages as $images)
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" alt="{{ $barter->name }}" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="d-flex justify-content-center">
                                    <h5 class="card-title"><strong>Exchange With</strong></h5>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="card-title"><strong>Product Name:</strong> {{ $barter->barterPeople->product->name }}</h5>
                                <div class="row">
                                    @foreach($barter->barterPeople->product->productImages as $images)
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset($images->image) }}" alt="{{ $barter->name }}" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <form wire:submit.prevent="viewDetails({{ $barter->id }})">
                                <button type="submit" class="btn btn-primary">View Details</button>
                            </form>
                            <div class="d-flex justify-content-end mt-3">
                                <form wire:submit.prevent="approveBarter({{ $barter->id }})">
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                                <form wire:submit.prevent="rejectBarter({{ $barter->id }})">
                                    <button type="submit" class="btn btn-danger ml-2">Reject</button>
                                </form>
                            </div>
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
