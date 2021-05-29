@extends('layouts.navigation')
@section('head')

<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Welcome {{Auth::user()->name}}</h1>
    <p class="lead">This is your Leave Management Profile</p>
    <hr class="my-4">

  </div>
</div>

@endsection
