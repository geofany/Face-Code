@extends('profile.master')

@section('content')

<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}">Home</a></li>
    <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
    <li><a href="">Edit Profile</a></li>
  </ol>
    <div class="row">
      @include('profile.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">

                  <div class="col-sm-12 col-md-12">
                    @foreach($allUsers as $uList)
                    <div class="col-md-4" style="margin:5px">


                    <div class="thumbnail" style="margin:5px">
                      <h3 align="center">{{ucwords($uList->name)}}</h3>
                      <a href="">
                        <img src="{{$uList->pic}}" width="80px" height="80px" class="img-circle"/>
                      </a>

                      <div class="caption" align="center">
                        <p>{{$uList->city}} - {{$uList->country}}</p>
                        <p><a href="{{url('/')}}/addFriend/{{$uList->id}}" class="btn btn-success">Add to Friend</a> </p>
                      </div>

                    </div>
                    <p align="center">{{$uList->about}}</p>
                    </div>
                    @endforeach
                  </div>


                    <div class="col-sm-12 col-md-12">


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
