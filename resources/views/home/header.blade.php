<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Header</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <style>
      .logo-link {
         display: flex;
         align-items: center;
         height: 100%;
      }

      .logo-img {
         height: 90px;
         width: auto;
         max-height: 100%;
      }

      .header {
         background: #fff;
         padding: 10px 0;
         border-bottom: 1px solid #ddd;
      }
   </style>
</head>
<body>

   <div class="header">
      <div class="container">
         <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.html" class="logo-link">
                           <img src="images/image_logo.jpg" alt="Logo" class="logo-img" />
                        </a>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Navigation Section -->
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
               <nav class="navigation navbar navbar-expand-md navbar-dark">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url("our_rooms")}}">Our Room</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url("hotel_gallary")}}">Gallery</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url("contact_us")}}">Contact Us</a>
                        </li>

                        <!-- Laravel Blade Authentication Logic -->
                        @if (Route::has('login'))
                           @auth
                              <x-app-layout></x-app-layout>
                           @else
                              <li class="nav-item" style="padding-right: 5px">
                                 <a class="btn btn-success" href="{{ url('login') }}">Login</a>
                              </li>
                              @if (Route::has('register'))
                                 <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                                 </li>
                              @endif
                           @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
