<?php

namespace App\Http\Controllers\Dashboard;

use App\BloodDonation;
use App\ClassificationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassificationRequestController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.classifications.";

        //Permissions
        $this->middleware('permission:read_classifications')->only(['index']);
        $this->middleware('permission:create_classifications')->only(['create','store']);
        $this->middleware('permission:update_classifications')->only(['edit','update']);
        $this->middleware('permission:delete_classifications')->only(['destroy']);

    }

    public function index()
    {
        $donation_requests = BloodDonation::all();

        $classifications = ClassificationRequest::WhenSearch(request()->search)->paginate(8);
        $classification_Real_Request = ClassificationRequest::where('type',1)->count();
        $classification_fake_Request = ClassificationRequest::where('type','!=',1)->count();
        return view($this->path.'index',compact(['classifications','donation_requests','classification_fake_Request','classification_Real_Request']));
    }//end of index

    public function create()
    {
        $donation_requests = BloodDonation::all();
        return view($this->path.'create',compact(['donation_requests']));
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'national_id' => 'required|unique:classification_requests,national_id',
        ]);
        ClassificationRequest::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function show($id)
    {
        return view($this->path.'show');
    }//end of show

    public function edit(ClassificationRequest $classification)
    {

        $donation_requests = BloodDonation::all();
        return view($this->path.'create',compact(['classification','donation_requests']));
    }//end of edit

    public function update(Request $request, ClassificationRequest $classification)
    {
        $request->validate([
            'national_id' => 'required|unique:classification_requests,national_id,'.$classification->id,
        ]);
        $classification->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(ClassificationRequest $classification)
    {
        $classification->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy

}
