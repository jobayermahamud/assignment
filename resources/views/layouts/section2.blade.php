<div class="col-md-4">
    <h3>Section 2</h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
           @if (count($sectionTwo)==0)
               <h1>No Post in this section</h1>
               <?php return; ?>
           @endif
          <div style="background-color:red">
            <a href="#" style="text-decoration:none;color:black">
              <div style="background-color:red">
                  <img src="{{asset('storage/'.$sectionTwo[0]->thumbnail)}}" />
                  @if ($sectionTwo[0]->type==2)
                  <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset=""/>
                  @endif
                  <h5>{{$sectionTwo[0]->title}}</h5>
              </div>
            </a>  
          </div>
              
      
      </div>
    </div>
    @include('layouts.mini-grid',['section_title'=>'Section two title','content'=>$sectionTwo])
  </div>