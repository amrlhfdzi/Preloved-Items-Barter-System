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
         <div class="header_midil">
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
            </div>
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
                                    <a class="nav-link" href="products.html">Products</a>
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
                        {{Auth::user()->userDetail->username}} <span class="caret"></span>
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

<div class="author-card pb-3">
<div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-award text-md"></i>&nbsp;290 points</a></div>
<div class="author-card-profile">
<div class="author-card-avatar"><img src="/uploads/avatars//{{ $user->avatar }}" alt="">
</div>
<div class="author-card-details">
<h5 class="author-card-name text-lg">{{ $user->userDetail->username ?? '' }}</h5><span class="author-card-position">Joined February 06, 2017</span>
</div>
</div>
</div>
<div class="wizard">
<nav class="list-group list-group-flush">

</a><a class="list-group-item active" href="#"><i class="fe-icon-user text-muted"></i>Profile </a>
<!-- <a class="list-group-item" href="{{url('/view')}}"><i class="fe-icon-map-pin text-muted"></i>Profile</a> -->
<!-- <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-wishlist-profile-page" target="__blank">
<div class="d-flex justify-content-between align-items-center">
<div><i class="fe-icon-heart mr-1 text-muted"></i>
<div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
</div><span class="badge badge-secondary">3</span>
</div>
</a> -->
<!-- <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-account-tickets" target="__blank">
<div class="d-flex justify-content-between align-items-center">
<div><i class="fe-icon-tag mr-1 text-muted"></i>
<div class="d-inline-block font-weight-medium text-uppercase">My Tickets</div>
</div><span class="badge badge-secondary">4</span>
</div>
</a> -->
</nav>
</div>
</div>

<div class="col-lg-8 pb-5">


<form action = "{{url('/edit')}}" class="row">
<div class="col-md-6">
<div class="form-group">
<label for="account-fn">Username</label>
<!-- <input class="form-control" type="text" name="username" readonly value="{{Auth::user()->userDetail->username ?? ''}}" > -->
<input class="form-control" type="text" name="username" readonly value="{{ $user->userDetail ? $user->userDetail->username : $user->name }}" >

</div>
</div>
 <div class="col-md-6">
<div class="form-group">
<label for="account-ln">Full Name</label>
<input class="form-control" type="text" name="name" readonly value="{{$user->name}}" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="account-email">E-mail Address</label>
<input class="form-control" type="email" readonly name="email" value="{{$user->email}}" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="account-phone">Phone Number</label>
<input class="form-control" type="text" name="phone" readonly value="{{$user->userDetail->phone ?? ''}}" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="account-pass">Address</label>
<textarea class="form-control" type="text" readonly name="address"> {{$user->userDetail->address ?? ''}}</textarea>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="account-confirm-pass">Description</label>
<textarea class="form-control" type="text" readonly name="description"> {{$user->userDetail->description ?? ''}}</textarea>
</div>
</div>
<div class="col-12">
<hr class="mt-2 mb-3">
<div class="d-flex flex-wrap justify-content-between align-items-center">

<!-- <button onclick="{{url('/edit')}}" class="btn btn-style-1 btn-primary" type="submit">Edit Profile</button> -->
</div>
</div>
</form>
</div>
</div>
</div>

<form action = "{{url('/edit')}}" class="row">
<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4"> {{ $user->userDetail ? $user->userDetail->username : $user->name }}'s Products</h4>
                </div>

                @forelse ($products as $product)

                <div class="col-md-6">
                <div class="product-card">
                    <div class="product-card-img">
                    @if($product->barters->where('status', 'accepted')->count() > 0)
                        <label class="stock bg-danger">Out of Stock</label>
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
                            <!-- <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div> -->

                            <div style="display: flex; align-items: center;">
  <img src="/uploads/avatars/{{ $product->user->avatar }}" style="width:32px; height:32px; border-radius:50%; margin-right: 10px;">
  <a href="{{ url('/users/'. $product->user_id.'/products') }}">{{ $product->user->userDetail->username }}</a>
</div>
                            <!-- <a href="{{url('producted/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('producted/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm  btn-danger">Delete</a> -->
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

</style>


@include("userscript");
      


</body>
</html>
