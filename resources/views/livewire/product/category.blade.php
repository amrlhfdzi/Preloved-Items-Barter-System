<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Condition</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="checkbox" value="new"/> New
                    </label>
                    <label class="d-block">
                        <input type="checkbox" value="used"/> Used
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-6">
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
                                <h5 class="product-name">
                                    <a href="{{ url($productItem->category->slug.'/'.$productItem->name) }}">
                                    {{ $productItem->name}} 
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $productItem->condition}}</span>
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
                            <h4>No Products Available for {{$category->name}} </h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
