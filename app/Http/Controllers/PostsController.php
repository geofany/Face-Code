<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\post;

class PostsController extends Controller
{
  public function index() {

    $posts = DB::table('posts')
    ->get();

    return view('posts', compact('posts'));
  }

  public function addPost(Request $request) {
    $content = $request->content;
    $createPost = DB::table('posts')
    ->insert(['content' => $content,
    'user_id' => Auth::user()->id,
    'status' => 0,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s")]);

    if ($createPost) {
    return post::with('user')->orderBy('created_at', 'DESC')->get();
    }

  }

  public function deletePost($id) {
    $deletePost = DB::table('posts')->where('id', $id)->delete();
    if ($deletePost) {
      return post::with('user', 'likes')->orderBy('created_at', 'DESC')->get();
    }

  }

public function likePost($id){

$likePost = DB::table('likes')->insert([
'posts_id' => $id,
'user_id' => Auth::user()->id
]);

if ($likePost) {
  return post::with('user', 'likes' )->orderBy('created_at', 'DESC')->get();
}

}

}
