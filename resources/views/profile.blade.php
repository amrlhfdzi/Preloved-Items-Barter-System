<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Swapup</title>
  <link rel="icon" href="images/fevicon.png" type="image/gif">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  @include("navbar")
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4 pb-5">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ Auth::user()->userDetail ? Auth::user()->userDetail->username : Auth::user()->name }}</h5>
            <div class="rating">
              <p>Average Rating: {{ number_format($averageRating, 1) }}/ 5</p>
              @php $ratenum = number_format($averageRating) @endphp
              @for($i = 1;$i<= $ratenum; $i++)
              <i class="fa fa-star checked"></i>
              @endfor
              @for($j = $ratenum+1; $j<= 5; $j++)
              <i class="fa fa-star "></i>
              @endfor
            </div>
          </div>
          <div class="wizard">
            <nav class="list-group list-group-flush text-center">
              <a class="list-group-item {{ Request::is('profile') ? 'active' : '' }}" href="{{ url('/profile') }}"><i class="fe-icon-user text-muted"></i>My Profile</a>
              <a class="list-group-item {{ Request::is('view') ? 'active' : '' }}" href="{{ url('/view') }}"><i class="fe-icon-map-pin text-muted"></i>My Items</a>
              <a class="list-group-item {{ Request::is('approvals') ? 'active' : '' }}" href="{{ url('/approvals') }}">
                <i class="fe-icon-tag mr-1 text-muted"></i>
                <div class="d-inline-block font-weight-medium text-uppercase">Barter Approval</div>
              </a>
              <a class="list-group-item {{ Request::is('history') ? 'active' : '' }}" href="{{ url('/history') }}">
                <i class="fe-icon-tag mr-1 text-muted"></i>
                <div class="d-inline-block font-weight-medium text-uppercase">Barter History</div>
              </a>
              <a class="list-group-item {{ Request::is('rating') ? 'active' : '' }}" href="{{ url('/rating') }}">
                <i class="fe-icon-tag mr-1 text-muted"></i>
                <div class="d-inline-block font-weight-medium text-uppercase">My Ratings</div>
              </a>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-lg-8 pb-5">
        <form action="{{ url('/edit') }}" class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-fn">Username</label>
              <input class="form-control" type="text" name="username" readonly value="{{ Auth::user()->userDetail ? Auth::user()->userDetail->username : Auth::user()->name }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-ln">Full Name</label>
              <input class="form-control" type="text" name="name" readonly value="{{ Auth::user()->name }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-email">E-mail Address</label>
              <input class="form-control" type="email" readonly name="email" value="{{ Auth::user()->email }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-phone">Phone Number</label>
              <input class="form-control" type="text" name="phone" readonly value="{{ Auth::user()->userDetail->phone ?? '' }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-pass">Address</label>
              <textarea class="form-control" readonly name="address">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-confirm-pass">Description</label>
              <textarea class="form-control" readonly name="description">{{ Auth::user()->userDetail->description ?? '' }}</textarea>
            </div>
          </div>
          <div class="col-12">
            <hr class="mt-2 mb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
              <button onclick="{{ url('/edit') }}" class="btn btn-style-1 btn-primary" type="submit">Edit Profile</button>
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

</style>
@include("userscript");
      
</body>
</html>