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
      <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"> 
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">

      <link rel="stylesheet" href="{{asset('assets/exzoom/jquery.exzoom.css')}}">

      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"> -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      <style>
        /* Product Card */
.product-card{
    background-color: #fff;
    border: 1px solid #ccc;
    margin-bottom: 24px;
}
.product-card a{
    text-decoration: none;
}
.product-card .stock{
    position: absolute;
    color: #fff;
    border-radius: 4px;
    padding: 2px 12px;
    margin: 8px;
    font-size: 12px;
}
.product-card .product-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.product-card .product-card-img img{
    width: 100%;
}
.product-card .product-card-body{
    padding: 10px 10px;
}
.product-card .product-card-body .product-brand{
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 4px;
    color: #937979;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .product-name{
    font-size: 20px;
    font-weight: 600;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .selling-price{
    font-size: 22px;
    color: #000;
    font-weight: 600;
    margin-right: 8px;
}
.product-card .product-card-body .original-price{
    font-size: 18px;
    color: #937979;
    font-weight: 400;
    text-decoration: line-through;
}
.product-card .product-card-body .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 12px;
    margin-top: 10px;
}
/* Product Card End */
      </style>
      @livewireStyles
   </head>
   <!-- body -->
   <body class="main-layout">
      
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
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
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                 </li> -->
                                 <li class="nav-item">
                                    <a class="nav-link" href="products.html">About</a>
                                 </li>
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="fashion.html">Fashion</a>
                                 </li> -->
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ url('wishlist')}}">Wishlist (<livewire:product.wishlist-count/>)</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ url('messages')}}">Chat </a>
                                 </li>

                                 <li class="nav-item">
                                 @if (Route::has('login'))
                
                    @auth
                    <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" style="position:relative; padding-left:50px;">
                     <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:20px; left:10px; border-radius:50%">
                        {{ Auth::user()->userDetail ? Auth::user()->userDetail->username : Auth::user()->name }} <span class="caret"></span>
                     </a> 

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                     <a class="dropdown-item" href="{{url('/create')}}">
                                       {{__('Upload Item')}}
                        </a>

                        <a class="dropdown-item" href="{{url('/profile')}}">
                                       {{__('User Profile')}}
                        </a>

                     
                        <a class="dropdown-item" href="{{ route('logout')}}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       {{__('Logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display:none;">
                        @csrf
                        </form>

                        

                        


                        
                        </div>
                     </li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                        <!-- @if (Route::has('register'))
                        <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                        @endif -->
                    @endauth
                
            @endif
            </li>

           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell"></i>
            @if ($notificationCount > 0)
                <span class="badge badge-danger">{{ $notificationCount }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if ($notifications->count() > 0)
                @foreach ($notifications as $notification)
                    <a class="dropdown-item" href="{{ route('notifications.markAsRead', $notification) }}">
                        {{ $notification->data['message'] }}
                    </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <form action="{{ route('notifications.clearAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">Clear All</button>
                </form>
            @else
                <span class="dropdown-item">No new notifications</span>
            @endif
        </div>
    </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <div class="search">
                           <form action="{{ url('search') }}" method="GET">
                              <input class="form_sea" type="text" placeholder="Search" name="search" value="{{ Request::get('search') }}">
                              <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <div>
      <livewire:product.existing-product-rating :selectedRating="$selectedRating"/>
      
      </div>



      <script src="{{ asset('js/jquery.min.js')}}"></script>
      <script src="{{ asset('js/popper.min.js')}}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js')}}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('js/custom.js')}}"></script>
      <script src="{{ asset('assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <script src="{{ asset('assets/exzoom/jquery.exzoom.js')}}"></script>
    @livewireScripts
    @stack('scripts')

    <style>

    /* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }

/* End of Star Rating */

</style>

      </body>
      </html>
      
