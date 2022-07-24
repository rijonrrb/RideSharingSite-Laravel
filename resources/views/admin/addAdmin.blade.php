@extends('admin.layouts.app')
@section('content')
<head>
    <title>PUBLIC HOME</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
     <style type="text/css">
        *{
            text-decoration: none;
        }

 

        .col-md-9{
            text-align: left;
        }
        form.form-group{
            padding-top: 3%;
            text-align: left;
            margin-left: 40%;
            margin-right: 25%;
            border-radius: 30px;
            margin-top: 0%;
            box-shadow: 5px 7px 10px rgba(0, 0, 0, .5);

            
        }
        .form-control{
            margin-left: 45px;
           box-shadow: 5px 7px 10px rgba(0, 0, 0, .5);

            
        }

        .id{
            margin-left: 45px;
        }
        .text-danger{
            margin-left: 45px;
        }
        .edit{
            color: red;
           
            font: bold;
            font-size: 25px;
        }

 
        }


        div.pro{
            
            margin-top: 40px;
            height: 80px;
            border-radius: 40px;
        }
        .id{
            color: black;
            font-size: 18px;
        }




        .p{
            margin-top: 10px;
        }
        h1{
            margin-left: 150px;
            color: blue;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .text-danger{
        font-size: 15px;
        background-color: black;
        }



 
    </style>
</head>
<body>        

    <div class="container">

          

<form action="{{route('addAdmin')}}" class="form-group" method="post" align="center" style="background: linear-gradient(45deg, #47cebe,#ef4a82);">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}

    <h1 class="badge rounded-pill bg-danger">{{Session::get('reg')}}</h1>
        <h1>Add Admin</h1>
 <div class="col-md-9 form-group">
        <span class="id">Name</span>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter your name">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>



    <div class="col-md-9 form-group">
        <span class="id">Date of Birth</span>
        <input type="date" name="dob" value="{{old('dob')}}"class="form-control">
        @error('dob')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    <div class="col-md-9 form-group">
        <span class="id">Email</span>
        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter your email">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-9 form-group">
        <span class="id">Phone</span>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter your phone number">
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-9 form-group">
        <span class="id">Password</span>
        <input type="text" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter your password">
        @error('password')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
        <div class="col-md-9 form-group">
        <span class="id">Confirm Password</span>
        <input type="text" name="cpassword" value="{{old('cpassword')}}" class="form-control" placeholder="confirm password">
       @error('cpassword')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="p">
    <div class="d-grid col-12 mx-auto">
            <input type="submit" class="btn btn-primary" value="Add" >
    </div>
</div>

</form>


</div>

    
</body>
</html>
@endsection