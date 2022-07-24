@extends('admin.layouts.design')
@section('content')
<head>
<script src="https://kit.fontawesome.com/dd5c22d004.js" crossorigin="anonymous"></script>
</head>

<body>
         
    <a href="{{route('customerRatings')}}" type="button"></a>

<table class="table table-border ">
<tr>
  <th class="fs-4">Customer Name</th>
  <th class="fs-4">Picture</th>
  <th class="fs-4">Phone</th>
  <th class="fs-4">Ratings</th>
   
</tr>
@foreach($customers as $customer)
<tr>
  <td class="text-decoration-none text-dark fs-4" >{{$customer->name}}</td>
  <td class="text-decoration-none text-dark fs-4"><img src="{{asset('customer_image/'.$customer->image)}}" alt="picture" width="140px" height="140px" ></td>
  <td class="text-decoration-none text-dark fs-4">{{$customer->phone}}</td>
 
  @if($customer->rating === 0)
  <td class="text-decoration-none text-dark fs-4" ><i class='far fa-star' style='font-size:30px;color:gold'></i></td>

  @endif
  @if($customer->rating === 1)
  <td class="text-decoration-none text-dark fs-4"><i class='fas fa-star' style='font-size:30px;color:gold'></i></td>
  @endif

  @if($customer->rating === 2)
  <td class="text-decoration-none text-dark fs-4"><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i></td>
  @endif

  @if($customer->rating === 3)
  <td class="text-decoration-none text-dark fs-4"><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i></td>
  @endif

  @if($customer->rating === 4)
  <td class="text-decoration-none text-dark fs-4"><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i></td>
  @endif

  @if($customer->rating === 5)
  <td class="text-decoration-none text-dark fs-4"><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i><i class='fas fa-star' style='font-size:30px;color:gold'></i></td>
  @endif
  

</tr>
@endforeach
</table>
<div class="row">
{!! $customers->links() !!}
</div>
</body>



@endsection
