<!DOCTYPE html>
<html lang="en">
   <head>
   @include("usercss");
   <style>
    .required::after{
      content:"*";
      color:red;
      font-size:20px;
    }
    </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include("navbar");
      <livewire:barter.barter-form />
      @include("userscript");
      </body>
</html>