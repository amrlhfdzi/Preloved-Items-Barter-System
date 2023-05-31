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
      <title>Swapup</title>
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
                        <div class="logo" style="margin-right: 50px;">
         <a href="{{ url('/') }}"><img src="{{asset('images/logobest1.png')}}" alt="Logo"></a>
      </div>
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
                     {{ Auth::user()->userDetail ? Auth::user()->userDetail->username : Auth::user()->name }}  <span class="caret"></span>
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

      <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/uploads/avatars/{{ $user->avatar }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $user->userDetail->username ?? $user->name }}</h5>
                        <div class="rating">
                            <p>Average Rating: {{ number_format($averageRating, 1) }}/5</p>
                            @php $ratenum = number_format($averageRating) @endphp
                            @for($i = 1;$i<= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j = $ratenum+1; $j<= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="wizard">
                        <nav class="list-group list-group-flush  text-center">
                            <!-- <a class="list-group-item active" href="#"><i class="fe-icon-user text-muted"></i>Profile</a> -->
                            <a class="list-group-item {{ Request::is('users/'. $user->id.'/products') ? 'active' : '' }}" href="{{ url('/users/'. $user->id.'/products') }}">
                            <i class="fe-icon-tag mr-1 text-muted"></i>
                            <div class="d-inline-block font-weight-medium text-uppercase">Profile</div>
                            </a>
                        
                            <a class="list-group-item {{ Request::is('users/'. $user->id.'/ratings') ? 'active' : '' }}" href="{{ url('/users/'. $user->id.'/ratings') }}">
                            <i class="fe-icon-tag mr-1 text-muted"></i>
                            <div class="d-inline-block font-weight-medium text-uppercase">Ratings</div>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="review-block">
                @if ($ratings->isEmpty())
                      <p>No ratings available.</p>
                      @else
                    @foreach ($ratings as $rating)
        
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="review-block-img">
                                    @if ($rating->barter)
                                        @if ($rating->barter->barterImages->isNotEmpty())
                                            <img src="{{ Storage::url($rating->barter->barterImages->first()->image) }}" onerror="this.onerror=null; this.src='{{ asset($rating->barter->barterImages->first()->image) }}';" alt="{{ $rating->barter->name }}" class="img-rounded" alt="">
                                        @endif
                                    @elseif ($rating->product)
                                        @if ($rating->product->productImages->isNotEmpty())
                                            <img src="{{ Storage::url($rating->product->productImages->first()->image) }}" onerror="this.onerror=null; this.src='{{ asset($rating->product->productImages->first()->image) }}';" alt="{{ $rating->product->name }}" class="img-rounded" alt="">
                                        @endif
                                    @endif
                                </div>
                                <div class="review-block-name"><a href="#">{{ $rating->user->name }}</a></div>
                                <div class="review-block-date">{{ $rating->created_at }}</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="rating">
                                    <p>Rating</p>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating->rating)
                                            <i class="fa fa-star checked"></i>
                                        @else
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div class="review-block-title">{{ $rating->barter->name ?? $rating->product->name }}</div>
                                <div class="review-block-description">{{ $rating->comment }}</div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <form action="{{url('/edit')}}" class="row">
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">{{ $user->userDetail ? $user->userDetail->username : $user->name }}'s Products</h4>
                    </div>
                    @forelse ($products as $product)
                        <div class="col-md-6">
                            <div class="product-card">
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
                                    <p class="product-brand">{{$product->category->name}}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('category/'.$product->category->slug.'/'.$product->name) }}">
                                            {{$product->name}}
                                        </a>
                                    </h5>
                                    <div style="display: flex; align-items: center;">
                                        <img src="/uploads/avatars/{{ $product->user->avatar }}" style="width:32px; height:32px; border-radius:50%; margin-right: 10px;">
                                        <a href="{{ url('/users/'. $product->user_id.'/products') }}">{{ $product->user->userDetail->username }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="p-2">
                                <h4>No Products Available </h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<style type="text/css">
body{
    background:#eee;    
}
.widget-author {
  margin-bottom: 58px;
}
.author-card {
  position: relative;
  padding-bottom: 48px;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}
.author-card .author-card-cover {
  position: relative;
  width: 100%;
  height: 100px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.author-card .author-card-cover::after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  content: '';
  opacity: 0.5;
}
.author-card .author-card-cover > .btn {
  position: absolute;
  top: 12px;
  right: 12px;
  padding: 0 10px;
}
.author-card .author-card-profile {
  display: table;
  position: relative;
  margin-top: -22px;
  padding-right: 15px;
  padding-bottom: 16px;
  padding-left: 20px;
  z-index: 5;
}
.author-card .author-card-profile .author-card-avatar, .author-card .author-card-profile .author-card-details {
  display: table-cell;
  vertical-align: middle;
}
.author-card .author-card-profile .author-card-avatar {
  width: 85px;
  border-radius: 50%;
  box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
  overflow: hidden;
}
.author-card .author-card-profile .author-card-avatar > img {
  display: block;
  width: 100%;
}
.author-card .author-card-profile .author-card-details {
  padding-top: 20px;
  padding-left: 15px;
}
.author-card .author-card-profile .author-card-name {
  margin-bottom: 2px;
  font-size: 14px;
  font-weight: bold;
}
.author-card .author-card-profile .author-card-position {
  display: block;
  color: #8c8c8c;
  font-size: 12px;
  font-weight: 600;
}
.author-card .author-card-info {
  margin-bottom: 0;
  padding: 0 25px;
  font-size: 13px;
}
.author-card .author-card-social-bar-wrap {
  position: absolute;
  bottom: -18px;
  left: 0;
  width: 100%;
}
.author-card .author-card-social-bar-wrap .author-card-social-bar {
  display: table;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}
.btn-style-1.btn-white {
    background-color: #fff;
}
.list-group-item i {
    display: inline-block;
    margin-top: -1px;
    margin-right: 8px;
    font-size: 1.2em;
    vertical-align: middle;
}
.mr-1, .mx-1 {
    margin-right: .25rem !important;
}

.list-group-item.active:not(.disabled) {
    border-color: #e7e7e7;
    background: #fff;
    color: #ac32e4;
    cursor: default;
    pointer-events: none;
}
.list-group-flush:last-child .list-group-item:last-child {
    border-bottom: 0;
}

.list-group-flush .list-group-item {
    border-right: 0 !important;
    border-left: 0 !important;
}

.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
.list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem;
}
a.list-group-item, .list-group-item-action {
    color: #404040;
    font-weight: 600;
}
.list-group-item {
    padding-top: 16px;
    padding-bottom: 16px;
    -webkit-transition: all .3s;
    transition: all .3s;
    border: 1px solid #e7e7e7 !important;
    border-radius: 0 !important;
    color: #404040;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    text-decoration: none;
}
.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.125);
}
.list-group-item.active:not(.disabled)::before {
    background-color: #ac32e4;
}

