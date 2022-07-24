<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Laravel App</title>		

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.accordion .card {
	color: #424e5d;
	border: 1px solid #dddddd;
}
.accordion .card a {
	color: #424e5d;
	text-decoration: none;				
}
.accordion .card-header {
	background: linear-gradient(#fff, #f1f1f1);
	padding: .75rem 1rem;
	position: relative;
}
.accordion .card-header:hover {
	background: linear-gradient(#f1f1f1, #e8e8e8);
}
.accordion .card-header h2 {
	font-size: 1rem;
}
.accordion .fa {
	width: 20px;
	margin-right: .25rem;
}
.accordion .card-header a {
	float: left;
	width: 100%;
	cursor: pointer;
}
.accordion .toggle {
	font-size: .8rem;
	line-height: .8rem;
	cursor: pointer;
	opacity: 0.7;
	position: absolute;
	right: 16px;
	top: 16px;
	width: 14px;
	margin: 0;
}
.accordion .toggle:hover {
	opacity: 1;
}
.accordion .card-body {
	padding: 0;
}
.accordion .list-group-item {				
	border-radius: 0;
	border-width: 1px 0 1px 0;
	padding-left: 30px;
	background: #d6dbe0;
	font-weight: 500;
}
.accordion .list-group-item:hover {
	background: #007bff;
}
.accordion .list-group-item:hover a {
	color: #fff !important;
}
.accordion .list-group-item:hover .badge{
	background: #fff;
	color: #007bff;
}
.accordion .list-group-item a {
	color: #61656b;
	display: block;
}
.accordion .list-group-item .badge {
	float: right;
	min-width: 36px;
}
.accordion .rotate{
	transform: rotate(180deg); 
}
</style>
<script>
$(document).ready(function(){			
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").addClass("rotate");
	}).on('hide.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").removeClass("rotate");
	});
});
</script>
</head>
<body>
@include('rider.navbar.navbar')
<div class="container-fluid mt-5">
	<div class="row">
    <div class="col-lg-2">
    @include('rider.sidebar.sidebar')
    </div>
    <div class="col-lg-10">
			<div class="jumbotron">
            @yield('content')
			</div>
		</div>
	</div>
</div>
@include('rider.footer.footer')
</body>
</html>