@extends('profile.master')

@section('content')

<div class="col-md-12" style="padding:10px">
  <div class="col-md-3 pull-left" style="background-color:#fff;">
    <h3 align="center">User</h3>
    <div v-for="privateMsgs in privateMsgs">
      <li @click="messages(privateMsgs.id)" style="list-style:none; margin-top:10px; background-color:#F3F3F3; padding:5px;" class="row">
        <div class="col-md-3 pull-left">
          <img :src="privateMsgs.pic" style="width:50px;" class="img-circle">
        </div>
        <div class="col-md-9 pull-left" style="margin-top:5px">
          <b>@{{privateMsgs.name}}</b><br>
          <p>here we will display messages from this users</p>
        </div>
      </li>
    </div>
    <hr>
  </div>
  <div class="col-md-6 center-con" style="background-color:#fff; min-height:600px; border-left:5px solid #F5F8FA;">
    <h3 align="center">Messages</h3>
    <div v-for="singleMsgs in singleMsgs">
      <div v-if="singleMsgs.user_from == <?php echo Auth::user()->id; ?>">
        <div style="float:right; background-color:#F0F0F0; padding:15px; margin:20px; text-align:right; color:#333; border-radius: 10px;" class="col-md-9">
          @{{singleMsgs.user_from}} @{{singleMsgs.msg}}
        </div>
      </div>
      <div v-else>
        <div style="float:left; background-color:#0084FF; padding:15px; margin:20px; color:#fff; border-radius: 10px;" class="col-md-9">
          @{{singleMsgs.user_from}} @{{singleMsgs.msg}}
        </div>
      </div>
    </div>
    <hr>
  </div>
  <div class="col-md-2 right-sidebar" style="background-color:#fff;">
    <h3 align="center">User Information</h3>
    <hr>
  </div>

</div>



@endsection
