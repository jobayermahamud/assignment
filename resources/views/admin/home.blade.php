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
                <h3>Add content</h3>
                <hr>
                <h4>{{session('status')}}</h4>
                {{-- <img src="{{ asset('storage/3l7I14QWcBKtZYxwQXneSuSAFZYSgM67ws8Lwelp.jpeg') }}"/> --}}
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

                    <div id="contentarea"  class="form-group">
                        <label for="section">Post content/Body</label>
                        <br>
                        <textarea style="display:block;width:100%" rows="4" cols="4" name="body"></textarea>
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

                    <div class="form-group">
                        <label for="visibility">Set Visibility</label>
                        <select name="visibility" id="visibility">
                            <option value="">Set visibility</option>
                            <option value="1">Visible</option>
                            <option value="0">Invisible</option>
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