<?php

namespace App\Http\Controllers\Dashboard;

use App\Advertisement;
use App\AdvertisementItems;
use App\Category;
use App\Consultation_requests;
use App\ContactUs;
use App\Http\Controllers\Controller;
use App\ServiceItem;
use App\WhoAreWe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.welcome";
    }

    public function index (){


        return view($this->path);
    }//end of function





}
