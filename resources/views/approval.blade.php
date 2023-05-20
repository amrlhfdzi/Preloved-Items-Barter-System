<!DOCTYPE html>
<html lang="en">
   <head>
   @include("usercss");
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
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
                           <li><a href="#"><img src="images/email.png" alt="#"/> demo@gmail.com</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="#"><img src="images/shopping.png" alt="#"/></a> </li>
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
                              <li class="nav-item {{ Request::is('approval') ? 'active':''   }}">
                                    <a class="nav-link" href="{{url('/approval')}}">Home</a>
                                 </li>

                                 
                                 <li class="nav-item">
                                    <a class="nav-link" href="approval">About</a>
                                 </li>
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="products.html">Products</a>
                                 </li> -->
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="fashion.html">Fashion</a>
                                 </li> -->
                                 <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/approval')}}">Wishlist (<livewire:product.wishlist-count/>)</a>
                                 </li>
                                 <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/approval')}}">Chat </a>
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

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Waiting for Approval</div>

                    <div class="card-body">
                        Your account is waiting for our administrator approval.
                        <br />
                        Please check back later.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="{{ asset('assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    @livewireScripts

    </body>
</html>