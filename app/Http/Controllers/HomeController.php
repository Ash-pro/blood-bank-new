<?php

namespace App\Http\Controllers;

use App\BloodDonation;
use App\User;
use App\VisitorMessages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //Parent Path
        $this->path = "dashboard.welcome";

    //        //Permissions
    //        $this->middleware('permission:read_dashboard')->only(['index']);
    //        $this->middleware('permission:create_dashboard')->only(['create','store']);
    //        $this->middleware('permission:update_dashboard')->only(['edit','update']);
    //        $this->middleware('permission:delete_dashboard')->only(['destroy']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $patients = BloodDonation::all();
        $users = User::all();
        $visitorMessages = VisitorMessages::all();
        return view($this->path,compact(['patients','users','visitorMessages']));
    }
}
