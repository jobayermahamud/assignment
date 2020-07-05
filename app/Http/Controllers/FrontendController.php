<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontendController extends Controller
{
    public function index(){
        $sectionOnePosts=Post::where('section', 1)->where('visibility',1)->get();
        $sectionTwoPosts=Post::where('section', 2)->where('visibility',1)->get();


        return view('frontend.home',['title'=>"Home page",'sectionOne'=>$sectionOnePosts,'sectionTwo'=>$sectionTwoPosts]);
    }

    public function details($postId){
        $postDetails=Post::where('post_id',$postId)->where('visibility',1)->get();
        return view('frontend.details',['title'=>count($postDetails)> 0 ? $postDetails[0]->title : env('APP_NAME'),'details'=>$postDetails]);
    }
}
