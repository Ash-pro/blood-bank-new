<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\VisitorMessages;
use Illuminate\Http\Request;

class VisitorMessagesController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.visitor_messages.";

        //Permissions
        $this->middleware('permission:read_visitor_messages')->only(['index']);
        $this->middleware('permission:create_visitor_messages')->only(['create','store']);
        $this->middleware('permission:update_visitor_messages')->only(['edit','update']);
        $this->middleware('permission:delete_visitor_messages')->only(['destroy']);
    }

    public function index()
    {
        $visitor_messages = VisitorMessages::WhenSearch(request()->search)->paginate(8);
        return view($this->path.'index',compact('visitor_messages'));
    }//end of index

    public function create()
    {
        return view($this->path.'create');
    }//end of create

    public function store(Request $request)
    {
//        $request->validate([
//            'category_name' => 'required|unique:visitor_messages,category_name',
//        ]);
        VisitorMessages::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function show($id)
    {
        //
    }//end of show

    public function edit(VisitorMessages $visitor_message)
    {
        return view($this->path.'create',compact('category'));
    }//end of edit

    public function update(Request $request, VisitorMessages $visitor_message)
    {
//        $request->validate([
//            'category_name' => 'required|unique:visitor_messages,category_name,'.$visitor_message->id,
//        ]);
        $visitor_message->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(VisitorMessages $visitor_message)
    {
        $visitor_message->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
