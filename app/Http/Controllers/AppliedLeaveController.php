<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Department;
use App\Models\LeaveStatus;
use App\Models\AppliedLeaves;
class AppliedLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applied()
    {
        $dept = Department::where('department_head_id',Auth::user()->id)->first();
        $leaves = AppliedLeaves::where('department_id',$dept->id)->whereNull('status')->get();
        return view('head/applied',['leaves'=>$leaves]);
    }
    public function admleaves()
    {
        $dept = Department::where('department_head_id',Auth::user()->id)->first();
        $leaves = AppliedLeaves::where('department_id',$dept->id)->whereNotNull('status')->get();
        return view('head/admleaves',['leaves'=>$leaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        $leave = AppliedLeaves::find($id);
        $status = new LeaveStatus;
        $status->leave_id = $leave->leave_id;
        $status->disapprove_reason = $request->input('disapprove_reason');
        $status->approver_name = Auth::user()->name;
        $status->approver_designation = $request->input('approver_designation');
        $status->applied_id = $request->input('applied_id');
        $status->approval_status = 1;
        $status->save();
        $leave->status = 1;
        $leave->save();
        return redirect('/head/applied')->with('message','Leave Sanctioned and Approved!');
    }
    public function disapprove(Request $request, $id)
    {
        $leave = AppliedLeaves::find($id);
        $status = new LeaveStatus;
        $status->leave_id = $leave->leave_id;
        $status->disapprove_reason = $request->input('disapprove_reason');
        $status->approver_name = Auth::user()->name;
        $status->approver_designation = $request->input('approver_designation');
        $status->applied_id = $request->input('applied_id');
        $status->approval_status = 0;
        $status->save();
        $leave->status = 1;
        $leave->save();
        return redirect('/head/applied')->with('message','Leave Disapproved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->FormValidate($request);
        $store = (new AppliedLeaves)->storeLeave($data);
        return redirect('dashboard#Employment-info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function FormValidate(Request $request)
    {
      return $this->validate($request,[
        'leave_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'reason' => 'required',
        'reporting_o' => 'required',
        'user_id' => 'required',
        'department_id' => 'required',
        'status' => 'nullable',
      ]);
    }
}
