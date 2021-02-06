<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct (){
        // Parent Path
        $this->path = "dashboard.settings.";
    }//end of


    public function Social_Login (){
        return view($this->path.'social_login');
    }//end of Social_Login

    public function Social_Links (){
        return view($this->path.'social_links');
    }//end of Social_Links

    public function store (Request $request){
        setting($request->all())->save();
        session()->flash('success',__('site.DataSavedSuccessfully'));
        return redirect()->back();

    }//end of
}
