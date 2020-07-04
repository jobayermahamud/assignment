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
            <div style="background-color:red">
                <img src="{{asset('/images/images.jpg')}}" />
                <img class="play-icon" src="{{asset('images/play.jpg')}}" alt="" srcset="">
                <h5>Title</h5>
            </div>
                
        </div>
            
        
        <div class="col-md-6">
              @include('layouts.mini-grid',['section_title'=>'Section one title'])
        </div>
    </div>
</div>