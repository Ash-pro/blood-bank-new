<?php

namespace App\Http\Controllers\Dashboard;

use App\BloodDonation;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BloodDonationController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.blood_donations.";

        //Permissions
        $this->middleware('permission:read_blood_donations')->only(['index']);
        $this->middleware('permission:create_blood_donations')->only(['create','store']);
        $this->middleware('permission:update_blood_donations')->only(['edit','update']);
        $this->middleware('permission:delete_blood_donations')->only(['destroy']);

    }

    public function index()
    {
        $blood_donations = BloodDonation::WhenSearch(request()->search)->paginate(8);
        return view($this->path.'index',compact('blood_donations'));
    }//end of index

    public function create()
    {
        $categories = Category::all();
        return view($this->path.'create',compact(['categories']));
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'national_id' => 'required|unique:blood_donations,national_id',
        ]);
        BloodDonation::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function show($id)
    {
        return view($this->path.'show');
    }//end of show

    public function edit(BloodDonation $blood_donation)
    {
        $categories = Category::all();
        return view($this->path.'create',compact(['blood_donation','categories']));
    }//end of edit

    public function update(Request $request, BloodDonation $blood_donation)
    {
        $request->validate([
            'national_id' => 'required|unique:blood_donations,national_id,'.$blood_donation->id,
        ]);
        $blood_donation->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(BloodDonation $blood_donation)
    {
        $blood_donation->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}