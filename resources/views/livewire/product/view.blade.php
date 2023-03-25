<div>
<div class="py-3 py-md-5">
        <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
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
                             
                            <label class="label-stock bg-success">In Stock</label>

                        
                        </h4>
                        <hr>
                        {{ $product->user->userDetail->username }} 
                        <p class="product-path">
                            Home / {{ $product->category->name}} / {{ $product->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->tags}}</span>
                            <!-- <span class="original-price">$499</span> -->
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="#" wire:click.prevent="startConversation({{ $product->user_id }})" class="btn btn1"> <i class="fa fa-comments"></i> Chat</a>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1"> 
                            <span wire:loading.remove>
                            <i class="fa fa-heart"></i> Add To Wishlist 
                            </span>
                            <span wire:loading wire:target="addToWishList">Adding...</span>
                            </button>

                            <a href="#" wire:click.prevent="startBarter({{ $product->user_id }}, {{ $product->id }})" class="btn btn1"> <i class="fa fa-exchange"></i> Barter</a>

                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{$product->description}}
                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
            </div>
        </div>
    </div>
</div>

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