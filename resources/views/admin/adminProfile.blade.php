@extends('admin.layouts.app')
@section('content')
<head>
<style type="text/css">
.profile{
	
	margin-left: 45%;
	margin-right: 35%;
	box-shadow: 5px 7px 10px rgba(0, 0, 0, .5);
	padding-top: 10px;
}
h1.top{
	font-size: 15px;
	margin-top: 20px;
	
}
h1{
	font-size: 15px;

}
.img{
	border-radius: 0px;
	width: 50%;
	height: 20%;
	margin-left: 5%;
	border-radius:20px;
}
</style>
</head>


<div class="profile" style="background: linear-gradient(45deg, #47cebe,#ef4a82);">
<img class="img" src="img/{{Session::get('picture')}}"  width="2%">
<h1 class="top" align="center">Name: {{Session::get('user')}}</h1><br>
<h1 align="center">Dath of birth: {{Session::get('dob')}}</h1><br>
<h1 align="center">Email: {{Session::get('email')}}</h1><br>
<h1 align="center">Phone number: {{Session::get('phone')}}</h1><br>


</div>

@endsection