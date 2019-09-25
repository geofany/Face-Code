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
        <div class="col-md-12" style="margin-top:10px">
          <img :src="singleMsgs.pic" style="width:30px; margin-left:5px;" class="img-circle pull-right">
          <div style="float:right; background-color:#0084FF; padding:5px 15px 5px 15px; margin-right:10px; color:#fff; border-radius: 10px;">
            @{{singleMsgs.msg}}
          </div>

        </div>
      </div>
      <div v-else>
        <div class="col-md-12 pull-right" style="margin-top:10px">
          <img :src="singleMsgs.pic" style="width:30px; margin-left:5px;" class="img-circle pull-left">
          <div style="float:left; background-color:#F0F0F0; padding:5px 15px 5px 15px; margin-left:5px; border-radius: 10px; text-align:right;">
            @{{singleMsgs.msg}}
          </div>

        </div>
      </div>
    </div>
    <hr>

      <textarea class="col-md-12 form-control" v-model="msgFrom" @keydown="inputHandler"
style="border:none; margin-top:15px;"></textarea>


    <!-- <input type="text" v-model="conID"> -->

  </div>

  <div class="col-md-3 pull-right" style="background-color:#fff; min-height:600px; border-left:5px solid #F5F8FA;">
    <h3 align="center">User Information</h3>
    <hr>
  </div>

</div>



@endsection
