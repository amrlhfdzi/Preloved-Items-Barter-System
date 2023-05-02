<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Condition</h4></div>
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
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-6">
                        <div class="product-card">
                            <div class="product-card-img">
                            @if($productItem->barters->where('status', 'accepted')->count() > 0)
                        <label class="stock bg-danger">Out of Stock</label>
                        @else
                        <label class="stock bg-success">Available</label>
                        @endif

                                @if ($productItem->productImages->count()>0)
                                    <a href="{{ url('category/'.$productItem->category->slug.'/'.$productItem->name) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name}}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                            <p class="product-brand">{{$productItem->category->name}}</p>

                                <h5 class="product-name">
                                    <a href="{{ url($productItem->category->slug.'/'.$productItem->name) }}">
                                    {{ $productItem->name}} 
                                    </a>
                                </h5>
                                
                                <p class="product-brand">{{$productItem->condition}}</p>
                                
                                <!-- <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a>
                                </div> -->

                                <div style="display: flex; align-items: center;">
  <img src="/uploads/avatars/{{ $productItem->user->avatar }}" style="width:32px; height:32px; border-radius:50%; margin-right: 10px;">
  <a href="{{ url('/users/'. $productItem->user_id.'/products') }}">{{ $productItem->user->userDetail->username }}</a>
</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{$category->name}} </h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
