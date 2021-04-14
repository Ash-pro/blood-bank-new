<?php

namespace App\Http\Controllers\Dashboard;

use App\Advertisement;
use App\AdvertisementItems;
use App\BloodDonation;
use App\Category;
use App\Consultation_requests;
use App\ContactUs;
use App\Http\Controllers\Controller;
use App\ServiceItem;
use App\User;
use App\VisitorMessages;
use App\WhoAreWe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.welcome";

        //Permissions
        $this->middleware('permission:read_dashboard')->only(['index']);
        $this->middleware('permission:create_dashboard')->only(['create','store']);
        $this->middleware('permission:update_dashboard')->only(['edit','update']);
        $this->middleware('permission:delete_dashboard')->only(['destroy']);
    }

    public function index (){

        $patients = BloodDonation::all();
        $users = User::all();
        $visitorMessages = VisitorMessages::all();
        return view($this->path,compact(['patients','users','visitorMessages']));
    }//end of function





}
