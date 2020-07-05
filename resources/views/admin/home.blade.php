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
                <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{env('APP_URL')}}">View website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post list</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <hr>
                <h3>Add content</h3>
                <img src="{{ asset('storage/vvX1kVS6oVRrFviO6chx4hO6gOFHUZEk9YtOnwtb.jpeg') }}"/>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="addpost" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="form-group">
                        <label for="posttype">Post type</label>
                        <select name="posttype" id="posttype">
                            <option value="">Select post type</option>
                            <option value="1">Image</option>
                            <option value="2">Video</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="section">Select section</label>
                        <select name="section" id="section">
                            <option value="">Select section</option>
                            <option value="1">Section 1</option>
                            <option value="2">Section 2</option>
                        </select>
                    </div>

                    <div id="videoUrlArea" style="display:none" class="form-group">
                        <label for="section">Set video URL</label>
                        <br>
                        <textarea style="display:block;width:100%" rows="4" cols="4" name="videoUrl"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="postthumbnail">Set post thumbnail</label>
                        </br>
                        <input type="file" id="postthumbnail" name="postthumbnail"><br><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
        </div>
    </div>
    @include('layouts.common-script')
    <script>
        document.getElementById("posttype").addEventListener('change',(e)=>{
            e.preventDefault();
            if(e.target.value==1){
                document.getElementById("videoUrlArea").style="display:none";
                return;
            }

            if(e.target.value==2){
                document.getElementById("videoUrlArea").style="";
                return;
            }
            
        })
    </script>
</body>
</html>