<div>
<div class="py-3 py-md-5">
        <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if($product->productImages)
                        <!-- <img src="{{ asset($product->productImages[0]->image)}}" class="w-100" alt="Img"> -->
                        <div class="exzoom" id="exzoom">
  <!-- Images -->
  <div class="exzoom_img_box">
    <ul class='exzoom_img_ul'>
        @foreach ($product->productImages as $itemImg)
      <li><img src="{{ asset($itemImg->image)}}"/></li>
      @endforeach
    </ul>
  </div>
  <div class="exzoom_nav"></div>
  <!-- Nav Buttons -->
  <p class="exzoom_btn">
      <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
  </p>
</div>
                        @else
                        No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                             {{$product->name}}
                             
                             @if($product->barters->where('status', 'accepted')->count() > 0)
                        <label class="label-stock bg-danger">Out of Stock</label>
                        @else
                        <label class="label-stock bg-success">Available</label>
                        @endif
                            
                       
                        <!-- <a href="{{ url('category/'.$product->category->slug.'/'.$product->name) }}"> -->
                        </h4>
                        <hr>
                        <!-- {{ $product->user->userDetail->username }}  -->
                        <!-- <a href="{{ url('/users/'. $product->user->userDetail->username.'/products', $product->user->id) }}">{{ $product->user->userDetail->username }}</a> -->
                        <div style="display: flex; align-items: center;">
                          <img src="/uploads/avatars/{{ $product->user->avatar }}" style="width:32px; height:32px; border-radius:50%; margin-right: 10px;">
                            <div>
                                <a href="{{ url('/users/'. $product->user_id.'/products') }}">{{ $product->user->userDetail->username }}</a>
                                
                                <a href="{{ url('/users/'. $product->user_id.'/products') }}" class="btn btn-primary btn-sm" style="margin-left: 10px;">View Profile</a>
                            </div>
                        </div>

                        <p class="product-path">
                            Home / {{ $product->category->name}} / {{ $product->name}}
                        </p>
                        <p> Condition: {{ $product->condition}} </p>
                        <p> Quantity: {{ $product->quantity}} </p>
                        <p> Description: {{ $product->description}} </p>
                        <p> Tags:  {{ $product->tags}}</p> 
                        <!-- <div class="tags">
    @if(!is_null($product->tags) && is_array(json_decode($product->tags)))
        @foreach(json_decode($product->tags) as $tag)
            <span class="badge badge-primary">{{ $tag }}</span>
        @endforeach
    @endif
</div> -->
                        <p> Swap With: {{ $product->request}} </p>
                        


                      
                        <!-- @if (is_array($product->tags) && count($product->tags))
    <div class="tags">
        @foreach ($product->tags as $index => $tag)
            <span class="badge badge-primary">{{ $index }} - {{ $tag }}</span>
        @endforeach
    </div>
@endif -->


<!-- <div class="tags">
    @if(!is_null($product->tags) && is_array(json_decode($product->tags)))
        @foreach(json_decode($product->tags) as $tag)
            <span class="badge badge-primary">{{ $tag }}</span>
        @endforeach
    @endif
</div> -->

                        <!-- <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div> -->
                        <div class="mt-2">
                            <a href="#" wire:click.prevent="startConversation({{ $product->user_id }})" class="btn btn-info btn-lg"> <i class="fa fa-comments"></i> Chat</a>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn-warning btn-lg"> 
                            <span wire:loading.remove>
                            <i class="fa fa-heart"></i> Add To Wishlist 
                            </span>
                            <span wire:loading wire:target="addToWishList">Adding...</span>
                            </button>

                            <!-- <a href="#" wire:click.prevent="startBarter({{ $product->user_id }}, {{ $product->id }})" class="btn btn1"> <i class="fa fa-exchange"></i> Barter</a> -->

                            <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#barterModal"><i class="fa fa-exchange"></i> Barter</a>

<!-- Barter Modal -->
<div class="modal fade" id="barterModal" tabindex="-1" role="dialog" aria-labelledby="barterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="barterModalLabel">How do you want to barter?</h5>
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true" data-dismiss="modal">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Choose one of the following options:</p>
        <div class="row">
          <div class="col-md-6 mb-3">
            <button class="btn btn-success btn-block btn-lg" wire:click.prevent="startBarter({{ $product->user_id }}, {{ $product->id }})">I want to barter with a new product</button>
          </div>
          <div class="col-md-6 mb-3">
            <button type="button" class="btn btn-primary btn-block btn-lg"  wire:click.prevent="startBarterExisting({{ $product->user_id }}, {{ $product->id }})">I want to barter from my listings</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





                        </div>
                        <!-- <div class="mt-3">
                            <h5 class="mb-0">Description</h5>
                            <p>
                                {{$product->description}}
                            
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- @if (session('closeModal'))
        <script>
            // close the popup modal
            $('#barterModal').modal('hide');

            // show a message to the user
            alert('{{ session('error') }}');
        </script>
    @endif -->

@push('scripts')

<script>

$(function(){

$("#exzoom").exzoom({

  // thumbnail nav options
  "navWidth": 60,
  "navHeight": 60,
  "navItemNum": 5,
  "navItemMargin": 7,
  "navBorder": 1,

  // autoplay
  "autoPlay": false,

  // autoplay interval in milliseconds
  "autoPlayTimeout": 2000
  
});

});

</script>

@endpush