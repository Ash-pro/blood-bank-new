<?php

namespace App\Http\Controllers\dashboard;

use App\BloodDonation;
use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserDetails extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.users.";

        //Permissions
        $this->middleware('permission:read_UserDetails')->only(['index']);
        $this->middleware('permission:create_UserDetails')->only(['create','store']);
        $this->middleware('permission:update_UserDetails')->only(['edit','update']);
        $this->middleware('permission:delete_UserDetails')->only(['destroy']);

    }

    public function index()
    {
        $users = User::where('id' , auth()->user()->id )->first();
        $donationDetails = BloodDonation::orderBy('created_at', 'desc')->get() ;
        $categories = Category::all();
//        dd($donationDetails);
        return view($this->path.'userDetails',compact(['users','donationDetails','categories']));
    }//end of index

    public function edit(User $UserDetail)
    {
//        dd($UserDetail);
        return view($this->path.'userDetails',compact('UserDetail'));
    }//end of edit

    public function update(Request $request, User $UserDetail)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'sometimes|nullable|confirmed',
//            'role_id' => 'required|numeric',
        ]);
        $data = $request->except('password','role_id');
        if ($request->password == null){
            $pass = User::where('id',$UserDetail->id)->first();
            $data['password'] = $pass->password;
        }
        $data['role_id'] = 3;
        $UserDetail->update($data);
        $users = User::where('id' , auth()->user()->id )->first();
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return $this->index();
//        return view($this->path.'userDetails',compact('users'));
    }//end of update


}
