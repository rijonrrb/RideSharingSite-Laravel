@extends('admin.layouts.app')
@section('content')
<head>
    <title>PUBLIC HOME</title>
    
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




        

    </style>
</head>
<body>        

    <div class="container">

        
          

<form action="{{route('updateAdminProfile')}}" class="form-group" method="post" align="center" style="background: linear-gradient(45deg, #47cebe,#ef4a82);">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    <div>
     <img class="pro" src="img/{{Session::get('picture')}}"><a class="edit" href="{{route('changePicture')}}">Edit</a>
 </div>
 <div class="col-md-9 form-group">
        <span class="id">Name</span>
        <input type="text" name="name" value="{{Session::get('user')}}" class="form-control">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>



    <div class="col-md-9 form-group">
        <span class="id">Date of Birth</span>
        <input type="date" name="dob" value="{{Session::get('dob')}}"class="form-control">
    </div>


    <div class="col-md-9 form-group">
        <span class="id">Email</span>
        <input type="text" name="email" value="{{Session::get('email')}}" class="form-control">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-9 form-group">
        <span class="id">Phone</span>
        <input type="text" name="phone" value="{{Session::get('phone')}}" class="form-control">
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="p">
    <div class="d-grid col-12 mx-auto">
            <input type="submit" class="btn btn-primary" value="Update" >
    </div>
</div>

</form>

</div>    
</body>
</html>
@endsection