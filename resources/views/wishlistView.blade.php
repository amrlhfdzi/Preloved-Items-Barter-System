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
      @include("navbar");
      <livewire:product.wishlist-show />
      @include("userscript");
      </body>
</html>