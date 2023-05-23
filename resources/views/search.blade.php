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
                    <form method="GET" action="{{ url()->current() }}">
                            <label class="d-block">
                                <input type="checkbox" name="condition[]" value="New" {{ in_array('New', request()->input('condition', [])) ? 'checked' : '' }}/> New
                            </label>
                            <label class="d-block">
                                <input type="checkbox" name="condition[]" value="Used" {{ in_array('Used', request()->input('condition', [])) ? 'checked' : '' }}/> Used
                            </label>
                            <button type="submit" class="btn btn-primary mt-3">Filter</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <h4>Search Results</h4>
        
    <div class="row">
@forelse ($searchProducts as $productItem)

<div class="col-md-3">
    <div class="product-card bg-white p-3">
                        <div class="product-card-img">
                        @if ($productItem->barters->where('status', 'accepted')->count() > 0 || $barters->where('status', 'accepted')->contains('name', $productItem->name))
                                <label class="stock bg-danger">Swapped</label>
                            @else
                                <label class="stock bg-success">Available</label>
                            @endif
                            @if($productItem->productImages->count() > 0)
                                <a href="{{ url('category/'.$productItem->category->slug.'/'.$productItem->name) }}">
                                    <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                                </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand mb-1">{{$productItem->category->name}}</p>
                            <h5 class="product-name mb-2">
                                <a href="{{ url('category/'.$productItem->category->slug.'/'.$productItem->name) }}">
                                    {{$productItem->name}} 
                                </a>
                            </h5>
                            <p class="product-condition mb-2">{{$productItem->condition}}</p>
                            <div style="display: flex; align-items: center;">
                                <img src="/uploads/avatars/{{ $productItem->user->avatar }}" style="width:32px; height:32px; border-radius:50%; margin-right: 10px;">
                                <a href="{{ url('/users/'. $productItem->user_id.'/products') }}">{{ $productItem->user->userDetail->username ?? $product->user->name }}</a>
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
