<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use App\Models\Post;
use App\Models\Subscribtion;
use App\Models\WebSite;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    private function _sendToSubscribers($post,$id){

        Subscribtion::with('user')->where("web_site_id",$id)->chunk(50, function($subscribtions) use ($post) {
            dispatch(new SendEmailJob($subscribtions,$post));   });
    }


    public function store(Request $request)
    {

        // validate the request
        request()->validate(['title' => 'required','user_id'=>'required',"web_site_id"=>'required']);

        // save the request
        $post = new Post();
        $post->title = $request["title"];
        $post->user_id = $request["user_id"];
        $post->web_site_id = $request["web_site_id"];
        $post->save();
        $this->_sendToSubscribers($post,$request["web_site_id"]);
      
     

        return response()->json(['success' => true]);
    }






}
