<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post as Postmodel;
use Illuminate\Support\Facades\Storage;

class Post extends Controller
{
    public function addPost(Request $request){
          
            $validationArray=array(
                'title' => 'bail|required|unique:assignment_posts',
                'posttype' => 'required',
                'section' => 'required',
                'postthumbnail' => 'bail|required|image|max:1024'
            );
            if((int)$request->posttype==2){
                $validationArray['videoUrl']='required';
            }

            $path = $request->file('postthumbnail')->store('public');

            return $path;

            
           $validatedData = $request->validate($validationArray);
           
           $postObj=new Postmodel;
           $postObj->title=$request->title;
           $postObj->thumbnail=$_FILES['postthumbnail']['name'];
           $postObj->video_url=$request->videoUrl;
           $postObj->type=(int)$request->posttype;
           $postObj->section=(int)$request->section;
           
           try {
              $postObj->save();
              return redirect()->route('admin');
           } catch (\Throwable $th) {
               return redirect()->route('admin');
           }
           

    }
}
