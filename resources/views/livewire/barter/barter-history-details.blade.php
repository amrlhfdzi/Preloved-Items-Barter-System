<div class="col-md-8">
  <div class="card mb-8">
    <div class="card-body">
      <div class="row">
        <!-- Left Column -->
        <div class="col-md-4">
          <div class="card">
            <div class="exzoom" id="exzoom">
              
              <!-- Images -->
              <div id="product-images" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach ($barters->barterImages as $index => $images)
                    <li data-target="#product-images" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                  @endforeach
                </ol>
                <div class="carousel-inner">
                  @foreach ($barters->barterImages as $index => $images)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                      <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" class="d-block w-100">
                    </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-images" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#product-images" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="card-body">
            <h5 class="card-title"><strong>Product Name:</strong> {{ $barters->name }}</h5>

              <p class="card-text mt-3"><strong>Description:</strong> {{ $barters->description }}</p>
              <p class="card-text"><strong>Category:</strong> {{ $barters->category->name }}</p>
              <p class="card-text"><strong>Quantity:</strong> {{ $barters->quantity }}</p>
              <p class="card-text"><strong>Condition:</strong> {{ $barters->condition }}</p>
              <p class="card-text"><strong>Owner:</strong> 
              @if($barters->user_id == Auth::id())
            You
        @else
        <a href=""> {{ $barters->user->name }} </a>
        @endif
            </p>
            </div>
          </div>
        </div>
        <!-- Middle Column -->
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center h-100">
            <h5 class="card-title"><strong>Exchange With</strong></h5>
          </div>
        </div>
        <!-- Right Column -->
        <div class="col-md-4">
          <div class="card">
            <div id="exchange-product-images" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach ($barters->barterPeople->product->productImages as $index => $images)
                  <li data-target="#exchange-product-images" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
              </ol>
              <div class="carousel-inner">
                @foreach ($barters->barterPeople->product->productImages as $index => $images)
                  <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" class="d-block w-100">
                  </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#exchange-product-images" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#exchange-product-images" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><strong>Product Name:</strong> {{ $barters->barterPeople->product->name }}</h5>
              <p class="card-text mt-3"><strong>Description:</strong> {{ $barters->barterPeople->product->description }}</p>
              <p class="card-text"><strong>Category:</strong> {{ $barters->barterPeople->product->category->name }}</p>
              <p class="card-text"><strong>Quantity:</strong> {{ $barters->barterPeople->product->quantity }}</p>
              <p class="card-text"><strong>Condition:</strong> {{ $barters->barterPeople->product->condition }}</p>
              <p class="card-text"><strong>Owner:</strong>
              @if($barters->barterPeople->product->user_id == Auth::id())
            You
        @else
        <a href="{{ url('/users/'. $barter->barterPeople->receiver_id.'/products') }}"> {{ $barters->barterPeople->receiver->name }} </a>
        @endif
              
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@push('scripts')

<script>

// $(function(){

// $("#exzoom").exzoom({

//   // thumbnail nav options
//   "navWidth": 60,
//   "navHeight": 60,
//   "navItemNum": 5,
//   "navItemMargin": 7,
//   "navBorder": 1,

//   // autoplay
//   "autoPlay": false,

//   // autoplay interval in milliseconds
//   "autoPlayTimeout": 2000
  
// });

// $("#exzoom2").exzoom({
//   // thumbnail nav options
//   "navWidth": 60,
//   "navHeight": 60,
//   "navItemNum": 5,
//   "navItemMargin": 7,
//   "navBorder": 1,
//   // autoplay
//   "autoPlay": false,
//   // autoplay interval in milliseconds
//   "autoPlayTimeout": 2000
// });

// });

</script>

@endpush

