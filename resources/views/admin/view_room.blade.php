<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table_header{
            border: 2px solid white;
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 20px;
        }
        .th_header{
            background: #0d4b6b;
            color: white;
            padding: 10px;
        }
        tr{
            border: 2px solid white;
            color: white;
        }
        .desc-scroll {
        max-height: 80px;
        width: 200px;
        overflow-y: auto;
        overflow-x: auto;
        text-align: left;
        word-break: break-word;
        white-space: pre-line; /* preserves line breaks */
        }
    </style>    
  </head>
  <body>
    @include('admin.header')
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <table class="table_header">
                        <tr>
                            <th class="th_header">Room title</th>
                            <th class="th_header">Description</th>
                            <th class="th_header">Price</th>
                            <th class="th_header">Wifi</th>
                            <th class="th_header">Room type</th>
                            <th class="th_header">image</th>
                            <th class="th_header">Dellete</th>
                            <th class="th_header">Update</th>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->room_title}}</td>
                            <td>
                                <div class="desc-scroll">
                                    {{ $data->description }}
                                </div>
                            </td>
                            <td>{{$data->room_price}}</td>
                            <td>{{$data->wifi}}</td>
                            <td>{{$data->room_type}}</td>
                            <td>
                                <img src="{{ asset($data->image) }}" style="max-width:60px;max-height:60px;">
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete this data?')" class="btn btn-danger" href="{{url('delete_room',$data->id)}}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('update_room',$data->id)}}">Update</a>
                            </td>
                        </tr>
                        @endforeach    
                    </table>
                </div>    
            </div>
        </div>
        @include('admin.fooder')
  </body>
</html>