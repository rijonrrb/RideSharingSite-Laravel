@extends('admin.layouts.app')
@section('content')
<head>
	<link href="https://mdbootstrap.com/docs/standard/content-styles/icons/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<style type="text/css">
.profile{
	
	margin-left: 40%;
	margin-right: 30%;
	box-shadow: 5px 7px 10px rgba(0, 0, 0, .5);
	padding-top: 5px;
	padding-bottom: 10px;
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
	width: 40%;
	height: 20%;
	margin-left: 5%;
	border-radius:20px;
}
</style>
</head>


<div class="profile" style="background: linear-gradient(45deg, #47cebe,#ef4a82);">
<img class="img" src="img/{{$riders->image}}"  width="2%">
<h1 class="top" align="center">Name: {{$riders->name}}</h1>
<h1 class="top" align="center">Id: {{$riders->id}}</h1>
<h1 class="top" align="center">Gender: {{$riders->gender}}</h1>
<h1 class="top" align="center">Permanent Address: {{$riders->peraddress}}</h1>
<h1 class="top" align="center">Present Address: {{$riders->preaddress}}</h1>
<h1 align="center">Email: {{$riders->email}}</h1>
<h1 align="center">NID no: {{$riders->nid}}</h1>
<h1 align="center">Driving License No: {{$riders->dlic}}</h1>
<div>
	<a href="{{route('riderApproved',['id' => $riders->id])}}" type="button" class="btn btn-success"><i class="bi bi-check2-square" >Accept</i></a>
	<a href="/riderDenay/{{$riders->id}}" type="button" class="btn btn-danger"><i class="bi bi-trash">Delete</i></a>
</div>
</div>
@endsection