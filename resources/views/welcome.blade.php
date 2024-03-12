<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student Management System</title>
    <style>
        /* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
        </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><h2>Student Management System<h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>             
              </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
            <!-- The sidebar -->
            <div class="sidebar">
            <a class="active" href={{ url('menu')}}>Home</a>
            <a href={{ url('students')}}>Student</a>
            <a href={{ url('teachers')}}>Teacher</a>
            <a href={{ url('courses')}}>Courses</a>
            <a href={{ url('batches')}}>Batches</a>
            <a href={{ url('enrollments')}}>Enrollment</a>
            <a href={{ url('payments')}}>Payment</a>
        </div>
    </div>

            <div class="col-md-9">
                
              {{--   <div class="jumbotron" style="background-color: #7FDBFF; text-align: center;">
                    <h1 class="display-4" style="color: #001f3f;">Welcome to the Fun Learning Zone!</h1>
                    <img src="{{ asset('images/kokopium.png') }}" alt="Kids Logo" style="max-width: 100%; height: auto;">
                    <p class="lead" style="color: #001f3f;">Explore a world of learning and fun with our Student Management System!</p>
                    <hr class="my-4">
                    <p style="color: #001f3f;">Choose your adventure:</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" style="background-color: #FFDC00; color: #001f3f;">Start Learning</a>
                        <a class="btn btn-success btn-lg" href="#" style="background-color: #2ECC40; color: #001f3f;">Join the Fun</a>
                    </p>
                </div>
                 --}}

              
              
            </div>
  
  
        </div>



    </div>

    
</body>
</html>


{{-- @extends('layout')

@section('content')
<div class="jumbotron" style="background-color: #7FDBFF; text-align: center;">
    <h1 class="display-4" style="color: #001f3f;">Welcome to the Fun Learning Zone!</h1>
    <img src="{{ asset('images/kokopium.png') }}" alt="Kids Logo" style="max-width: 100%; height: auto;">
    <p class="lead" style="color: #001f3f;">Explore a world of learning and fun with our Student Management System!</p>
    <hr class="my-4">
    <p style="color: #001f3f;">Choose your adventure:</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" style="background-color: #FFDC00; color: #001f3f;">Start Learning</a>
        <a class="btn btn-success btn-lg" href="#" style="background-color: #2ECC40; color: #001f3f;">Join the Fun</a>
    </p>
</div>
@endsection
 --}}