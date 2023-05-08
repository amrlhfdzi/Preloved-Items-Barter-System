<!DOCTYPE html>
<html lang="en">
   <head>
   @include("usercss");
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include("navbar");

<div>
    <div class="row">
    <div class="col-md-3">
            <div class="card">
            <div class="card-header bg-primary text-white"><h4>Condition</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="checkbox" wire:model="newConditionInput" value="New"/> New
                    </label>
                    <label class="d-block">
                        <input type="checkbox" wire:model="usedConditionInput" value="Used"/> Used
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <h4>Search Results</h4>
        
    <div class="row">
@forelse ($searchProducts as $productItem)

<div class="col-md-3">
    <div class="product-card">
        <div class="product-card-img">
            @if ($productItem->quantity > 0)
            <label class="stock bg-success">In Stock</label>
            @else
            <label class="stock bg-danger">Out of Stock</label>
            @endif

            @if ($productItem->productImages->count()>0)
            <a href="{{ url('category/'.$productItem->category->slug.'/'.$productItem->name) }}">
            <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name}}">
            </a>
            @endif
        </div>
        <div class="product-card-body">
            <!-- <p class="product-brand">{{ $productItem->tags}}</p> -->
            <h5 class="product-name">
               <a href="{{ url($productItem->category->slug.'/'.$productItem->name) }}">
               {{ $productItem->name}} 
               </a>
            </h5>
            <div>
                <span class="selling-price">{{ $productItem->condition}}</span>
                <!-- <span class="original-price">$799</span> -->
            </div>
            <div class="mt-2">
                <a href="" class="btn btn1">Add To Cart</a>
                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                <a href="" class="btn btn1"> View </a>
            </div>
        </div>
    </div>
</div>

@empty
<div class="col-md-12">
    <div class="p-2">
        <h4>No Such Products Found </h4>
    </div>
</div>

@endforelse

<div>
    {{ $searchProducts->appends(request()->input())->links() }}
</div>

</div>

</div>
    </div>

</div>

@include("userscript");
   </body>
</html>
