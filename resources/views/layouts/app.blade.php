<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
       <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CAU Leave Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <span>
        <a class="btn btn-outline-success" href="{{url('dashboard')}}" tabindex="-1" aria-disabled="true">Dashboard</a>
      </span>&nbsp;
      <form class="d-flex" method="POST" action="{{ route('logout') }}">@csrf
        <button class="btn btn-outline-success" type="submit" onclick="event.preventDefault();
                    this.closest('form').submit();">Logout</button>
      </form>
    </div>
  </div>
</nav>
<br>
<div class="alert alert-danger text-center" role="alert">
  Admin Panel
</div>
<div class="container">
  @if(Session::has('message'))
  <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
    <strong>{{Session::get('message')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
  <div class="row">
    <div class="col-3">
      <div class="d-grid gap-2">
        <a class="btn btn-warning" href="{{url('super/addleave')}}">Add Leave Type</a>
        <a class="btn btn-success" href="{{url('super/regusers')}}">Registered Users</a>
        <a class="btn btn-primary" href="{{url('super/department')}}">Add Section/Department/College</a>
      </div>
    </div>
    <div class="col-9">
    @yield('admin')
  </div>
</div>
<p><table width="100%"><tr><td>Property of CAU, Imphal</td><td align="right">Designed and Developed by Er. S Govind Singh</td></tr></table></p>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
