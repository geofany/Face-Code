<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
use App\notifications;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

class ProfileController extends Controller
{
  public function index($slug) {
    $userData = DB::table('users')
    ->leftJoin('profiles', 'profiles.user_id', 'users.id')
    ->where('slug', $slug)
    ->get();

    return view('profile.index', compact('userData'))->with('data', Auth::user()->profile);;
  }

  public function uploadPhoto(Request $request){

    $file = $request ->file('pic');
    $filename = $file->getClientOriginalName();


    $path = 'img';
    $file->move($path, $filename);


    $folder = "http://localhost:8000/img/";
    $location = $folder.$filename;

    $user_id = Auth::user()->id;
    DB::table('users')->where('id', $user_id)->update(['pic' =>  $location]);

    return back();



  }

  public function editProfileForm() {
    return view('profile.editProfile')->with('data', Auth::user()->profile);
  }

  public function updateProfile(Request $request) {

    $user_id = Auth::user()->id;

    DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
    return back();
  }

  public function findFriends() {

    $uid = Auth::user()->id;
    $allUsers = DB::table('profiles')->leftJoin('users', 'users.id', '=', 'profiles.user_id')->where('users.id', '!=', $uid)->get();

    return view('profile.findFriends', compact('allUsers'));

  }

  public function sendRequest($id) {

    Auth::user()->addFriend($id);

    return back();


  }

  public function requests(){

    $uid = Auth::user()->id;

    $FriendRequests = DB::table('friendships')
    -> rightJoin('users', 'users.id', '=', 'friendships.requester')
    -> whereNull('status')
    -> where('friendships.user_requested', '=', $uid)->get();

    return view('profile.requests', compact('FriendRequests'));
  }

  public function accept($name, $id) {
    $uid = Auth::user()->id;
    $checkRequest = friendships::where('requester', $id)
    ->where('user_requested', $uid)
    ->first();

    if ($checkRequest) {
      $updateFriendship = DB::table('friendships')
      -> where('user_requested', $uid)
      -> where('requester', $id)
      -> update(['status' => 1]);

      $notifications = new notifications;
      $notifications->note = 'Accepted Your Friend Request';
      $notifications->user_hero = $id;
      $notifications->user_logged = Auth::user()->id;
      $notifications->status = '1';
      $notifications->save();


      if ($notifications) {
        return back()->with('msg', 'You Are Now Friend with '.$name);
      }
    } else {
      return back()->with('msg', 'You Are Now Friend with '.$name);
    }
  }

  public function friends() {
    $uid = Auth::user()->id;
    $friends1 = DB::table('friendships')
    ->leftJoin('users', 'users.id', 'friendships.user_requested')
    ->where('status', 1)
    ->where('requester', $uid)
    ->get();


    $friends2 = DB::table('friendships')
    ->leftJoin('users', 'users.id', 'friendships.requester')
    ->where('status', 1)
    ->where('user_requested', $uid )
    ->get();

    $friends = array_merge($friends1->toArray(), $friends2->toArray());
    return view('profile.friends', compact('friends'));
  }

  public function requestRemove($id){
    DB::table('friendships')
    ->where('user_requested', Auth::user()->id)
    ->where('requester', $id)
    ->delete();

    return back()->with('msg', 'Request Has Been Deleted');
  }

  public function notifications($id) {
    $uid = Auth::user()->id;
    $notes = DB::table('notifications')
    ->leftJoin('users', 'users.id', 'notifications.user_logged')
    ->where('notifications.id', $id)
    ->where('user_hero', $uid)
    ->orderBy('notifications.id', 'desc')
    ->get();

    $updateNotifications = DB::table('notifications')
    -> where('notifications.id', $id)
    -> update(['status' => 0]);

    return view('profile.notifications', compact('notes'));
  }

  public function sendMessage(Request $request) {
    $conID = $request->conID;
    $msg = $request->msg;
    $fetch_userTo = DB::table('messages')->where('conversation_id', $conID)
    ->where('user_to', '!=', Auth::user()->id)
    ->get();
    $userTo = $fetch_userTo[0]->user_to;

    $sendMsg = DB::table('messages')->insert([
      'user_to' => $userTo,
      'user_from' => Auth::user()->id,
      'msg' => $msg,
      'status' => 1,
      'conversation_id' => $conID
    ]);
    if ($sendMsg) {
      $userMsg = DB::table('messages')
      ->join('users', 'users.id', 'messages.user_from')
      ->where('messages.conversation_id',$conID)->get();
      return $userMsg;
    }
  }

  public function sendNewMessage(Request $request) {
    $msg = $request->msg;
    $friend_id = $request->friend_id;
    $myID = Auth::user()->id;

    $checkCon1 = DB::table('conversation')->where('user_one', $myID)
    ->where('user_two', $friend_id)->get();

    $checkCon1 = DB::table('conversation')->where('user_two', $myID)
    ->where('user_one', $friend_id)->get();

    $allCons = array_merge($checkCon1->toArray(), $checkCon2->toArray());

    if (count($allCons)!=0) {
      $conID_old = $allCons[0]->id;

      $MsgSent = DB::table('messages')->insert([
        'user_from' => $myID,
        'user_to' => $friend_id,
        'msg' => $msg,
        'conversation_id' => $conID_old,
        'status' => 1
      ]);
    } else {
      $conID_new = DB::table('conversation')->insertGetId([
        'user_one' => $myID,
        'user_two' => $friend_id,


      ]);

      $MsgSent = DB::table('messages')->insert([
        'user_from' => $myID,
        'user_to' => $friend_id,
        'msg' => $msg,
        'conversation_id' => $conID_new,
        'status' => 1
      ]);
    }
  }

  public function setToken(Request $request) {

    $email = $request->email_address;
    //check email exist

    $userInfo = DB::table('users')->where('email', $email)->get()->first();
    if (!isset($userInfo->email)) {
      echo "Wrong Email Address";
    } else {
      $resetLink = DB::table('password_resets')->where('email', $email)->get()->first();
      Mail::to($email)->send(new ResetPassword($userInfo->name, $resetLink->token));

    }

  }

}
