<style>
    img{
        display:block;
        width:100%;
    }

    .row div div{
        position:relative;
    }

    .play-icon{
        width: 30%;
        height: 30%;
        position: absolute;
        left: 70%;
        top:55%;
    }
</style>
<div class="col-md-8">
    <h3>Section 1</h3>
    <hr>
    <div class="row" style="border-right:2px solid gray;height:100vh">
        <div class="col-md-6">
            @if (count($sectionOne)==0)
               <h1>No Post in this section</h1>
               <?php return; ?>
           @endif
           <a href="details/{{$sectionOne[0]->post_id}}" style="text-decoration:none;color:black">
                <div style="background-color:red">
                    <img src="{{asset('storage/'.$sectionOne[0]->thumbnail)}}" />
                    @if ($sectionOne[0]->type==2)
                    <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset=""/>
                    @endif
                    <h5>{{$sectionOne[0]->title}}</h5>
                </div>
            </a>
                
        </div>
            
        
        <div class="col-md-6">
              @include('layouts.mini-grid',['section_title'=>'Section one title','content'=>$sectionOne])
        </div>
    </div>
</div>