<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">All Products For {{$category->name}} Category</h4>
            </div>
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
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-6 mb-4">
                    <div class="product-card bg-white p-3">
                        <div class="product-card-img">
                        @if ($product->barters->where('status', 'accepted')->count() > 0 || $barters->where('status', 'accepted')->contains('name', $product->name))
                                <label class="stock bg-danger">Swapped</label>
                            @else
                                <label class="stock bg-success">Available</label>
                            @endif
                            @if($product->productImages->count() > 0)
                                <a href="{{ url('category/'.$product->category->slug.'/'.$product->name) }}">
                                    <img src="{{asset($product->productImages[0]->image)}}" alt="{{$product->name}}">
                                </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand mb-1">{{$product->category->name}}</p>
                            <h5 class="product-name mb-2">
                                <a href="{{ url('category/'.$product->category->slug.'/'.$product->name) }}">
                                    {{$product->name}} 
                                </a>
                            </h5>
                            <p class="product-condition mb-2">{{$product->condition}}</p>
                            <div style="display: flex; align-items: center;">
                                <img src="/uploads/avatars/{{ $product->user->avatar }}" style="width:32px; height:32px; border-radius:50%; margin-right: 10px;">
                                <a href="{{ url('/users/'. $product->user_id.'/products') }}">{{ $product->user->userDetail->username ?? $product->user->name }}</a>
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
