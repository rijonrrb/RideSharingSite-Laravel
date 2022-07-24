@extends('admin.layouts.design')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Update Rider</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</head>
  
<body>        

    <div class="container p-5 rounded w-50">

<form action="{{route('updateRider')}}" class="form-group" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
        <h1 class="ms-5 fw-bold">update Rider</h1>

        <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span>ID</span>
        <input type="text" name="id" value="{{$rider->id}}" class="form-control fs-8 mt-3">
        @error('id')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
   <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Full Name</span>
        <input type="text" name="name" value="{{$rider->name}}" class="form-control fs-8 mt-3">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

   

    <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Date of Birth</span>
        <input type="date" name="dob" value="{{$rider->dob}}"class="form-control fs-8 mt-3">
    </div>

    <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Permanent Address</span>
        <input type="text" name="peraddress" class="form-control fs-8 mt-3" value="{{$rider->peraddress}}">
        @error('peraaddress')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Present Address</span>
        <input type="text"name="preaddress" class="form-control fs-8 mt-3" value="{{$rider->preaddress}}">
        @error('preaddress')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Phone</span>
        <input type="text" name="phone" value="{{$rider->phone}}" class="form-control fs-8 mt-3">
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Email</span>
        <input type="text" name="email" value="{{$rider->email}}" class="form-control fs-8 mt-3">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    

	<div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
      <span class="id">Driving License No</span>

        <input name="dlic" class="form-control fs-8 mt-3" type="text" value="{{$rider->dlic}}">
     </div>
     
     
        <div class="col-md-9 form-group fs-5 ms-5 mt-3 fw-bold">
        <span class="id">Username</span>
        <input type="text" name="username" value="{{$rider->username}}" class="form-control fs-8 mt-3">
        @error('username')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
        
   
       
<!--
    <div class="col-md-9 form-group">
    <span class="id">Upload Image</span>

        <input class="form-control" type="file" name="image" id="image">
    </div> 
-->
   
   
   <div class="mt-3 mx-auto">
            <input type="submit" class="btn btn-outline-secondary ms-5 text-dark ps-3 pe-3 fs-5 fw-bold" value="Update Rider" >
    </div>
</div>

</form>


</div>

    
</body>
</html>
@endsection