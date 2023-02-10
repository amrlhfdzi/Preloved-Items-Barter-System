<!DOCTYPE html>
<html lang="en">
   <head>
   @include("usercss");
   </head>
   <!-- body -->
   <body class="main-layout">
      
      <!-- end loader -->
      <!-- header -->
      @include("navbar");

      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                <div class="card">
                <div class="card-header">
                    <h3> Add Product
                    <a href="{{url('/redirect')}}" class="btn btn-primary btn-sm float-end" style="float: right;">Back</a>
                    </h3>
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

                    <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="request-tab" data-bs-toggle="tab" data-bs-target="#request-tab-pane" type="button" role="tab" aria-controls="request-tab-pane" aria-selected="false">Request Item</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

  <div class="mb-3">
        <label>Product Image</label>
        <input type="file" name="image[]" multiple class="form-control" />
    </div>

    <div class="mb-3">
        </label>Category</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4"> </textarea>
    </div>
    <div class="mb-3">
        <label>Product Tags</label>
        <textarea name="tags" class="form-control"> </textarea>
    </div>
    <div class="mb-3">
        <label>Product Quantity</label>
        <input type="number" name="quantity" class="form-control" />
    </div>
    <div class="mb-3">
        <label>Product Condition: </label>
        <input type="radio" id="New" name="condition" value="New"  />
        <label for="New">New</label>
        <input type="radio" id="Used" name="condition" value="Used"  />
        <label for="Used">Used</label>
    </div>
   </div>


  <div class="tab-pane fade border p-3" id="request-tab-pane" role="tabpanel" aria-labelledby="request-tab" tabindex="0">
    <div class="mb-3">
        <label>Product Request</label>
        <input type="text" name="request" class="form-control" />
    </div>
  </div>
</div>
  <div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
  
</div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
        </main>
      </div>


      @include("userscript");
   </body>
</html>
      