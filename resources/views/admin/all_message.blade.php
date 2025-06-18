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
                            <th class="th_header">Name</th>
                            <th class="th_header">Email</th>
                            <th class="th_header">Phone</th>
                            <th class="th_header">Message</th>
                            <th class="th_header">Send Email</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>
                                <div class="desc-scroll">
                                    {{ $data->message }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ url('send_email', $data->id) }}" class="btn btn-success">Send Email</a> 
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