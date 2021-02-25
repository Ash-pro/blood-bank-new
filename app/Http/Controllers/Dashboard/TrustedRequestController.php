<?php

namespace App\Http\Controllers\Dashboard;

use App\BloodDonation;
use App\ClassificationRequest;
use App\Http\Controllers\Controller;
use App\TrustedRequest;
use Illuminate\Http\Request;

class TrustedRequestController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.trusted_requests.";
        $this->path2 = "dashboard.classifications.";

        //Permissions
        $this->middleware('permission:read_trusted_requests')->only(['index']);
        $this->middleware('permission:create_trusted_requests')->only(['create','store']);
        $this->middleware('permission:update_trusted_requests')->only(['edit','update']);
        $this->middleware('permission:delete_trusted_requests')->only(['destroy']);

    }

    public function index()
    {
        $donation_requests = BloodDonation::all();

        $trusted_requests = ClassificationRequest::WhenSearch(request()->search)->paginate(8);
        return view($this->path.'index',compact(['trusted_requests','donation_requests']));
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
        TrustedRequest::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function show($id)
    {
        return view($this->path.'show');
    }//end of show

    public function edit(TrustedRequest $trusted_request)
    {
        $donation_requests = BloodDonation::all();
        return view($this->path2.'create',compact(['trusted_request','donation_requests']));
    }//end of edit

    public function update(Request $request, TrustedRequest $trusted_request)
    {
        $request->validate([
            'national_id' => 'required|unique:classification_requests,national_id,'.$trusted_request->id,
        ]);
        $trusted_request->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(TrustedRequest $trusted_request)
    {
        $trusted_request->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy

}
