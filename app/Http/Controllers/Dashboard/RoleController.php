<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        // Parent Path
        $this->path = "dashboard.roles.";

        //Permissions
        $this->middleware('permission:read_roles')->only(['index']);
        $this->middleware('permission:create_roles')->only(['create','store']);
        $this->middleware('permission:update_roles')->only(['edit','update']);
        $this->middleware('permission:delete_roles')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::WhereRoleNot(['super_admin','admin'])
            ->WhenSearch(request()->search)
            ->with('permissions')
            ->withCount('users')
            ->paginate(5);
        return view($this->path.'index',compact('roles'));
    }//end of index

    public function create()
    {
        return view($this->path.'create');
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array|min:1',
        ]);
        $role = Role::create($request->all());
        $role->attachPermissions($request->permissions);

        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');

    }//end of store

    public function edit(Role $role)
    {
        return view($this->path.'create',compact('role'));
    }//end of edit

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'required|array|min:1',
        ]);
        $role->update($request->all());
        $role->syncPermissions($request->permissions);
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
