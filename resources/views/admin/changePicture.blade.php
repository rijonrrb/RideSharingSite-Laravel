@extends('admin.layouts.app')
@section('content')
<head>
    <style type="text/css">
                form.form-group{
            padding-top: 3%;
            text-align: left;
            margin-left: 40%;
            margin-right: 25%;
            border-radius: 30px;
            margin-top: 0%;
            box-shadow: 5px 7px 10px rgba(0, 0, 0, .5);

            
        }
        .img{
    
    
            height: 200px;
            margin-left: 30px;
            border-radius: 50%;
            width: 200px;
        }



    </style>
</head>
<form action="{{route('changePictureSubmit')}}" class="form-group" method="post" align="center" enctype="multipart/form-data">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}

    <div class="r">
    <img class="img" src="img/{{Session::get('picture')}}" >
    </div>
    <input type="file" name="picture" style="margin-top: 30px; border-style: solid; border-color: red; border-width: thin; color: white;" ><br>
        
            <input type="submit" class="btn btn-success" value="Upload" style="margin-left: 80px; width: 30%; margin-top: 30px;">
    

</form>

    

@endsection