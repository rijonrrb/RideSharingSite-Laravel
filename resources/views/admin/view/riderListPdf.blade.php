<!DOCTYPE html>
<html>
<head>
<style>
#riders {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#riders td, #riders th {
  border: 1px solid #ddd;
  padding: 8px;
}

#riders tr:nth-child(even){background-color: #f2f2f2;}

#riders tr:hover {background-color: #ddd;}

#riders th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Rider Information List</h1>

<table id="riders">
  <tr>
  <th>No</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>ID</th>
  </tr>
  @php
  $no=1;
  @endphp
  @foreach($data as $rider)
  <tr>
  <td>{{$no++}}</td>
  <td>{{$rider->name}}</td>
  <td>{{$rider->phone}}</td>
  <td>{{$rider->email}}</td>
  <td>{{$rider->id}}</td>
    
  </tr>
  @endforeach
  

  
</table>

</body>
</html>


