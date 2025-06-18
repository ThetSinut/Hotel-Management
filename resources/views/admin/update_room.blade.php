<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style>
        label{
            display:inline-block;
            width: 200px;
        }
        .form-group{
            margin: 10px;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Update Room</h2>
                    <form action="{{url('edit_room',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Room Title</label>
                            <input type="text" name="title" placeholder="Room Title" value="{{$data->room_title}}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description">
                                {{$data->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" placeholder="Price" value="{{$data->room_price}}">
                        </div>
                        <div class="form-group">
                            <label for="">Room Type</label>
                            <select name="type">
                                <option value="{{$data->room_type}}">{{$data->room_type}}</option>
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">free wifi</label>
                            <select name="wifi">
                                <option value="{{$data->wifi}}">
                                    @if($data->wifi == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Current Image</label>
                            <img src="{{ asset($data->image) }}" alt="" style="width: 200px; height: 130px;padding: 10px; margin-left: 22%;">
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Room" class="btn btn-primary">
                        </div>
                    </form>
                </div>    
            </div>
        </div>
        @include('admin.fooder')
  </body>
</html>