<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\TeamWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $team_works = TeamWork::WhenSearch(request()->search)->paginate(5);
        return view($this->path.'index',compact('team_works'));
    }//end of index

    public function create()
    {
        return view($this->path.'create');
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:team_works,email',
        ]);
        $data = $request->except('image');
//        dd($data);
        if ($request->hasFile('image')){
            $image = $request->image->store('images','public');
            $data['image'] = $image;
        }
        TeamWork::create($data);
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function show(TeamWork $team_work)
    {
        return view($this->path.'show',compact('team_work'));
    }//end of show

    public function edit(TeamWork $team_work)
    {
        return view($this->path.'create',compact('team_work'));
    }//end of edit

    public function update(Request $request, TeamWork $team_work)
    {
        $request->validate([
            'email' => 'required|unique:team_works,email,'.$team_work->id,
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $image = $request->image->store('images','public');
            Storage::disk('public')->delete($team_work->image);
            $data['image'] = $image;
        }
        $team_work->update($data);

        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(TeamWork $team_work)
    {
        $team_work->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
