@extends('layouts.navigation')
@section('head')

      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Leave Type</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($leaves as $key=>$user)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$user->leaveName->leave_name}}</td>
            <td>{{$user->multusers->name}}</td>
            <td>{{$user->multusers->email}}</td>
            <td>@if($user->leaveStat->approval_status == 1)
            Approved
            @else
            Disapproved
            @endif</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                View Details
              </button>
              <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Leave Details of {{$user->multusers->name}}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-danger table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Date of Application</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">{{$user->created_at}}</th>
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
                            <th scope="row">{{$user->leaveName->leave_name}}</th>
                            <td>{{$user->multusers->name}}</td>
                            <td>{{$user->start_date}}</td>
                            <td>{{$user->end_date}}</td>
                            <td>
                              <?php
                              $first = $user->start_date;
                              $second = $user->end_date;
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
                            <th scope="row">{{$user->reporting_o}}</th>
                            <td>{{'Database'}}</td>
                            <td colspan="3">{{$user->reason}}</td>
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
                              @if($user->leaveStat->approval_status == 1)
                              Approved
                              @else
                              <span style="color:red">Disapproved<br>Reason: {{$user->leaveStat->disapprove_reason}}</style>
                              @endif</th>
                            <td>
                              {{$user->leaveStat->created_at}}
                            </td>
                            <td colspan="3">{{$user->leaveStat->approver_name}}<br>{{$user->leaveStat->approver_designation}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
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
