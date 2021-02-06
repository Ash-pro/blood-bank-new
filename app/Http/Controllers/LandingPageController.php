<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\AdvertisementItems;
use App\Category;
use App\Consultation_requests;
use App\ContactUs;
use App\ServiceItem;
use App\WhoAreWe;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "welcome";
    }

    public function Landing(){
        return view($this->path);

    }//end of Landing
////
//    public function store (Request $request){
////        dd(1);
//        $request->validate([
//            'email' => 'required|unique:consultation_requests,email',
//        ]);
//        Consultation_requests::create($request->all());
//
//        session()->flash('success',__('site.consultation_requests'));
//        return back();
//    }//end of

}
