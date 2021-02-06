<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\WhoAreWe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class whoAreWeController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.WhoAreWes.";

        //Permissions
        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only(['create','store']);
        $this->middleware('permission:update_categories')->only(['edit','update']);
        $this->middleware('permission:delete_categories')->only(['destroy']);

    }

    public function index()
    {
        $WhoAreWes = WhoAreWe::WhenSearch(request()->search)->paginate(5);
        return view($this->path.'index',compact('WhoAreWes'));
    }//end of index

    public function create()
    {
        return view($this->path.'create');
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'general_description' => 'required|unique:who_are_wes,general_description',
        ]);

        $data = $request->only(['general_description','team_description','youtube_link']);

        if ($request->hasFile('photo1')){
            $photo1 = $request->photo1->store('images','public');
            $data['photo1'] = $photo1;
        }
        if ($request->hasFile('photo2')){
            $photo2 = $request->photo2->store('images','public');
            $data['photo2'] = $photo2;
        }
        WhoAreWe::create($data);
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function edit(WhoAreWe $WhoAreWe)
    {
        return view($this->path.'create',compact('WhoAreWe'));
    }//end of edit

    public function update(Request $request, WhoAreWe $WhoAreWe)
    {
        $request->validate([
            'general_description' => 'required|unique:who_are_wes,general_description,'.$WhoAreWe->id,
        ]);

        $data = $request->only(['general_description','team_description','youtube_link']);

        if ($request->hasFile('photo1')){
            $photo1 = $request->photo1->store('images','public');
            Storage::disk('public')->delete($WhoAreWe->photo1);
            $data['photo1'] = $photo1;
        }else if ($request->hasFile('photo2')){
            $photo2 = $request->photo2->store('images','public');
            Storage::disk('public')->delete($WhoAreWe->photo2);
            $data['photo2'] = $photo2;
        }

        $WhoAreWe->update($data);

//        $WhoAreWe->update([
//
//            'general_description'=>$request->general_description,
//            'team_description'=>$request->team_description,
//            'youtube_link'=>$request->youtube_link,
//            'photo1'=>$request->photo1->store('images','public'),
//            'photo2'=>$request->photo2->store('images','public'),
//
//        ]);
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(WhoAreWe $WhoAreWe)
    {
        if ($WhoAreWe->photo1){
            Storage::disk('public')->delete($WhoAreWe->photo1);
        }elseif ($WhoAreWe->photo2){
            Storage::disk('public')->delete($WhoAreWe->photo2);
        }
        $WhoAreWe->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
