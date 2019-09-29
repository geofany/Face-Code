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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

</script>
<style>
html, body {
  background-color: #ddd;
  font-family: 'Raleway', sans-serif;
  font-weight: 100;
  margin: 0;

}
a {
  color:black;
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
.likeBtn{
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


.comment_form{
  padding:10px;
  margin-bottom:10px;
}
.commentHand{
  color:blue;
}
.commentHand:hover{
  cursor:pointer;
}
/* .upload_wrap{
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
      <a href="{{ url('/home') }}">Dashboard (<b style="color:green;">{{Auth::user()->name}}</b>)</a>
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
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
      @if(Auth::check())
      <ul>
        <li style="list-style-type:none;">
          <a href="{{ url('/profile') }}/{{Auth::user()->slug}}">
            <img src="{{Auth::user()->pic}}"
            width="32" style="margin:5px"  />
            {{Auth::user()->name}}</a>
          </li>
          <hr style="margin:0;">
          <li style="list-style-type:none;">
            <a href="{{url('/')}}"> <img src="/img/news_feed.png"
              width="32" style="margin:5px"  />
              News Feed</a>
            </li>
            <hr style="margin:0">
            <li style="list-style-type:none;">
              <a href="{{url('/friends')}}"> <img src="/img/friends.png"
                width="32" style="margin:5px"  />
                Friends </a>
              </li>
              <hr style="margin:0">
              <li style="list-style-type:none;">
                <a href="{{url('/messages')}}"> <img src="/img/msg.png"
                  width="32" style="margin:5px"  />
                  Messages</a>
                </li>
                <hr style="margin:0">
                <li style="list-style-type:none;">
                  <a href="{{url('/findFriends')}}"> <img src="/img/friends.png"
                    width="32" style="margin:5px"  />
                    Find Friends</a>
                  </li>
                </ul>
                @endif
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
                  <div v-for="post,key in posts">
                    <div class="col-md-12 col-sm-12 col-xs-12 all_posts" style="background-color:#fff; margin-top:10px; padding-top:5px">
                      <div class="col-md-1 pull-left">
                        <img :src="post.user.pic" style="width:60px;">
                      </div>
                      <div class="col-md-11">
                        <div class="row">
                          <div class="col-md-11">
                            <p><a :href="'/profile/'+ post.user.slug" class="user_name">@{{post.user.name}}</a><br>
                              <span style="color:#AAADB3">@{{post.created_at | myOwnTime}}
                                <i class="fa fa-globe"></i></span></p>
                              </div>
                              <div class="col-md-1 pull-right" style="text-align:right">
                                @if(Auth::check())
                                <a href="#" data-toggle="dropdown" aria-haspopup="True">
                                  <img src="/img/settings.png" width="20">
                                </a>

                                <div class="dropdown-menu">
                                  <li><a href="#">Some Action Here</a></li>
                                  <li><a href="#">Some Action Here</a></li>
                                  <hr style="margin:0">
                                  <li v-if="post.user_id == '{{Auth::user()->id}}'">

                                    <a @click="deletePost(post.id)">
                                      <i class="fa fa-trash"></i> Delete
                                    </a>
                                  </li>

                                </div>
                                @endif

                              </div>
                            </div>

                          </div>
                          <p class="col-md-12" style="color:#000; margin-top:15px; font-family:inherit">@{{post.content}}</p>
                          <div style="padding:10px; border-top:1px solid #ddd" class="col-md-12">
                            <div class="col-md-4">


                              @if(Auth::check())
                              <p v-if="post.likes.length!=0" style="color:blue">
                                <i class="fa fa-thumbs-up"></i>
                                liked by <b style="color:green;">@{{post.likes.length}} </b>persons
                              </p>
                              <p v-else class="likeBtn" @click="likePost(post.id)">
                                no one like <br>
                                <i class="fa fa-thumbs-up"></i> Like
                              </p>
                              @endif
                            </div>
                            <div class="col-md-4">
                              <p @click="commentSeen= !commentSeen" class="commentHand">Comment <b>(@{{post.comments.length}})</b></p>
                            </div>
                          </div>
                        </div>
                        <div id="commentBox" v-if="commentSeen">
                          <div class="comment_form">
                            <textarea class="form-control" v-model="commentData[key]"></textarea>
                            <button class="btn btn-success" @click="addComment(post,key)">Send</button>

                          </div>
                          <ul v-for="comment in post.comments">
                            <li>@{{comment.comment}}</li>
                          </ul>

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
              <!-- <script>
              $(document).ready(function(){

              $('#postBtn').hide();

              $("#postText").hover(function() {
              $('#postBtn').show();
            });

          });
        </script> -->
      </body>
      </html>
