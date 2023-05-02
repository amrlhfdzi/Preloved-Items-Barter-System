<div class="col-md-8">
  @if(count($barters) > 0)
    @foreach($barters as $barter)
@if(auth()->id() === $barter->user_id )
<div class="card mb-8">
<div class="card-body">
          <div class="row">
    <div class="col-md-4">
        <h5 class="card-title"><strong>Product Name:</strong>{{ $barter->name }}</h5>
        <div class="row">
                @foreach($barter->barterImages as $images)
                <div class="col-md-3 mb-3">
                <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" alt="{{ $barter->name }}" class="img-fluid">
                </div>
                @endforeach
            </div>
        <p class="card-text"><strong>Description:</strong>{{ $barter->description }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $barter->category->name }}</p>
        <p class="card-text"><strong>Quantity:</strong> {{ $barter->quantity }}</p>
        <p class="card-text"><strong>Condition:</strong> {{ $barter->condition }}</p>
        <!-- <p class="card-text"><strong>Owner:</strong> {{ $barter->user->name }}</p> -->
        <p class="card-text"><strong>Owner:</strong> You</p>
        
    </div>

    <div class="col-md-2">
        <div class="d-flex justify-content-center">
            <h5 class="card-title"><strong>Exchange With</strong></h5>
        </div>
    </div>

    
    <div class="col-md-6">
        
        <h5 class="card-title"><strong>Product Name:</strong>{{ $barter->barterPeople->product->name }}</h5>
        <div class="row">
                @foreach($barter->barterPeople->product->productImages as $images)
                <div class="col-md-3 mb-3">
                <img src="{{ asset($images->image)}}" alt="{{ $barter->name }}" class="img-fluid">
                </div>
                @endforeach
            </div>
        <p class="card-text"><strong>Description:</strong>{{ $barter->barterPeople->product->description }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $barter->barterPeople->product->category->name }}</p>
        <p class="card-text"><strong>Quantity:</strong> {{ $barter->barterPeople->product->quantity}}</p>
        <p class="card-text"><strong>Condition:</strong> {{ $barter->barterPeople->product->condition }}</p>
        <!-- <p class="card-text"><strong>Owner:</strong> {{ $barter->barterPeople->receiver->name }}</p> -->
        <p class="card-text"><strong>Owner:</strong> 
        @if($barter->barterPeople->product->user_id == Auth::id())
            You
        @else
        <a href="{{ url('/users/'. $barter->barterPeople->receiver_id.'/products') }}"> {{ $barter->barterPeople->receiver->name }} </a>
        @endif
    </p>

    </div>
</div>

<div class="d-flex justify-content-end">
            @if(auth()->id() === $barter->user_id && $barter->status === 'pending')
            <button type="button" class="btn btn-secondary">Pending</button>
            @elseif(auth()->id() === $barter->user_id && $barter->status === 'accepted')
            <button type="submit" class="btn btn-success">Accepted</button>
            @elseif(auth()->id() === $barter->user_id && $barter->status === 'rejected')
            <button type="submit" class="btn btn-danger">Rejected</button>
            @endif
            </div>

          </div>
        </div>

        @elseif(auth()->id() === $barter->barterPeople->receiver_id)
        <div class="card mb-8">
<div class="card-body">
          <div class="row">
    <div class="col-md-4">
        <h5 class="card-title"><strong>Product Name:</strong>{{ $barter->name }}</h5>
        <div class="row">
                @foreach($barter->barterImages as $images)
                <div class="col-md-3 mb-3">
                <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" alt="{{ $barter->name }}" class="img-fluid">
                </div>
                @endforeach
            </div>
        <p class="card-text"><strong>Description:</strong>{{ $barter->description }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $barter->category->name }}</p>
        <p class="card-text"><strong>Quantity:</strong> {{ $barter->quantity }}</p>
        <p class="card-text"><strong>Condition:</strong> {{ $barter->condition }}</p>
        <!-- <p class="card-text"><strong>Owner:</strong> {{ $barter->user->name }}</p> -->
        <p class="card-text"><strong>Owner:</strong> <a href="{{ url('/users/'. $barter->user_id.'/products') }}"> {{ $barter->user->name }} </a> </p>
        
    </div>

    <div class="col-md-2">
        <div class="d-flex justify-content-center">
            <h5 class="card-title"><strong>Exchange With</strong></h5>
        </div>
    </div>

    
    <div class="col-md-6">
        
        <h5 class="card-title"><strong>Product Name:</strong>{{ $barter->barterPeople->product->name }}</h5>
        <div class="row">
                @foreach($barter->barterPeople->product->productImages as $images)
                <div class="col-md-3 mb-3">
                <img src="{{ asset($images->image)}}" alt="{{ $barter->name }}" class="img-fluid">
                </div>
                @endforeach
            </div>
        <p class="card-text"><strong>Description:</strong>{{ $barter->barterPeople->product->description }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $barter->barterPeople->product->category->name }}</p>
        <p class="card-text"><strong>Quantity:</strong> {{ $barter->barterPeople->product->quantity}}</p>
        <p class="card-text"><strong>Condition:</strong> {{ $barter->barterPeople->product->condition }}</p>
        <!-- <p class="card-text"><strong>Owner:</strong> {{ $barter->barterPeople->receiver->name }}</p> -->
        <p class="card-text"><strong>Owner:</strong> 
        @if($barter->barterPeople->product->user_id == Auth::id())
            You
        @else
            {{ $barter->barterPeople->receiver->name }}
        @endif
    </p>

    </div>
</div>

<div class="d-flex justify-content-end">
            @if(auth()->id() === $barter->barterPeople->receiver_id && $barter->status === 'pending')
            <button type="button" class="btn btn-secondary">Pending</button>
            @elseif(auth()->id() === $barter->barterPeople->receiver_id && $barter->status === 'accepted')
            <button type="submit" class="btn btn-success">Accepted</button>
            @elseif(auth()->id() === $barter->barterPeople->receiver_id && $barter->status === 'rejected')
            <button type="submit" class="btn btn-danger">Rejected</button>
            @endif
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
