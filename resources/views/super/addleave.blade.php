@extends('layouts.app')
@section('admin')
      <table class="table">
        <thead>
          <tr>
            <form method="post" action="{{url('super/addnewleave')}}">@csrf
              <th scope="col"><input type="text" class="form-control" name="leave_name" placeholder="Leave Name" required></th>
              <th scope="col"><input type="text" class="form-control" name="leave_account" placeholder="Leave Account" ></th>
              <th scope="col"><input type="text" class="form-control" name="leave_limit" placeholder="Leave Limit" ></th>
              <th scope="col"><button type="submit" class="btn btn-outline-success">Submit</button></th>
            </form>
          </tr>
        </thead>
      </table>
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Leave Type</th>
            <th scope="col">Leave Account</th>
            <th scope="col">Leave Limit</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$leave)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$leave->leave_name}}</td>
            <td>{{$leave->leave_account}}</td>
            <td>{{$leave->leave_limit}}</td>
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
