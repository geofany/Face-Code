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

  public function search(Request $request)
  {
    $qry = $request->qry;
    return  $users= DB::table('users')
    ->where('name', 'like', '%'. $qry . '%')
    ->get();
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
    return post::with('user', 'likes', 'comments')->orderBy('created_at', 'DESC')->get();
    }

  }

  public function deletePost($id) {
    $deletePost = DB::table('posts')->where('id', $id)->delete();
    if ($deletePost) {
      return post::with('user', 'likes', 'comments')->orderBy('created_at', 'DESC')->get();
    }

  }

public function updatePost($id, Request $request)
{
$updatePost = DB::table('posts')->where('id', $id)->update([
'content' => $request->updatedContent,

]);
if ($updatePost) {
  return post::with('user', 'likes', 'comments')->orderBy('created_at', 'DESC')->get();
}
}

public function likePost($id){

$likePost = DB::table('likes')->insert([
'posts_id' => $id,
'user_id' => Auth::user()->id
]);

if ($likePost) {
  return post::with('user', 'likes', 'comments' )->orderBy('created_at', 'DESC')->get();
}

}

public function addComment(Request $request) {

  $comment = $request->comment;
$id = $request->id;

  $createComment = DB::table('comments')
  ->insert(['comment' => $comment,
  'user_id' => Auth::user()->id, 'posts_id'=>$id,
  'created_at' => date("Y-m-d H:i:s"),
  ]);

  if ($createComment) {
  return post::with('user', 'likes', 'comments')->orderBy('created_at', 'DESC')->get();
  }

}

public function saveImage(Request $request)
{
  $img = $request->get('image');
  $exploded = explode(",",$img);

  if (str_contains($exploded[0], 'gif')) {
    $ext = 'gif';
  } else if(str_contains($exploded[0], 'png')) {
    $ext = 'png';
} else {
$ext = 'jpg';
}

$decode = base64_decode($exploded[1]);

$fileName = str_random() . "." . $ext;

$path = public_path() . "/img/" . $fileName;

if (file_put_contents($path,$decode)) {
  $content = $request->content;
  $createPost = DB::table('posts')
  ->insert(['content' => $content,
  'user_id' => Auth::user()->id, 'image' => $fileName,
  'status' => 0,
  'created_at' => date("Y-m-d H:i:s"),
  'updated_at' => date("Y-m-d H:i:s")]);

  if ($createPost) {
  return post::with('user', 'likes', 'comments')->orderBy('created_at', 'DESC')->get();
  }
}

}

}
