<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Bartering Form</h4>
                    <a href="javascript:history.back()" class="btn btn-primary btn-sm float-end" style="float: right;">Back</a>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @elseif(session('message'))
                        <div class="alert alert-success">{{ session('message')}}</div>
                    @endif

                    <form wire:submit.prevent="storeListing" action="#" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="selectedProduct">Select from your listings:</label>
                            <select class="form-control" wire:model="selectedProduct">
                                <option value="">Select a product to barter</option>
                                @foreach($userProducts as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($selectedProduct)
    @php
        $product = App\Models\Product::find($selectedProduct);
    @endphp
    <!-- <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">{{ $product->quantity }} available</p>
            <p class="card-text">{{ $product->condition }}</p>
        </div>
    </div> -->
@endif

                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" wire:model="name" class="form-control" readonly placeholder="Enter product name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea wire:model="description" class="form-control" rows="3" readonly placeholder="Enter product description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" name="image[]" wire:model="image" multiple class="form-control" readonly disabled>
                        </div>

                        


                        <div class="form-group">
                            <label for="category">Product Category:</label>
                            <select name="category_id" class="form-control"  wire:model="category_id" required readonly disabled>
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label for="quantity">Product Quantity:</label>
                            <input type="number" wire:model="quantity" class="form-control" readonly placeholder="Enter product quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="condition">Product Condition:</label>
                            <select name="condition" class="form-control" wire:model="condition" required readonly disabled>
                                <option value="">Select condition</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
