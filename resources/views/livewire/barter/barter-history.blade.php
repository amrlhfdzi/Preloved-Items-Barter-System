<div class="col-md-8">
  @if(count($barters) > 0)
    @foreach($barters as $barter)
      @if(auth()->id() === $barter->user_id)
        <div class="card mb-8">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <h5 class="card-title"><strong>Product Name:</strong> {{ $barter->name }}</h5>
                <div class="row">
                  @foreach($barter->barterImages as $images)
                    <div class="col-md-3 mb-3">
                      <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" alt="{{ $barter->name }}" class="img-fluid">
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
                      <img src="{{ asset($images->image) }}" alt="{{ $barter->name }}" class="img-fluid">
                    </div>
                  @endforeach
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
              <form wire:submit.prevent="viewDetails({{ $barter->id }})">
                <button type="submit" class="btn btn-primary mr-2">View Details</button>
              </form>

              <div class="d-flex justify-content-end mt-3">
                @if(auth()->id() === $barter->user_id && $barter->status === 'pending')
                  <button type="button" class="btn btn-secondary">Pending</button>
                @elseif (auth()->id() === $barter->user_id && $barter->status === 'accepted')
                  <button type="submit" class="btn btn-success">Accepted</button>

                  @php
                    $userRating = \App\Models\Rating::where('user_id', auth()->id())
                      ->where('product_id', $barter->barterPeople->product->id)
                      ->first();
                  @endphp

                  @if ($userRating)
                    <form wire:submit.prevent="viewRate({{ $userRating->id }})">
                      <button type="submit" class="btn btn-primary mr-2">View Rating</button>
                    </form>
                  @else
                    <form wire:submit.prevent="add({{ $barter->barterPeople->product->id }}, {{ $barter->barterPeople->receiver->id }})">
                      <button type="submit" class="btn btn-primary mr-2">Rate Product</button>
                    </form>
                  @endif
                @elseif(auth()->id() === $barter->user_id && $barter->status === 'rejected')
                  <button type="submit" class="btn btn-danger">Rejected</button>
                @endif
              </div>
            </div>
          </div>
        </div>
      @elseif(auth()->id() === $barter->barterPeople->receiver_id)
        <div class="card mb-8">
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
                <button type="submit" class="btn btn-primary mr-2">View Details</button>
              </form>

              <div class="d-flex justify-content-end mt-3">
                @if(auth()->id() === $barter->barterPeople->receiver_id && $barter->status === 'pending')
                  <button type="button" class="btn btn-secondary">Pending</button>
                @elseif(auth()->id() === $barter->barterPeople->receiver_id && $barter->status === 'accepted')
                  <button type="submit" class="btn btn-success">Accepted</button>

                  @php
                    $userRating = \App\Models\Rating::where('user_id', auth()->id())
                      ->where('barter_id', $barter->id)
                      ->first();
                  @endphp

                  @if ($userRating)
                    <form wire:submit.prevent="viewRates({{ $userRating->id }})">
                      <button type="submit" class="btn btn-primary mr-2">View Rating</button>
                    </form>
                  @else
                    <form wire:submit.prevent="adds({{ $barter->id }}, {{ $barter->barterPeople->sender->id }})">
                      <button type="submit" class="btn btn-primary mr-2">Rate Product</button>
                    </form>
                  @endif
                @elseif(auth()->id() === $barter->barterPeople->receiver_id && $barter->status === 'rejected')
                  <button type="submit" class="btn btn-danger">Rejected</button>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach

    @else
      <div class="alert alert-info" role="alert">
        You have no barter history at the moment.
      </div>
    @endif
</div>
