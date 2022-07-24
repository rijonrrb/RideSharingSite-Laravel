@extends('admin.layouts.app')
@section('content')

<head>
    <link href="https://mdbootstrap.com/docs/standard/content-styles/icons/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
       form{
        width: 60%;
       }
       table{
        margin-top: 10px;
       }
    </style>
</head>
<form action="{{route('search_ride_btn')}}" class="form-group" method="post" align="center">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    <input type="text" name="search" placeholder="date month">
    <input type="submit" name="search_ride_btn" value="Search">
    <a href="{{route('rideComplete')}}" type="button"><i class="bi bi-arrow-clockwise"></i></a>

	<table class="table table-hover table-dark" border="1">
    <tr style="color: #D2B48C; text-align: center;">

        <th>Ride ID</th>
        <th>Customer ID</th>
        <th>Rider ID</th>
        <th>Pickup Point</th>
        <th>Destination</th>
        <th>Lenth</th>
        <th>Cost</th>
        <th>Customer status</th>
        <th>Rider status</th>
       
    </tr>
     @foreach($rides as $ride)
    <tr style="text-align: center;">
        <td>{{$ride->id}}</td>
       <td> <a href="{{route('viewCustomer',['id' => $ride->id])}}">{{$ride->customerId}}</a></td>
        <td><a href="{{route('viewRider',['id' => $ride->id])}}">{{$ride->riderId}}</a></td>
        <td>{{$ride->pickupPoint}}</td>
        <td>{{$ride->destination}}</td>
        <td>{{$ride->length}}</td>
        <td>{{$ride->cost}}</td>
        @if($ride->riderStatus === "Ride complete")
        <td ><span class="badge bg-success">Ride Complete</span></td>

        @endif
        @if($ride->riderStatus === "Cancel")
        <td ><span class="badge bg-danger">Ride Cancel</span></td>
        @endif

        @if($ride->riderStatus === "Approve")
        <td ><span class="badge bg-info text-dark">Approve</span> </td>
        @endif



        @if($ride->customerStatus === "Waiting for rider...")
        <td ><span class="badge bg-warning text-dark me-2 cancel-btn">Wait for rider</span></td>

        @endif
        @if($ride->customerStatus === "Ride complete")
        <td ><span class="badge bg-success">{{$ride->customerStatus}}</span></td>
        @endif
        @if($ride->customerStatus === "Cancel")
        <td ><span class="badge bg-danger">Ride Cancel</span></td>
        @endif
        @if($ride->customerStatus === "Approve")
        <td ><span class="badge bg-info text-dark">Approve</span> </td>

        @endif

               
        @if($ride->customerStatus === "ongoing")
        <td ><span class="badge bg-primary">Ride Ongoing</span></td>

        @endif

    </tr>
    @endforeach
</table>



<a href="{{route('rideexport')}}" type="button" class="btn btn-success"><i class="bi bi-arrow-down-circle-fill">Export</i></a>
</form>
@endsection
