<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use App\Models\AppliedLeaves;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $profile = UserProfile::where('user_id',Auth::user()->id)->first();
        $leaves = AppliedLeaves::OrderBy('id','DESC')->where('user_id',Auth::user()->id)->take(1)->get();
        $leavesall = AppliedLeaves::OrderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
        if($user->status == 'Pending')
        {
          Auth::logout();
          return redirect('/')->with('message','Approval Pending!');
        }
        elseif($user->status == 'Admin'){
          return view('/dashboard',['user'=>$user,'profile'=>$profile,'leaves'=>$leaves,'leavesall'=>$leavesall]);
        }
        elseif($user->status == 'Head'){
          return view('head/dashboard',['user'=>$user,'profile'=>$profile,'leaves'=>$leaves,'leavesall'=>$leavesall]);
        }
        else {
          return view('user/dashboard',['user'=>$user,'profile'=>$profile,'leaves'=>$leaves,'leavesall'=>$leavesall]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new UserProfile;
        $data->department_id = $request->input('department_id');
        $data->mobile = $request->input('mobile');
        $data->id_number = $request->input('id_number');
        $data->designation = $request->input('designation');
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
      $data = UserProfile::find($id);
      $data->department_id = $request->input('department_id');
      $data->mobile = $request->input('mobile');
      $data->id_number = $request->input('id_number');
      $data->designation = $request->input('designation');
      $data->user_id = Auth::user()->id;
      $data->save();
      return redirect('/dashboard')->with('message','Profile Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteuser($id)
    {
        //
    }
}
