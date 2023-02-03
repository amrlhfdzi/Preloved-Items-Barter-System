<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">



<title>bs5 edit profile account details - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-xl px-4 mt-4">

<nav class="nav nav-borders">
<a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
<a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
<a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
<a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Notifications</a>
</nav>
<hr class="mt-0 mb-4">
<div class="row">
<div class="col-xl-4">

<div class="card mb-4 mb-xl-0">
<div class="card-header">Profile Picture</div>
<div class="card-body text-center">

<img class="img-account-profile rounded-circle mb-2" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="">

<div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

<form enctype="multipart/form-data" action="/edit" method="POST">
<input class="" type="file" name="avatar"></input>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>

</div>
</div>
</div>
<div class="col-xl-8">

@if (session('message'))
<p class="alert alert-success">{{session('message')}}</p>
@endif

@if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li class="text-danger">{{$error}}</li>
    @endforeach
</ul>
@endif

<div class="card mb-4">
<div class="card-header">Account Details</div>
<div class="card-body">
<form action="{{url('edit')}}" method="POST">
@csrf



<div class="mb-3">
<label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
<input class="form-control" name="username" type="text" placeholder="Enter your username" value="{{Auth::user()->userDetail->username ?? ''}}">
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputFirstName">Full name</label>
<input class="form-control" name="name" type="text" placeholder="Enter your full name" value="{{Auth::user()->name}}">
</div>


</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputOrgName">E-mail Address</label>
<input class="form-control" name="email" type="email" placeholder="Enter your email address" value="{{Auth::user()->email}}" readonly>
</div>


</div>

<div class="col-md-6">
<label class="small mb-1" for="inputEmailAddress">Phone number</label>
<input class="form-control" name="phone" type="text" placeholder="Enter your phone number" value="{{Auth::user()->userDetail->phone ?? ''}}">
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputPhone">Address</label>
<textarea class="form-control" name="address" type="text" placeholder="Enter your address">{{Auth::user()->userDetail->address ?? ''}}</textarea>
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputPhone">Description</label>
<textarea class="form-control" name="description" type="text" placeholder="Enter your description"> {{Auth::user()->userDetail->description ?? ''}}</textarea>
</div>
</div>

<button onclick="{{url('/profile')}}" class="btn btn-primary" type="submit">Save changes</button>
</form>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
</style>
<script type="text/javascript">

</script>
</body>
</html>