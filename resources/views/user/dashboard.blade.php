@extends('layouts.userhead')
@section('users')

<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Welcome {{Auth::user()->name}}</h1>
    <p class="lead">This is your Leave Management Profile</p>
    <hr class="my-4">
    @if(empty($profile))
    <p>Please Complete your Profile Details!</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
        Click Here
      </button>
      <div class="modal fade" id="exampleModaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Complete Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('user/profile/')}}">@csrf
            <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select your Section/Department</label>
                        <select class="form-control" name="department_id" id="exampleFormControlSelect1">
                          @foreach(App\Models\Department::all() as $dept)
                          <option value="{{$dept->id}}">{{$dept->department_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                        <input type="number" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" id="designation">
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label for="idnumber" class="form-label">ID Number</label>
                        <input type="text" name="id_number" class="form-control" id="idnumber">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      @else
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalup">
        Update Profile
      </button>
      <div class="modal fade" id="exampleModalup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Complete Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('user/profileupdate/'.$profile->id)}}">@csrf
              <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Select your Section/Department</label>
                          <select class="form-control" name="department_id" id="exampleFormControlSelect1">
                            @foreach(App\Models\Department::all() as $dept)
                            <option value="{{$dept->id}}" @if($profile->department_id == $dept->id) SELECTED @endif>{{$dept->department_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                          <input type="number" name="mobile" value="{{$profile->mobile}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="mb-3">
                          <label for="designation" class="form-label">Designation</label>
                          <input type="text" name="designation" value="{{$profile->designation}}" class="form-control" id="designation">
                        </div>
                      </div>
                      <div class="col">
                        <div class="mb-3">
                          <label for="idnumber" class="form-label">ID Number</label>
                          <input type="text" name="id_number" value="{{$profile->id_number}}" class="form-control" id="idnumber">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <br><br>
      <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <ul class="nav nav-tabs" role="tablist" id="rowTab">
    <li class="active nav-item"><a href="#personal-info" class="nav-link" data-toggle="tab">New Leave Application</a></li>
    <li class="nav-item"><a href="#Employment-info" class="nav-link" data-toggle="tab">Recent Leaves</a></li>
    <li class="nav-item"><a href="#career-path" class="nav-link" data-toggle="tab">Leave History</a></li>
    <li class="nav-item"><a href="#warnings" class="nav-link" data-toggle="tab">Others</a></li>
</ul>
<!-- end: tabs link -->

<div class="tab-content">
    <div class="tab-pane active" id="personal-info">
      <div class="alert alert-success" role="alert">
      Leave Application Form
    </div>
      <form method="post" action="{{url('user/applynewleave')}}">@csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" id="sd">
        <input type="hidden" name="department_id" value="{{$profile->department_id}}" class="form-control" id="sd">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="lt" class="form-label">Leave Type</label>
                <select class="form-select" name="leave_id" id="lt" aria-label="Default select example" required>
                  <option selected>Open this select menu</option>
                  @foreach(App\Models\LeaveTypes::all() as $leave)
                  <option value="{{$leave->id}}">{{$leave->leave_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="sd">Choose Date From</label>
                <input type="date" name="start_date" class="form-control" id="sd">
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="ld">Choose Date To</label>
                <input type="date" name="end_date" class="form-control" id="ld">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Reason for Leave</label>
                <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="ro">Reporting Officer</label>
                <input type="text" name="reporting_o" class="form-control" id="ro">
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
      </form>
    </div>

    <div class="tab-pane" id="Employment-info">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Leave Type</th>
            <th scope="col">Date From</th>
            <th scope="col">Date To</th>
            <th scope="col">Approval Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($leaves as $key=>$leave)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$leave->leaveName->leave_name}}</td>
            <td>{{$leave->start_date}}</td>
            <td>{{$leave->end_date}}</td>
            <td>
              @if($leave->status == 1)
                @if($leave->leaveStat->approval_status == 1)
                Approved
                @else
                <span style="color:red">Disapproved<br>Reason: {{$leave->leaveStat->disapprove_reason}}</style>
                @endif
              @else
                Approval Pending
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalup{{$leave->id}}">
                View
              </button>
              <div class="modal fade" id="exampleModalup{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Leave</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                          <div class="container">
                            <table class="table table-danger table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Date of Application</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{$leave->created_at}}</th>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-success table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Leave Type</th>
                                  <th scope="col">Full Name</th>
                                  <th scope="col">Leave From</th>
                                  <th scope="col">Leave to</th>
                                  <th scope="col">Number of Days</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{$leave->leaveName->leave_name}}</th>
                                  <td>{{$leave->multusers->name}}</td>
                                  <td>{{$leave->start_date}}</td>
                                  <td>{{$leave->end_date}}</td>
                                  <td>
                                    <?php
                                    $first = $leave->start_date;
                                    $second = $leave->end_date;
                                    $date1=date_create("$first");
                                    $date2=date_create("$second");
                                    $diff=date_diff($date1,$date2);
                                    $dura = intval($diff->format("%a"))+1;
                                    echo $dura;
                                     ?>
                                  </td>
                                </tr>
                              </tbody>
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Reporting Officer</th>
                                  <th scope="col">Latest Applied Leave</th>
                                  <th scope="col" colspan="3">Reason</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{$leave->reporting_o}}</th>
                                  <td>{{'Database'}}</td>
                                  <td colspan="3">{{$leave->reason}}</td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-warning table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Sanction Status</th>
                                  <th scope="col">Signed on</th>
                                  <th scope="col">Signed By</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">
                                    @if($leave->status == 1)
                                      @if($leave->leaveStat->approval_status == 1)
                                      Approved
                                      @else
                                      <span style="color:red">Disapproved<br>Reason: {{$leave->leaveStat->disapprove_reason}}</style>
                                      @endif
                                    @else
                                      Approval Pending
                                    @endif</th>
                                  <td>
                                    @if($leave->status == 1)
                                    {{$leave->leaveStat->created_at}}
                                    @endif
                                  </td>
                                  <td colspan="3">@if($leave->status == 1){{$leave->leaveStat->approver_name}}<br>{{$leave->leaveStat->approver_designation}}@endif</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
        </table>
    </div>

    <div class="tab-pane" id="career-path">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Leave Type</th>
            <th scope="col">Date From</th>
            <th scope="col">Date To</th>
            <th scope="col">Approval Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($leavesall as $key=>$leave)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$leave->leaveName->leave_name}}</td>
            <td>{{$leave->start_date}}</td>
            <td>{{$leave->end_date}}</td>
            <td>
              @if($leave->status == 1)
                @if($leave->leaveStat->approval_status == 1)
                Approved
                @else
                <span style="color:red">Disapproved<br>Reason: {{$leave->leaveStat->disapprove_reason}}</style>
                @endif
              @else
                Approval Pending
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalupx{{$leave->id}}">
                View
              </button>
              <div class="modal fade" id="exampleModalupx{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Leave</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                          <div class="container">
                            <table class="table table-danger table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Date of Application</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{$leave->created_at}}</th>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-success table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Leave Type</th>
                                  <th scope="col">Full Name</th>
                                  <th scope="col">Leave From</th>
                                  <th scope="col">Leave to</th>
                                  <th scope="col">Number of Days</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{$leave->leaveName->leave_name}}</th>
                                  <td>{{$leave->multusers->name}}</td>
                                  <td>{{$leave->start_date}}</td>
                                  <td>{{$leave->end_date}}</td>
                                  <td>
                                    <?php
                                    $first = $leave->start_date;
                                    $second = $leave->end_date;
                                    $date1=date_create("$first");
                                    $date2=date_create("$second");
                                    $diff=date_diff($date1,$date2);
                                    $dura = intval($diff->format("%a"))+1;
                                    echo $dura;
                                     ?>
                                  </td>
                                </tr>
                              </tbody>
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Reporting Officer</th>
                                  <th scope="col">Latest Applied Leave</th>
                                  <th scope="col" colspan="3">Reason</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{$leave->reporting_o}}</th>
                                  <td>{{'Database'}}</td>
                                  <td colspan="3">{{$leave->reason}}</td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="table table-warning table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Sanction Status</th>
                                  <th scope="col">Signed on</th>
                                  <th scope="col">Signed By</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">
                                    @if($leave->status == 1)
                                      @if($leave->leaveStat->approval_status == 1)
                                      Approved
                                      @else
                                      <span style="color:red">Disapproved<br>Reason: {{$leave->leaveStat->disapprove_reason}}</style>
                                      @endif
                                    @else
                                      Approval Pending
                                    @endif</th>
                                  <td>
                                    @if($leave->status == 1)
                                    {{$leave->leaveStat->created_at}}
                                    @endif
                                  </td>
                                  <td colspan="3">@if($leave->status == 1){{$leave->leaveStat->approver_name}}<br>{{$leave->leaveStat->approver_designation}}@endif</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
        </table>
    </div>

    <div class="tab-pane" id="warnings">
        This tab is for future use
    </div>
</div>
<script>
$(document).ready(function() {
  if (location.hash) {
      $("a[href='" + location.hash + "']").tab("show");
  }
  $(document.body).on("click", "a[data-toggle='tab']", function(event) {
      location.hash = this.getAttribute("href");
  });
});
$(window).on("popstate", function() {
  var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
  $("a[href='" + anchor + "']").tab("show");
});
</script>
      @endif

@endsection
