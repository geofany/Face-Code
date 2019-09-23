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
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
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
            right: 10px;
            top: 18px;
        }

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
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Dashboard</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif

<div class="container">
<div id="app">
  @{{msg}} <small style="color:green;">@{{content}}</small>
<form method="post" enctype="multipart/form-data" v-on:submit.prevent="addPost">
<textarea v-model="content"></textarea>
<button type="submit" class="btn btn-success">Submit</button>
</form>

</div>
@foreach($posts as $post)
  <div class="col-md-12" style="background-color:#fff">
<div class="col-md-2 pull-left">
  <img src="{{$post->pic}}" style="width:100px; margin:10px;">
</div>

<div class="col-md-10">
<h3>{{ucwords($post->name)}}</h3>
<p><i class="fa fa-globe"></i> {{ucwords($post->city)}} | {{ucwords($post->country)}}</p>
</div>

<p class="col-md-12" style="color:#333;">{{$post->content}}</p>

  </div>
@endforeach
</div>

    </div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
