
      <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Bartering Form</h4>
                </div>
                <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                  @foreach ($errors->all() as $errors)
                  <div>{{$errors}}</div>
                  @endforeach
                </div>
                @elseif(session('message'))
                  <div class="alert alert-success">{{ session('message')}}</div>
                @endif

                <form wire:submit.prevent="store" action="#" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" wire:model="name" class="form-control" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea wire:model="description" class="form-control" rows="3" placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" wire:model="image" multiple class="form-control-file" multiple>
                        </div>
                        <div class="form-group">
                            <label for="category">Product Category:</label>
                            <select name="category_id" class="form-control" wire:model="category_id" required>
                            <option value="">Select category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Product Quantity:</label>
                            <input type="number" wire:model="quantity" class="form-control" placeholder="Enter product quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Product Condition:</label>
                            <!-- <input type="text" name="location" class="form-control" placeholder="Enter product location" required> -->
                            <input type="radio" id="New" wire:model="condition" value="New"  />
                            <label for="New">New</label>
                            <input type="radio" id="Used" wire:model="condition" value="Used"  />
                            <label for="Used">Used</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

     