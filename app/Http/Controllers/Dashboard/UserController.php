<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.users.";

        //Permissions
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create','store']);
        $this->middleware('permission:update_users')->only(['edit','update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::whereRoleNot(['super_admin'])->get();
        $users = User::WhereRoleNot(['super_admin'])
            ->WhenSearch(request()->search)
            ->whenRole(request()->role_id)
            ->with('roles')
            ->paginate(5);
        return view($this->path.'index',compact('roles','users'));
    }//end of index

    public function create()
    {
        $roles = Role::WhereRoleNot(['super_admin','admin'])->get();
        return view($this->path.'create',compact('roles'));
    }//end of create

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3',
            'image' => 'sometimes|nullable|image',
//            'role_id' => 'required|numeric',
        ]);

        $request->merge(['password'=>bcrypt($request->password)]);

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $image = $request->image->store('images','public');
//            dd(1);
            $data['image'] = $image;
        }
//        dd($data);
        $user = User::create($data);

        if($request->role_id == 3){
            $user->attachRoles([$request->role_id]);
        }else{
            $user->attachRoles(['admin',$request->role_id]);
        }

        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function edit(User $user)
    {
        $roles = Role::WhereRoleNot(['super_admin','admin'])
//            ->with('roles')
            ->get();
        return view($this->path.'create',compact('user','roles'));
    }//end of edit

    public function update(Request $request, User $user)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,'.$user->id,
//            'password' => 'sometimes|nullable|confirmed',
            'image' => 'sometimes|nullable|image',
//            'role_id' => 'required|numeric',
        ]);
        $data = $request->except('image');

        if ($request->hasFile('image')){
            $image = $request->image->store('images','public');
            Storage::disk('public')->delete($user->image);
            $data['image'] = $image;
        }
//        if ($request->password == null){
//            $pass = User::where('id' ,$user->id )->get('password');
//            $request->password = $pass;
//        }else{
//            $data['password'] = $request->password;
//        }




        $user->update($data);

        if($request->role_id == 2){
            $user->syncRoles([$request->role_id]);
        }else{
            $user->syncRoles(['admin',$request->role_id]);
        }

        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(User $user)
    {
        $user->Delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
