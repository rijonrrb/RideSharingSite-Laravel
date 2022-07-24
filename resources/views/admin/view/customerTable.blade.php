@extends('admin.layouts.app')
@section('content')
<head>
    <link href="https://mdbootstrap.com/docs/standard/content-styles/icons/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">

    </style>
</head>
<form action="{{route('searchc_btn')}}" class="form-group" method="post" align="center">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    <input type="text" name="search" >
    <input type="submit" name="search_btn" value="Search">
    <a href="{{route('customerTable')}}" type="button"><i class="bi bi-arrow-clockwise"></i></a>
<div  class="col col-lg-4 mt-4"> 
	<div class="container2">
	<table class="table table-hover table-dark" border="1">
    <tr style="color: #D2B48C; text-align: center;">
        <th>Name</th>
        <th>ID</th>
        <th  style="vertical-align: middle;">Action</th>
    </tr>
     @foreach($customers as $customer)
    <tr style="text-align: center;">
        <td>{{$customer->name}}</td>
        <td>{{$customer->id}}</td>
        <td>
          <a href="{{route('viewCustomer',['id' => $customer->id])}}" type="button" class="btn btn-primary"><i class="bi bi-eye" ></i></a>
          <a href="{{route('customerUpdate',['id' => $customer->id])}}" type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
          <a href="/customerDelete/{{$customer->id}}" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
          </td>
    </tr>
    @endforeach
</table>
</div>
</div>
@if(!isset($_POST['search_btn']))
<div class="d-flex justify-content-center">
    {!! $customers->links() !!}
</div>
@endif
<a href="{{route('export')}}" type="button" class="btn btn-success"><i class="bi bi-arrow-down-circle-fill">Export</i></a>
</form>
@endsection
