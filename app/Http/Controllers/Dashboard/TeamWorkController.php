<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\TeamWork;
use Illuminate\Http\Request;

class TeamWorkController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.team_works.";

        //Permissions
        $this->middleware('permission:read_team_works')->only(['index']);
        $this->middleware('permission:create_team_works')->only(['create','store']);
        $this->middleware('permission:update_team_works')->only(['edit','update']);
        $this->middleware('permission:delete_team_works')->only(['destroy']);

    }

    public function index()
    {
        $categories = TeamWork::WhenSearch(request()->search)->paginate(5);
        return view($this->path.'index',compact('categories'));
    }//end of index

    public function create()
    {
        return view($this->path.'create');
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'TeamWork_name' => 'required|unique:categories,TeamWork_name',
        ]);
        TeamWork::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function show($id)
    {
        //
    }//end of show

    public function edit(TeamWork $TeamWork)
    {
        return view($this->path.'create',compact('TeamWork'));
    }//end of edit

    public function update(Request $request, TeamWork $TeamWork)
    {
        $request->validate([
            'TeamWork_name' => 'required|unique:categories,TeamWork_name,'.$TeamWork->id,
        ]);
        $TeamWork->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(TeamWork $TeamWork)
    {
        $TeamWork->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
