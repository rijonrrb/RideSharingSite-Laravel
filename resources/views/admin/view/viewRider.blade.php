@extends('admin.layouts.design')
@section('content')

<div class="bg-dark bg-gradient text-dark bg-opacity-25 w-50 p-3 container">
      <img src="{{asset('image/'.$rider->image)}}" width="140px" height="140px" alt="">
      <br><br>
      <h4 >Name: {{$rider->name}}</h4><br>
<h4 >Username: {{$rider->username}}</h4><br>
<h4 >Gender: {{$rider->gender}}</h4><br>
<h4 >Dath of birth: {{$rider->dob}}</h4><br>
<h4 >Parmanent Address: {{$rider->peraddress}}</h4><br>
<h4 >Present Address: {{$rider->preaddress}}</h4><br>
<h4 >Parmanent Address: {{$rider->peraddress}}</h4><br>
<h4 >Phone number: {{$rider->phone}}</h4><br>
<h4 >Email: {{$rider->email}}</h4><br>
<h4 >NID Number: {{$rider->nid}}</h4><br>
<h4 >Driving License Number: {{$rider->dlic}}</h4><br>
<h4 >Rider Points: {{$rider->rpoint}}</h4><br>
<h4 >Balance: {{$rider->balance}}</h4><br>


</div>

@endsection