@extends('layouts.navigation')
@section('head')

      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($profile as $key=>$user)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$user->users->name}}</td>
            <td>{{$user->users->email}}</td>
            <td>{{$user->users->status}}</td>
            <td>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
<script>
$(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection
