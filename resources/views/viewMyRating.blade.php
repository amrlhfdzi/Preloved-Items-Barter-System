<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">




<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>


      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>romofyi</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   

</head>
<body>

@include("navbar");

<div class="container mt-5">
<div class="row">
<div class="col-lg-4 pb-5">

<div class="card mb-4">
          <div class="card-body text-center">
            <img src="/uploads/avatars//{{ Auth::user()->avatar }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ Auth::user()->userDetail ? Auth::user()->userDetail->username : Auth::user()->name }}</h5>
            <p class="text-muted mb-1">{{Auth::user()->userDetail->description ?? ''}}</p>
            <p class="text-muted mb-4"></p>
            <!-- <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div> -->
          </div>
        </div>
<div class="wizard">
<nav class="list-group list-group-flush">

</a><a class="list-group-item {{ Request::is('profile') ? 'active':'' }}" href="{{url('/profile')}}"><i class="fe-icon-user text-muted"></i>My Profile </a><a class="list-group-item {{ Request::is('view') ? 'active':'' }}" href="{{url('/view')}}"><i class="fe-icon-map-pin text-muted"></i>My Items</a>
<!-- <a class="list-group-item " href="https://www.bootdey.com/snippets/view/bs4-wishlist-profile-page" target="__blank">
<div class="d-flex justify-content-between align-items-center">
<div><i class="fe-icon-heart mr-1 text-muted"></i>
<div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
</div><span class="badge badge-secondary">3</span>
</div>
</a> -->
<a class="list-group-item {{ Request::is('approvals') ? 'active':'' }}" href="{{url('/approvals')}}" >
<div class="d-flex justify-content-between align-items-center">
<div><i class="fe-icon-tag mr-1 text-muted"></i>
<div class="d-inline-block font-weight-medium text-uppercase">Barter Approval </div>
</div><span class="badge badge-secondary"></span>
</div>
</a>

<a class="list-group-item {{ Request::is('history') ? 'active':'' }}" href="{{url('/history')}}" >
<div class="d-flex justify-content-between align-items-center">
<div><i class="fe-icon-tag mr-1 text-muted"></i>
<div class="d-inline-block font-weight-medium text-uppercase">Barter History </div>
</div><span class="badge badge-secondary"></span>
</div>
</a>

<a class="list-group-item {{ Request::is('rating') ? 'active':'' }}" href="{{url('/rating')}}" >
<div class="d-flex justify-content-between align-items-center">
<div><i class="fe-icon-tag mr-1 text-muted"></i>
<div class="d-inline-block font-weight-medium text-uppercase">My Ratings </div>
</div><span class="badge badge-secondary"></span>
</div>
</a>

</nav>
</div>
</div>

<!-- 
@foreach ($ratings as $rating)
<div class="review-block">
    <div class="row">
        <div class="col-sm-3">
            <div class="review-block-img">
                <img src="{{ asset('https://bootdey.com/img/Content/avatar/avatar6.png') }}" class="img-rounded" alt="User Avatar">
            </div>
            <div class="review-block-name">
                <a href="#">{{ $rating->user->name }}</a>
            </div>
            <div class="review-block-date">{{ $rating->created_at->format('F d, Y') }}<br>{{ $rating->created_at->diffForHumans() }}</div>
        </div>
        <div class="col-sm-9">
            <div class="review-block-rate">
                @for ($i = 1; $i <= 5; $i++)
                    <button type="button" class="btn {{ $i <= $rating->rating ? 'btn-success' : 'btn-default' }} btn-xs" aria-label="Rating" disabled>
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button>
                @endfor
            </div>
            <div class="review-block-title">{{ $rating->comment }}</div>
            <div class="review-block-description">{{ $rating->product->name ?? $rating->barter->name   }}</div>
        </div>
    </div>
</div>
@endforeach -->

<div class="col-sm-12 col-md-8">
    <div class="review-block">
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
                    <div class="review-block-date">{{ $rating->created_at}}</div>
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

                    <div class="review-block-title">{{ $rating->barter->name ?? $rating->product->name  }}</div>
                    <div class="review-block-description">{{ $rating->comment }}</div>
                </div>
            </div>
            <hr>
        @endforeach
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




</style>
<script type="text/javascript">

</script>
</body>
</html>