<?php

namespace App\Http\Controllers;

use App\Models\Subscribtion;
use App\Models\User;
use App\Models\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    //
    public function index(){
     
        return view("welcome");
    }

    public function subscribe(Request $request){

             // validate the request
             $this->validate($request,['user_id'=>'required',"web_site_id"=>'required']);
             $userId = $request["user_id"];
             $websiteId = $request["web_site_id"];

             $user = User::find($userId);
             $website = WebSite::find($websiteId);

             // saftey check
             if(!isset($user) || !isset($website)){
               return  $this->CustomError(400,"invalid data provide");
             }

             if($website->users->contains($userId)){
                return  $this->CustomError(400,"already subscribed");
             }
             
            $website->users()->attach($user);

            return response()->json(['success' => true]);

    }
}
