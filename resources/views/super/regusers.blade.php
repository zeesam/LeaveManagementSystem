@extends('layouts.app')
@section('admin')

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
          @foreach($data as $key=>$user)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>
              @if($user->status == 'Pending')
              <form method="post" action="{{url('super/approveuser/'.$user->id)}}">@csrf
                <input type="hidden" name="status" value="Approved">
                <button type="submit" class="badge bg-success">Approve</button>
              </form>
              @endif
              @if($user->status != 'Admin')
                <button type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#update{{$user->id}}">
                  Update
                </button>
                <button type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#password{{$user->id}}">
                  Change Password
                </button>
                <button type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                  Delete
                </button>
              @endif
                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you Sure you want to remove {{$user->name}}?
                      </div>
                      <div class="modal-footer">
                        <a href="{{url('/super/deleteuser/'.$user->id)}}" class="btn btn-primary">Yes! Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="password{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form method="post" action="{{url('super/userpass/'.$user->id)}}">@csrf
                      <div class="modal-body">
                        <input type="password" class="form-control" name="password" placeholder="New Password for {{$user->name}}" />
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary">Update</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="update{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <table class="table table-success">
                          <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="text" class="form-control" name="name" value="{{$user->name}}" /></td>
                              <td><input type="email" class="form-control" name="email" value="{{$user->email}}" /></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
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
