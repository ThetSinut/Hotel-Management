<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/image_logo.jpg" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include('home.header')
      <!-- end header inner -->
      
      <!-- gallery -->
      @include('home.gallery')
      <!-- end gallery -->
      
      <!--  footer -->
      @include('home.footer')
   </body>
</html>