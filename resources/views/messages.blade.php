@extends('profile.master')

@section('content')


<div class="col-md-12">


  <div class="col-md-3" style="background-color:#fff;">
    <h3 align="center">User</h3>
    <ul v-for="privateMsgs in privateMsgs">
      <li style="list-style:none; margin-top:10px; background-color:#ddd; padding:5px;">
<img :src="privateMsgs.pic" style="width:50px;" class="img-circle">
@{{privateMsgs.name}}
<p>here we will display messages from this users</p>
</li>
    </ul>
    <hr>
  </div>


  <div class="col-md-7" style="background-color:#fff;">
    <h3 align="center">Left Sidebar</h3>
    <hr>
  </div>



  <div class="col-md-2" style="background-color:#fff;">
    <h3 align="center">Left Sidebar</h3>
    <hr>
  </div>

</div>



@endsection
