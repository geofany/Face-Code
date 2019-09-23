<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

$posts = DB::table('posts')
->leftJoin('profiles', 'profiles.user_id', 'posts.user_id')
->leftJoin('users', 'users.id', 'posts.user_id')
->orderBy('posts.id', 'Desc')
->take(4)
->get();

if ($createPost) {
  $posts_json = DB::table('users')
->leftJoin('profiles', 'profiles.user_id', 'users.id')
->leftJoin('posts', 'posts.user_id', 'users.id')
->orderBy('posts.id', 'Desc')
->take(4)
->get();
return $posts_json;
}

}

}
