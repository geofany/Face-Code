<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  html, body {
    background-color: #ddd;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    margin: 0;
  }
  .top_bar{
    position:relative; width:99%; top:0; padding:5px; margin:0 5
  }
  .full-height {
    margin-top:50px
  }
  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }
  .position-ref {
    position: relative;
  }
  .top-right {
    position: absolute;
    right:5px;
    top:18px
  }
  /* .top-left {
  position: absolute;
  } */
  .content {
    text-align: center;
  }
  .title {
    font-size: 84px;
  }
  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }
  .m-b-md {
    margin-bottom: 30px0;
  }
  .head_har{
    background-color: #f6f7f9;
    border-bottom: 1px solid #dddfe2;
    border-radius: 2px 2px 0 0;
    font-weight: bold;
    padding: 8px 6px;

  }
  .left-sidebar, .right-sidebar{
    background-color:#fff;
    min-height:600px;

  }
  .posts_div{
    margin-bottom:10px !important;
  }
  .posts_div h3{
    margin-top:4px !important;

  }
  #postText{
    border:none;
    height:120px
  }
  /* .likeBtn{
  color: #4b4f56; font-weight:bold; cursor: pointer;
}
.left-sidebar li {
padding:10px;
border-bottom:1px solid #ddd;
list-style:none; margin-left:-20px
}
.dropdown-menu{
min-width:120px; left:-30px
}
.dropdown-menu a{
cursor: pointer;
}
.dropdown-divider {
height: 1px;
margin: .5rem 0;
overflow: hidden;
background-color: #eceeef;
}
.user_name {
font-size:18px;
font-weight:bold;
text-transform:capitalize;
margin:3px
}
.all_posts{
background-color:#fff;
padding:5px;
margin-bottom:15px;
border-radius:5px;
-webkit-box-shadow: 0 8px 6px -6px #666;
-moz-box-shadow: 0 8px 6px -6px #666;
box-shadow: 0 8px 6px -6px #666;
}
#commentBox{
background-color:#ddd;
padding:10px;
width:99%; margin:0 auto;
background-color:#F6F7F9;
padding:10px;
margin-bottom:10px
}
#commentBox li {
list-style:none;
padding:10px;
border-bottom:1px solid #ddd
}
.commet_form{
padding:10px;
margin-bottom:10px;
}
.commentHand{
color:blue;
}
.commentHand:hover{
cursor:pointer;
}
.upload_wrap{
position:relative;
display:inline-block;
width:100%
} */
/* .center-con{
max-height:600px;
position: absolute;
left:calc(25%);
overflow-y: hidden;
} */
/* @media (min-width: 268px) and (max-width: 768px) {

.center-con{
max-height:600px;
position: relative;
left:0px;
overflow-y: scroll;
}
} */


</style>
</head>
<body>
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links" style="position:fixed;">
      @if (Auth::check())
      <a href="{{ url('/home') }}">Dashboard</a>
      @else
      <a href="{{ url('/login') }}">Login</a>
      <a href="{{ url('/register') }}">Register</a>
      @endif
    </div>
    @endif

    <div class="col-md-12" id="app">
      <div class="col-md-2 left-sidebar">
        <h3 align="center">Left Sidebar</h3>
        <hr>
      </div>
      <div class="col-md-7 center-con">
        @if(Auth::check())
        <div class="posts_div">
          <div class="head_har">
            @{{msg}}
          </div>
          <div style="background-color:#fff;">
            <div class="row">
              <div class="col-md-1 pull-left">
                <img src="{{Auth::user()->pic}}" style="width:50px; margin:10px" class="img-rounded">
              </div>
              <div class="col-md-11 pull-right">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="addPost">
                  <textarea v-model="content" id="postText" class="form-control" placeholder="What's on your mind ?"></textarea>
                  <button type="submit" class="btn btn-sm btn-info pull-right" style="margin:10px" id="postBtn">Post</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="posts_div">
          <div class="head_har">
            Posts
          </div>
          <div v-for="post in posts">
            <div class="col-md-12" style="background-color:#fff">
              <div class="col-md-2 pull-left">
                <img :src="post.pic" style="width:70px; margin:50px;">
              </div>

              <div class="col-md-10">
                <h3>@{{post.name}}</h3>
                <p><i class="fa fa-globe"></i> @{{post.city}} | @{{post.country}}</p>
                <small>@{{post.created_at}}</small>
              </div>
              <p class="col-md-12" style="color:#333;">@{{post.content}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 right-sidebar">
        <h3 align="center">Right Sidebar</h3>
        <hr>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" defer>
  </script>
  <script>
  $(document).ready(function() {
    $('#postBtn').hide();
    $('#postText').hover(function() {
      $('#postBtn').show();
      $('#postText').animate({'zoom': currentZoom += .5}, 'slow');
    });
  });
  </script>
</body>
</html>
