@extends('admin.layouts.app')
@section('content')
<head>
    <link href="https://mdbootstrap.com/docs/standard/content-styles/icons/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">

    </style>
</head>
<form action="" class="form-group" method="post" align="center">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    <input type="text" name="search" >
    <input type="submit" name="search_btn" value="Search">
    <a href="#" type="button"><i class="bi bi-arrow-clockwise"></i></a>
<div  class="col col-lg-4 mt-4"> 
	<div class="container2">
	<table class="table table-hover table-dark" border="1">
    <tr style="color: #D2B48C; text-align: center;">
        <th>Name</th>
        <th>ID</th>
        <th  style="vertical-align: middle;">Status</th>
        <th style="vertical-align: middle;">View</th>
    </tr>
    @foreach($riders as $rider)
    <tr style="text-align: center;">
        <td>{{$rider->name}}</td>
        <td>{{$rider->id}}</td>
        <td>{{$rider->status}}</td>
        <td><a href="{{route('riderApproval',['id' => $rider->id])}}" type="button" class="btn btn-primary"><i class="bi bi-eye" ></i></a>
        </td>
    </tr>
   @endforeach
</table>
</div>
</div>

</form>
@endsection
