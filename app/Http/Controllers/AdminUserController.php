<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\LeaveTypes;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard');
    }
    public function regusers()
    {
      $data = User::all();
      $profile = UserProfile::where('user_id',Auth::user()->id)->first();
      return view('/super/regusers',['data'=>$data,'profile'=>$profile]);
    }
    public function approveuser(Request $request,$id)
    {
        $user = User::find($id);
        $user->status = $request->input('status');
        $user->save();
        return redirect('super/regusers')->with('message',$user->name.' User Approved!');
    }
    public function userpass(Request $request,$id)
    {
        $user = User::find($id);
        $user->password = HASH::make($request->input('password'));
        $user->save();
        return back()->with('message',$user->name.' Password Updated!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addleave()
    {
        $data = LeaveTypes::all();
        return view('/super/addleave',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $user = User::find($id);
      $delete = $user->delete();
      return redirect('/super/regusers')->with('message','User Deleted!');
    }
}
