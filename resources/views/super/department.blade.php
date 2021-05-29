@extends('layouts.app')
@section('admin')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Section/Department/College
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Section/Department/College</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{url('/super/department/add')}}">@csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name of the Section/Department/College</label>
            <input type="text" name="department_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Name of the Head</label>
            <select class="form-control" name="department_head_id" id="exampleFormControlSelect1">
              @foreach(App\Models\User::where('status','Head')->get() as $admin)
              <option value="{{$admin->id}}">{{$admin->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="designation">Designation of Head</label>
            <input type="text" name="designation" class="form-control" id="designation" aria-describedby="emailHelp">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div><hr>
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Department Name</th>
            <th scope="col">Department Head</th>
            <th scope="col">Head Designation</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$dept)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$dept->department_name}}</td>
            <td>{{$dept->depthead->name}}</td>
            <td>{{$dept->designation}}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dept->id}}">
                Edit
              </button>
              <div class="modal fade" id="exampleModal{{$dept->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Section/Department/College</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{url('/super/department/update/'.$dept->id)}}">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name of the Section/Department/College</label>
                          <input type="text" name="department_name" class="form-control" id="exampleInputEmail1" value="{{$dept->department_name}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Name of the Head</label>
                          <select class="form-control" name="department_head_id" id="exampleFormControlSelect1">
                            @foreach(App\Models\User::where('status','Head')->get() as $admin)
                            <option value="{{$admin->id}}" @if($dept->department_head_id == $admin->id) SELECTED @endif>{{$admin->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="designation">Designation of Head</label>
                          <input type="text" name="designation" class="form-control" id="designation" value="{{$dept->designation}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <hr>
      <script>
      $(document).ready(function(){
              $('#myTable').DataTable();
          });
      </script>
@endsection
