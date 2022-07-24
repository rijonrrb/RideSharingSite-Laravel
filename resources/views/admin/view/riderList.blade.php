@extends('admin.layouts.design')
@section('content')


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



<form action="" class="col-8 ">
     <div class="d-flex justify-content-evenly mb-5">

     <div class="form-group w-50">
<input type="search" name="search"class = "form-control fs-5" placeholder = "search by name or email"/>

      </div>
      <button class="btn btn-outline-secondary text-white fs-5 ps-3 pe-3">Search </button>
      <a href="{{url('/riderList')}}">
      <button class="btn btn-outline-secondary text-white fs-5 ps-3 pe-3" type = "button">Reset</button>

      </a>
      <div>
    <a href="/exportpdf" class="btn btn-outline-secondary text-white fs-5 ps-3 pe-3">Export PDF</a>
    <a href="{{route('excelExport')}}" type="button" class="btn btn-outline-success text-white fs-5 ps-3 pe-3">Export</a>
</div>
     </div>
</form>


<table class="table table-border ">
    <tr>
        <th class="fs-4">Name</th>
        <th class="fs-4">Picture</th>
        <th class="fs-4">Phone</th>
        <th class="fs-4">Email</th>
        <th class="fs-4">id</th>
    </tr>
    @foreach($riders as $rider)
        <tr >
            <td ><a class="text-decoration-none text-dark fs-4" href="/{{$rider->id}}">{{$rider->name}}</a></td>
            <td class="fs-4">
            <img src="{{asset('img/'.$rider->image)}}"  alt="picture" width="140px" height="140px" ></td>
            <td class="fs-4">{{$rider->phone}}</td>
            <td class="fs-4">{{$rider->email}}</td>
            <td class="fs-4">{{$rider->id}}</td>
            <td><a class="text-decoration-none text-white bg-secondary p-2 m-3 rounded" href="/viewRider/{{$rider->id}}">View</a></td>
            <td><a class="text-decoration-none text-white bg-success p-2 m-3 rounded" href="/updateRider/{{$rider->id}}">Edit</a></td>
            <td><a class="text-decoration-none text-white bg-dark p-2 m-3 rounded" href="/riderDelete/{{$rider->id}}">Delete</a></td>

        </tr>
    @endforeach
</table>
 
@endsection
