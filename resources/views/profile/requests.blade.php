@extends('profile.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    @foreach($FriendRequests as $uList)

                    <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom: 15px">
                      <div class="col-md-2 pull left">
                          <img src="{{$uList->pic}}" width="80px" height="80px" class="img-rounded"/>
                      </div>
                      <div class="col-md-7 pull-left">
                      <h3 style="margin:0px;"><a href="">{{ucwords($uList->name)}}</a></h3>
                        <p><b>Gender:</b> {{ucwords($uList->gender)}}</p>
                        <p><b>E-mail:</b> {{$uList->email}}</p>
                        </div>

                    <div class="col-md-3 pull-right">
@if (session()->has('msg'))
  <p>
                      {{session()->get('msg')}}
                    </p>
@else
<p>
  <a href="{{url('/accept/')}}/{{$uList->id}}"
    class="btn btn-info btn-sm">Confirm</a>
</p>
@endif
                    </div>
                  </div>
                    @endforeach
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
