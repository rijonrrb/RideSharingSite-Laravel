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
            padding-top: 0%;
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

          

<form action="{{route('customerUpdateSubmitted',['id' => $customer->id])}}" class="form-group" method="post" align="center" style="background: linear-gradient(45deg, #47cebe,#ef4a82);">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    <h1 class="badge rounded-pill bg-danger">{{Session::get('cus')}}</h1>
        <h1>Update Customer Info</h1>
 <div class="col-md-9 form-group">
        <span class="id">Name</span>
        <input type="text" name="name" value="{{$customer->name}}" class="form-control" placeholder="Enter your name">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>



    <div class="col-md-9 form-group">
        <span class="id">Date of Birth</span>
        <input type="date" name="dob" value="{{$customer->dob}}"class="form-control">
    </div>




    <div class="col-md-9 form-group">
        <span class="id">Phone</span>
        <input type="text" name="phone" value="{{$customer->phone}}" class="form-control" placeholder="Enter your phone number">
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

        <div class="col-md-9 form-group">
        <span class="id">Address</span>
        <input type="tel" name="address" value="{{$customer->address}}" class="form-control" placeholder="Your Address">
        @error('address')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
        <div class="col-md-9 form-group">
        <span class="id">Username</span>
        <input type="text" name="username" value="{{$customer->username}}" class="form-control" placeholder="Enter your username">
        @error('username')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
        <div class="col-md-9 form-group">
        <span class="id">Email</span>
        <input type="text" name="email" value="{{$customer->email}}" class="form-control" placeholder="Enter your email">
        @error('email')
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