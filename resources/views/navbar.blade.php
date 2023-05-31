<header>
   <style>
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

                          
                                 
                                 <li class="nav-item {{ Request::is('redirect') ? 'active':''   }}">
                                    <a class="nav-link" href="{{url('/redirect')}}">Home</a>
                                 </li>
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                 </li> -->
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="products.html">Products</a>
                                 </li> -->
                                 <!-- <li class="nav-item">
                                    <a class="nav-link" href="fashion.html">Fashion</a>
                                 </li> -->
                                 <li class="nav-item {{ Request::is('wishlist') ? 'active':'' }}">
                                    <a class="nav-link" href="{{ url('wishlist')}}">Wishlist (<livewire:product.wishlist-count/>)</a>
                                 </li>
                                 <li class="nav-item {{ Request::is('messages') ? 'active':'' }}">
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

             <!-- Notification Dropdown -->
@if (auth()->check())
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
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <span class="dropdown-item">No new notifications</span>
        </div>
    </li>
@endif
<!-- End Notification Dropdown -->


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