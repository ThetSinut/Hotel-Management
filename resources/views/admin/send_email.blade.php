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
                    <div>
                        <h1 style="font-size: 30px; font-weigth: bolder;">Mail send to {{$data->name}}</h1>
                        <form action="{{url('mail',$data->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Greeting</label>
                            <input type="text" name="title" placeholder="Greeting">
                        </div>
                        <div class="form-group">
                            <label for="">Mail Body</label>
                            <textarea name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Action Text</label>
                            <input type="text" name="text" placeholder="Action Text">
                        </div>
                        <div class="form-group">
                            <label for="">Action Url</label>
                            <input type="text" name="text" placeholder="Action Url">
                        </div>
                        <div class="form-group">
                            <label for="">End Line</label>
                            <input type="text" name="endline" placeholder="End Line">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>    
        @include('admin.fooder')
  </body>
</html>