<?php

namespace App\Http\Controllers\Dashboard;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.contact_us.";

        //Permissions
        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only(['create','store']);
        $this->middleware('permission:update_categories')->only(['edit','update']);
        $this->middleware('permission:delete_categories')->only(['destroy']);

    }

    public function index()
    {
        $contact_us = ContactUs::WhenSearch(request()->search)->paginate(5);
        return view($this->path.'index',compact('contact_us'));
    }//end of index

    public function create()
    {
        return view($this->path.'create');
    }//end of create

    public function store(Request $request)
    {
//        $request->validate([
//            'description' => 'required|unique:categories,description',
//        ]);
        ContactUs::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function edit(ContactUs $contact_u)
    {
        return view($this->path.'create',compact('contact_u'));
    }//end of edit

    public function update(Request $request, ContactUs $contact_u)
    {
//        $request->validate([
//            'description' => 'required|unique:categories,description,'.$contact_us->id,
//        ]);
        $contact_u->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(ContactUs $contact_u)
    {
        $contact_u->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
