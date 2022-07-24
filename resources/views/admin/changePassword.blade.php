<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Update password</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/admin/changepass.css')}}">

</head>
  
<body>        

@if(session('failed'))
<div class="d-flex justify-content-center mt-5">
<div class = "alert alert-danger alert-dismissible fade show w-25 fs-6 d-flex justify-content-center " role="alert">
<strong>{{session('failed')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

</div>
</div>
@endif



    <div class="container p-5 rounded mt-5 w-50">
    <h1 class="d-flex justify-content-center fw-bold">Change Password</h1>

<form action="{{route('passwordUpdate')}}" class="form-group ms-5" method="post" >
    {{csrf_field()}}
    <div class="col-md-9 form-group fs-5 mb-3 ms-5 mt-5 fw-bold">
        <span class="id">Current Password</span>
        <input type="password" name="oldPassword"  class="form-control fs-8 mt-3" placeholder="Enter Your Current Password" id="current_password">
        @error('oldPassword')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-9 form-group fs-5 mb-3 ms-5 fw-bold">
        <span class="id">New Password</span>
        <input type="password" name="newPassword"  class="form-control fs-6 mt-3" placeholder="Enter Your New Password" id="newPassword">
        @error('newPassword')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
        <div class="col-md-9 form-group fs-5 mb-5 ms-5 fw-bold">
        <span class="id">Confirm Password</span>
        <input type="password" name="password_confirmation"  class="form-control fs-6 mt-3" id="password_confirmation" placeholder="Enter Your Confirm Password">
       @error('password_confirmation')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

   
    <div class="mt-3 mx-auto ms-5 pb-3">
            <input type="submit" class="btn btn-outline-dark fw-bold fs-6" value="Change" >
    </div>
</div>

</form>


</div>

    
</body>
</html>
