<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Dropdowns within Buttons</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: black;">

    <div class="head"><a href="{{route('updateAdminProfile')}}">Welcome, {{Session::get('user')}}
    </a></div>
 <div class="btn">
    <img src="img/{{Session::get('picture')}}" >
        <button type="button" class="btn btn-none dropdown-toggle" data-bs-toggle="dropdown" style="background:linear-gradient(45deg, #47cebe,#ef4a82);"><span></span></button>
        <div class="dropdown-menu">
            <a href="{{route('adminProfile')}}" class="dropdown-item">About Your Profile</a>
            <a href="{{route('updateAdminProfile')}}" class="dropdown-item">Update Profile</a>
            <a href="#" class="dropdown-item">change password</a>
            <div class="dropdown-divider"></div>
            <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
        </div>
    </div>
<div class="m-4" style="background: linear-gradient(45deg, #47cebe,#ef4a82);">

    <div class="btn-group">
      <a class="home" href="{{route('admindashboard')}}">Dashboard</a>
        
    </div>

    <br>
    <div class="btn-group">
        <button type="button" class="btn btn-none dropdown-toggle mt-2" data-bs-toggle="dropdown"><span>Add</span></button>
        <div class="dropdown-menu">
            <a href="{{route('addAdmin')}}" class="dropdown-item">Add Admin</a>
            <a href="{{route('addCustomer')}}" class="dropdown-item">Add Customer</a>
            <a href="{{route('addRider')}}" class="dropdown-item">Add Rider</a>
            <div class="dropdown-divider"></div>
           
        </div>
    </div><br>
    <div class="btn-group">
        <button type="button" class="btn btn-none dropdown-toggle mt-2" data-bs-toggle="dropdown"><span>View</span></button>
        <div class="dropdown-menu">
            <a href="{{route('adminTable')}}" class="dropdown-item">Admin Table</a>
            <a href="{{route('customerTable')}}" class="dropdown-item">Customer Table</a>
            <a href="{{route('riderList')}}" class="dropdown-item">Rider Table</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"></a>
        </div>
    </div><br>
    <div class="btn-group">
        <button type="button" class="btn btn-none dropdown-toggle mt-2" data-bs-toggle="dropdown" ><span>new Status</span></button>
        <div class="dropdown-menu">
            <a href="{{route('riderStatus')}}" class="dropdown-item">Rider approval</a>
          
            <div class="dropdown-divider"></div>
            
        </div>
    </div><br>
    <div class="btn-group">
        <button type="button" class="btn btn-none dropdown-toggle mt-2" data-bs-toggle="dropdown"><span>Statistics</span></button>
        <div class="dropdown-menu">
            <a href="#" class="dropdown-item"></a>
            <div class="dropdown-divider"></div>
        </div>
    </div><br>
    <div class="btn-group">
        <button type="button" class="btn btn-none dropdown-toggle mt-2" data-bs-toggle="dropdown"><span>Ride</span></button>
        <div class="dropdown-menu">
            <a href="{{route('rideComplete')}}" class="dropdown-item">Ride complete</a>
            
            <div class="dropdown-divider"></div>
            
        </div>
    </div>
</div>
</body>
</html>