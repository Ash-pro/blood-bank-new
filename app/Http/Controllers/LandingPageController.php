<?php

namespace App\Http\Controllers;


use App\Category;
use App\ContactUs;
use App\TeamWork;
use App\VisitorMessages;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "welcome";
    }

    public function Landing(){


        $teamWorks = TeamWork::get();
//        dd($teamWorks);
        return view($this->path,compact(['teamWorks']));

    }//end of Landing


    public function storeMessage(Request $request)
    {
        VisitorMessages::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return view('thanks');
    }//end of store



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
