<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- plugins:css -->
  <link rel="stylesheet" href="admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="admin/vendors/jvectormap/jquery-jvectormap.css">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="admin/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="admin/images/favicon.png" />
       
        
    </head>
    <body >

        <div class="body-wrapper">
            @include('admin.sidebar')

        <div class="main-wrapper mdc-drawer-app-content">
        @include('admin.navbar')

        <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                <div class="card">
                <div class="card-header">
                    <h3> Add Category
                    <a href="{{url('create')}}" class="btn btn-primary btn-sm float-end" style="float: right;">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                    <div class="row">

                     

                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control"/>
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control"/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"> {{$category->description}} </textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{ asset('/uploads/category/'.$category->image)}}" width="60px" height="60px"/>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }}/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}"/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"> {{ $category->meta_keyword }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Description </label>
                        <textarea name="meta_description" class="form-control" rows="3"> {{ $category->meta_description }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
                  
                </div> 
              </div>
            
            </div>
        </div>
        </main>
        </div>
        
        </div>

        </div>

        <script src="admin/js/preloader.js"></script>
        <!-- plugins:js -->
  <script src="admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="admin/vendors/chartjs/Chart.min.js"></script>
  <script src="admin/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="admin/js/material.js"></script>
  <script src="admin/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin/js/dashboard.js"></script>
  <!-- End custom js for this page-->

    </body>
</html>
