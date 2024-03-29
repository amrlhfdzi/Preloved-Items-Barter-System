<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Scripts -->



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
       
  @livewireStyles    
    </head>
    <body >

        <div class="body-wrapper">
            @include('admin.sidebar')

        <div class="main-wrapper mdc-drawer-app-content">
        @include('admin.navbar')

        <div>
            <livewire:admin.category.index/>
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
    @stack('script')
    </body>
</html>



