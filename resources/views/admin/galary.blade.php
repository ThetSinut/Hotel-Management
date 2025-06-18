<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <center>
                        <h1 style="font-size: 40px; font-weigth: bolder; color: blue;">Galary</h1>
                        <div class="row">
                            @foreach($galary as $data)
                                <div class="col-md-4" style="margin-top: 20px;">
                                    <img src="{{ asset($data->image) }}" alt="Image" style="width: 100%; height: 200px; border-radius: 10px;">
                                    <a href="{{url('delete_galary', $data->id)}}" class="btn btn-danger" style="margin-top: 10px;">Delete image</a>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{url('upload_galary')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="margin-top: 20px;">
                                <label for="file" style="color:white; font-weigth:bolder">Upload Image</label>
                                <input type="file" name="image" id="image">
                                <input type="submit" value="add Image" class="btn btn-primary mt-3">
                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
        @include('admin.fooder')
  </body>
</html>