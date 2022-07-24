<head>
    <title>PUBLIC HOME</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
      <link href="https://mdbootstrap.com/docs/standard/content-styles/icons/">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
            
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
        height: 100%;
        }
        }

        

    </style>
</head>
<body>

    @if(session('success'))
    <div class="d-flex justify-content-center mt-5">
<div class = "alert alert-success alert-dismissible fade show w-25 fs-6 d-flex justify-content-center " role="alert">
<strong>{{session('success')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

</div>
</div>
@endif
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="image/rideshare.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <h1 class="badge rounded-pill bg-danger">{{Session::get('invalid')}}</h1>
           

<form action="{{route('adminlogin')}}" class="form-group" method="post" align="center">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}

    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="bi bi-google"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="bi bi-facebook"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
             <i class="bi bi-twitter"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>


     <div class="form-outline mb-4">
       
         <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter your email address" />
              <label class="form-label" for="form3Example3">Email address</label>
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>



         <div class="form-outline mb-4">
            <input type="password" name="password" value="{{old('password')}}" id="form3Example4"  class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
        @error('password')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

      <div class="d-flex justify-content-between align-items-center">
    <!-- Checkbox -->

    <a href="#!" class="text-body">Forgot password?</a>
  </div>
    <div class="text-center text-lg-start mt-4 pt-2">
    <button type="submit" value="login" class="btn btn-primary btn-lg"
    style="padding-left: 2.5rem; padding-right: 2.5rem; ">Login</button>
   
    </div>
      

</form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
   
  </div>
</section>
    
</body>
</html>