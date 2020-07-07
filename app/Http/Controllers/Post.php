<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post as Postmodel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class Post extends Controller
{
    public function addPost(Request $request){
          
            $validationArray=array(
                'title' => 'bail|required|unique:assignment_posts',
                'posttype' => 'required',
                'section' => 'required',
                'visibility' => 'required',
                'body' => 'required',
                'postthumbnail' => 'bail|required|image|mimes:jpeg,png|max:1024'
            );
            if((int)$request->posttype==2){
                $validationArray['videoUrl']='required';
            }

            

           $validatedData = $request->validate($validationArray);

           $thumbnailId=uniqid().".".$request->file('postthumbnail')->extension();;
            $path = $request->file('postthumbnail')->storeAs(
                'public', $thumbnailId
            );
           
           $postObj=new Postmodel;
           $postObj->title=$request->title;
           $postObj->body=$request->body;
           $postObj->thumbnail=$thumbnailId;
           $postObj->video_url=$request->videoUrl;
           $postObj->visibility=(int)$request->visibility;
           $postObj->type=(int)$request->posttype;
           $postObj->section=(int)$request->section;
           
           try {
              $postObj->save();
              $request->session()->flash('status', 'Post added successfully');
              return redirect()->route('admin');
           } catch (\Throwable $th) {
               $request->session()->flash('status', 'Fail to add post try again!!');
               return redirect()->route('admin');
           }
           

    }


    public function postList(){
        $postObj=new Postmodel;
        $data=$postObj->all();
        return view('admin.postlist',['posts'=>$data]);
    }


    public function publishUnpublish($postId,$visibility){
        $postObj=Postmodel::find($postId);
        $visibility == 1 ? $postObj->visibility = 0 : $postObj->visibility = 1;
        $postObj->save();
        return $visibility;
    }
 
}
