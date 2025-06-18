<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      @include('home.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
            <div class="loader_bg">
                <div class="loader"><img src="images/bophahotel.png" alt="#"/></div>
            </div>
            <!-- end loader -->
            <!-- header -->
            @include('home.header')
            <!-- end header inner -->
            <div  class="our_room">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8 ">
                    <div id="serv_hover"  class="room">
                        <div class="room_img" style="padding: 5px;">
                        <figure>
                            <img style="height: 300px; width: 800px;" src="{{ asset($room->image) }}" alt="#"/>
                        </figure>
                        </div>
                        <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p style="padding: 5px;">{!! Str::limit($room->description, 200) !!}</p>
                        <p style="padding: 5px;">Price: {{$room->room_price}}$</p>
                        <p style="padding: 5px;">Free wifi: {{$room->wifi}}</p>
                        <p style="padding: 5px;">Room Type: {{$room->room_type}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <H1 style="font-size: 40px">Form Booking</H1>
                    <div>
                        @if (session()->has('success'))
                        
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                            <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        </div>
                        
                        @endif
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{url('add_booking',$room->id)}}" method="Post">
                        @csrf
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" @if(Auth::user()) value="{{Auth::user()->name}}" @endif>
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" @if(Auth::user()) value="{{Auth::user()->email}}" @endif>
                        <label for="">Phone</label>
                        <input type="number" class="form-control" placeholder="Phone" name="phone" @if(Auth::user()) value="{{Auth::user()->phone}}" @endif>
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" placeholder="Start date" name="start_date">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" placeholder="End date" name="end_date">
                        <input type="submit" class="btn btn-primary" value="Book Room" style="margin-top: 10px;">
                    </form>
                </div>    
            </div>
            
            </div>
        </div>
      
      <!--  footer -->
      @include('home.footer')
      <script>
        $(function(){
            var dttoday = new Date();
            var dtmonth = dttoday.getMonth() + 1;
            var day = dttoday.getDate();
            var year = dttoday.getFullYear();
            if (dtmonth < 10) {
                month = '0' + month.tostring();
            }
            if (day < 10) {
                day = '0' + day.tostring();
            }
            var maxDate = year + '-' + month + '-' + day;
            $('#start_date').attr('min', maxDate);
            $('#end_date').attr('min', maxDate);
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>