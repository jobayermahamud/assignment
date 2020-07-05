@extends('layouts.master')

@section('container')

<div class="container-fluid">
    <div class="row">
       <div class="col-md-3">

       </div>
       <div class="col-md-6">
           <h4>{{$details[0]->title}}</h4>
           <hr>
           @if ($details[0]->type==1)
              <img style="width:100%;display:block" src="{{asset('storage/'.$details[0]->thumbnail)}}"/>
              <hr>
              <span class="btn btn-success btn-sm">Image content</span>
            @endif

           @if ($details[0]->type==2)
                <iframe width="560" height="315" src="{{$details[0]->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <hr>
                <span class="btn btn-success btn-sm">Video content</span>
            @endif
           <hr>
           <p>
             {{$details[0]->body}}
           </p>
           <hr>
           <div>
            <span class="btn btn-primary btn-sm">Share on facebook</span>
            <hr>
           </div>
       </div>
       <div class="col-md-3">

       </div>
    </div>
  </div>
    
@endsection