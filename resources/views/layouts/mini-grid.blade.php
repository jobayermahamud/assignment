<div class="row">
    @for ($i = 1; $i <count($content); $i++)
      <div class="col-md-6">
        <a href="#" style="text-decoration:none;color:black">
          <div style="background-color:red">
              <img src="{{asset('storage/'.$sectionOne[$i]->thumbnail)}}" />
              @if ($content[$i]->type==2)
                <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset=""/>
              @endif
              <h5>{{$content[$i]->title}}</h5>
          </div>
        </a>  
      </div>
    @endfor
    
    {{-- <div class="col-md-6">
      <div style="background-color:red">
          <img src="{{asset('/images/images.jpg')}}" />
          <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset="">
          <h5>Title</h5>
      </div>
    </div>
    <div class="col-md-6">
      <div style="background-color:red">
          <img src="{{asset('/images/images.jpg')}}" />
          <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset="">
          <h5>Title</h5>
      </div>
  </div>
  <div class="col-md-6">
      <div style="background-color:red">
          <img src="{{asset('/images/images.jpg')}}" />
          <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset="">
          <h5>Title</h5>
      </div>
  </div> --}}
  
</div>