.list-group-item::before {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background-color: transparent;
    content: '';
}

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
/* Product View */

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

  .checked{
    color: #ffd900;
  }

/* End of Star Rating */

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

/*** Portfolio page
==============================================================================*/

.card {
    margin-bottom: 20px;
}

.card-header {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    background-image: url('http://www.bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg');
    background-size: cover;
    background-position: center center;
    padding: 30px 15px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.card-header-menu {
    position: absolute;
    top: 0;
    right: 0;
    height: 4em;
    width: 4em;
}

.card-header-menu:after {
    position: absolute;
    top: 0;
    right: 0;
    content: "";
    border-left: 2em solid transparent;
    border-bottom: 2em solid transparent;
    border-right: 2em solid #37a000;
    border-top: 2em solid #37a000;
    border-top-right-radius: 4px;
}

.card-header-menu i {
    position: absolute;
    top: 9px;
    right: 9px;
    color: #fff;
    z-index: 1;
}

.card-header-headshot {
    height: 6em;
    width: 6em;
    border-radius: 50%;
    border: 2px solid #37a000;
    background-image: url('http://bootdey.com/img/Content/avatar/avatar6.png');
    background-size: cover;
    background-position: center center;
    box-shadow: 1px 3px 3px #3E4142;
}

.card-content-member {
    position: relative;
    background-color: #fff;
    padding: 1em;
    box-shadow: 0 2px 2px rgba(62, 65, 66, 0.15);
}

.card-content-member {
    text-align: center;
}

.card-content-member p i {
    font-size: 16px;
    margin-right: 10px;
}

.card-content-languages {
    background-color: #fff;
    padding: 15px;
}

.card-content-languages .card-content-languages-group {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding-bottom: 0.5em;
}

.card-content-languages .card-content-languages-group:last-of-type {
    padding-bottom: 0;
}

.card-content-languages .card-content-languages-group > div:first-of-type {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 5em;
    flex: 0 0 5em;
}

.card-content-languages h4 {
    line-height: 1.5em;
    margin: 0;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.card-content-languages li {
    display: inline-block;
    padding-right: 0.5em;
    font-size: 0.9em;
    line-height: 1.5em;
}

.card-content-summary {
    background-color: #fff;
    padding: 15px;
}

.card-content-summary p {
    text-align: center;
    font-size: 12px;
    font-weight: 600;
}

.card-footer-stats {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    background-color: #2c3136;
}

.card-footer-stats div {
    -webkit-box-flex: 1;
    -ms-flex: 1 0 33%;
    flex: 1 0 33%;
    padding: 0.75em;
}

.card-footer-stats div:nth-of-type(2) {
    border-left: 1px solid #3E4142;
    border-right: 1px solid #3E4142;
}

.card-footer-stats p {
    font-size: 0.8em;
    color: #A6A6A6;
    margin-bottom: 0.4em;
    font-weight: 600;
    text-transform: uppercase;
}

.card-footer-stats i {
    color: #ddd;
}

.card-footer-stats span {
    color: #ddd;
}

.card-footer-stats span.stats-small {
    font-size: 0.9em;
}

.card-footer-message {
    background-color: #37a000;
    padding: 15px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}

.card-footer-message h4 {
    margin: 0;
    text-align: center;
    color: #fff;
    font-weight: 400;
}

.review-number {
    float: left;
    width: 35px;
    line-height: 1;
}

.review-number div {
    height: 9px;
    margin: 5px 0
}

.review-progress {
    float: left;
    width: 230px;
}

.review-progress .progress {
    margin: 8px 0;
}

.progress-number {
    margin-left: 10px;
    float: left;
}

.rating-block,
.review-block {
    background-color: #fff;
    border: 1px solid #e1e6ef;
    padding: 15px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.review-block {
    margin-bottom: 20px;
}

.review-block-img img {
    height: 60px;
    width: 60px;
}

.review-block-name {
    font-size: 12px;
    margin: 10px 0;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.review-block-name a {
    color: #374767;
}

.review-block-date {
    font-size: 12px;
}

.review-block-rate {
    font-size: 13px;
    margin-bottom: 15px;
}

.review-block-title {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 10px;
}

.review-block-description {
    font-size: 13px;
}



/* Widgets page
==============================================================================*/


/*-- Monthly calender --*/

.monthly_calender {
    width: 100%;
    max-width: 600px;
    display: inline-block;
}


/*-- Profile widget --*/

.profile-widget .panel-heading {
    min-height: 200px;
    background: #fff;
    background-size: cover;
}

.profile-widget .media-heading {
    color: #5B5147;
}

.profile-widget .panel-body {
    padding: 25px 15px;
}

.profile-widget .panel-body .img-circle {
    height: 90px;
    width: 90px;
    padding: 8px;
    border: 1px solid #e2dfdc;
}

.profile-widget .panel-footer {
    padding: 0px;
    border: none;
}

.profile-widget .panel-footer .btn-group .btn {
    border: none;
    font-size: 1.2em;
    background-color: #F6F1ED;
    color: #BAACA3;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    padding: 15px 0;
}

.profile-widget .panel-footer .btn-group .btn:hover {
    color: #F6F1ED;
    background-color: #8F7F70;
}

.profile-widget .panel-footer .btn-group>.btn:not(:first-child) {
    border-left: 1px solid #fff;
}

.profile-widget .panel-footer .btn-group .highlight {
    color: #E56E4C;
}

.logo {
   margin-right: 15px; /* Adjust the margin as needed */
}

.logo img {
   max-height: 50px;
   max-width: 100%;
   object-fit: contain;
   object-position: center;
}



</style>


@include("userscript");
      


</body>
</html>
