@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                  <div class="col-md-4">
                    Welcome To Your Profile

                    <img src="{{url('')}}/img/Asset1.png" width="100px" height="100px"/><br>
                    <a href="#">Change Image</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
