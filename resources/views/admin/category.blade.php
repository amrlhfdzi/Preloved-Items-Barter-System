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

                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
                @endif
                
                <div class="card">
                <div class="card-header">
                    <h3> Category
                    
                    <a href="{{url('create')}}"> <button class="" style="float: right;" > Add Category</button>
                    
                    </h3>
                </div>
                <div class="card-body">
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
