<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table_header{
            border: 2px solid white;
            margin: auto;
            width: 95%;
            text-align: center;
            margin-top: 20px;
        }
        .th_header{
            background: #0d4b6b;
            color: white;
            padding: 8px;
        }
        tr{
            border: 2px solid white;
            color: white;
            font-size: 16px;
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
                            <th class="th_header">Room id</th>
                            <th class="th_header">Name</th>
                            <th class="th_header">Email</th>
                            <th class="th_header">Phone</th>
                            <th class="th_header">Arrive date</th>
                            <th class="th_header">Leave date</th>
                            <th class="th_header">Status</th>
                            <th class="th_header">Room_title</th>
                            <th class="th_header">Price</th>
                            <th class="th_header">Image</th>
                            <th class="th_header">Delete</th>
                            <th class="th_header">Update</th>
                        </tr>
                        @foreach($bookings as $data)
                        <tr>
                            <td>{{$data->room_id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->start_date}}</td>
                            <td>{{$data->end_date}}</td>
                            <td>
                                @if($data->status == 'approve')
                                    <span style="color: blue;">Approved</span>
                                @endif
                                @if($data->status == 'rejected')
                                    <span style="color: red;">Rejected</span>
                                @endif
                                @if($data->status == 'waiting')
                                    <span style="color: orange;">Waiting</span>
                                @endif
                            </td>
                            <td>{{ optional($data->room)->room_title ?? 'N/A' }}</td>
                            <td>{{ optional($data->room)->room_price ?? 'N/A' }}</td>
                            <td>
                                @if(optional($data->room)->image)
                                    <img src="{{ asset($data->room->image) }}" width="100" importance="" >
                                @else
                                    No image
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this booking?')" href="{{url('delete_booking',$data->id)}}">Delete</a>
                            </td>
                            <td>
                                <Span>
                                    <a class="btn btn-primary" href="{{url('approve_book',$data->id)}}">Approve</a>
                                </Span>
                                <Span>
                                    <a class="btn btn-success" href="{{url('rejected_book',$data->id)}}">Rejecte</a>
                                </Span>

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