<!DOCTYPE html>
<html lang="en">
   <head>
   <!-- basic -->
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>romofyi</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      @livewireStyles
   </head>
   <!-- body -->
   <body class="main-layout">
      
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            
            <!-- <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                           <li><a href="#"><img src="{{asset('images/email.png')}}" alt="#"/> demo@gmail.com</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <a class="logo" href="#"><img src="{{asset('images/logo.png')}}" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="#"><img src="{{asset('images/shopping.png')}}" alt="#"/></a> </li>
                           <a href="#" class="order">Order Now</a> 
                        </ul>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="{{url('/redirect')}}">Home</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="products.html">Wishlist (<livewire:product.wishlist-count/>)</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="fashion.html">Chat</a>
                                 </li>
                                 

                                 <li class="nav-item">
                                 @if (Route::has('login'))
                
                    @auth
                    <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" style="position:relative; padding-left:50px;">
                     <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:20px; left:10px; border-radius:50%">
                        {{Auth::user()->name}} <span class="caret"></span>
                     </a> 

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                     
                        <a class="dropdown-item" href="{{ route('logout')}}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       {{__('Logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display:none;">
                        @csrf
                        </form>

                        <a class="dropdown-item" href="{{url('/profile')}}">
                                       {{__('User Profile')}}
                        </a>

                        <a class="dropdown-item" href="{{url('/create')}}">
                                       {{__('Upload Item')}}
                        </a>


                        
                        </div>
                     </li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                        @if (Route::has('register'))
                        <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                        @endif
                    @endauth
                
            @endif
            </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <div class="search">
                           <form action="/action_page.php">
                              <input class="form_sea" type="text" placeholder="Search" name="search">
                              <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                <div class="card">
                <div class="card-header">
                    <h3> Edit Product
                    <a href="{{url('/view')}}" class="btn btn-primary btn-sm float-end" style="float: right;">Back</a>
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

                    <form action="{{ url('producted/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="request-tab" data-bs-toggle="tab" data-bs-target="#request-tab-pane" type="button" role="tab" aria-controls="request-tab-pane" aria-selected="false">Request Item</button>
  </li>
  <!-- <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
  </li> -->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

  <div class="mb-3">
        <label>Product Image</label>
        <input type="file" name="image[]" multiple class="form-control" />
    </div>

    <div>
      @if($product->productImages)
      <div class="row">
      @foreach($product->productImages as $image)
         <div class="col-md-2">
         <img src="{{ asset($image->image) }}" style="width: 80px;height:80px;"
                   class="me-4 border" alt="img" />
                   <a href="{{ url('product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
         </div>
         @endforeach
      </div>
         
              
         
      @else
      <h5>No Image Added</h5>
      @endif
    </div>

    <div class="mb-3">
        </label>Category</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }} >
                {{ $category->name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" value="{{ $product->name}}" class="form-control" />
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4">{{ $product->description}} </textarea>
    </div>
    <div class="mb-3">
        <label>Product Tags</label>
        <textarea name="tags" class="form-control"> {{ $product->tags}} </textarea>
    </div>
    <div class="mb-3">
        <label>Product Quantity</label>
        <input type="number" name="quantity" value="{{ $product->quantity}}" class="form-control" />
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
        <input type="text" name="request" value="{{ $product->request}}" class="form-control" />
    </div>
  </div>
</div>
  <div>
    <button type="submit" class="btn btn-primary">Update</button>
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
      