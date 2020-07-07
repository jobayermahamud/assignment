<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
    @include('layouts.common-css')
    <style>
        .row{
            /* margin-top:20px; */
            /* background-color:gray; */
        }

        .row > .col-md-2{
            height:100vh;
            background-color:gray;
            padding-top:20px;
        }

        .row > .col-md-2 >ul >li{
            border-bottom: 1px solid black;
        }

        .row > .col-md-2 >ul >li >a{
            display:block;
            background-color: white;
            color:black
        }

        select{
            display:block;
            width:100%;
            border:1px solid #ced4da;
            padding:10px 0px;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('admin.admin-nav')
            </div>
            <div class="col-md-10">
                <hr>
                <h3>Post list</h3>
                <hr>
                

                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Type</th>
                        <th scope="col">Post Section</th>
                        <th scope="col">Post Visibility</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->post_id}}</th>
                            <th>{{$post->title}}</th>
                            <td>
                                @if ($post->type == 1)
                                    Image post
                                @endif

                                @if ($post->type == 2)
                                   Video post
                                @endif
                            </td>
                            <td>Section {{$post->section}}</td>
                            <td>
                                @if ($post->visibility == 1)
                                    <a visibilityFlag="{{$post->visibility}}" href="{{env('APP_URL')."/publishunpublish/".$post->post_id."/".$post->visibility}}" type="pub_unpub_btn" data-toggle="tooltip" data-placement="top" title="Click to unpublish" class="btn btn-success btn-sm">Published</a>
                                @endif

                                @if ($post->visibility == 0)
                                    <a visibilityFlag="{{$post->visibility}}" href="{{env('APP_URL')."/publishunpublish/".$post->post_id."/".$post->visibility}}" type="pub_unpub_btn" data-toggle="tooltip" data-placement="top" title="Click to publish" class="btn btn-danger btn-sm">Unpublished</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layouts.common-script')
    <script>
        addEventListener('click',(e)=>{
            if(e.target.getAttribute("type")=="pub_unpub_btn"){
                e.preventDefault();
                e.target.textContent="Processing"
                $.ajax({url:e.target.href, success: function(result){
                    location.reload();
                }});
            }
        })
    </script>
</body>
</html>