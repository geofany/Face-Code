<?php
// Route::get('forgotPassword', function() {
// return view('profile.forgotPassword');
//
// });
Route::get('try', function() {
return App\post::with('user', 'likes')->get();

});
Route::post('setToken', 'ProfileController@setToken');

Route::get('/reset/{token}', function($token) {

	echo $token;

});


Route::get('/messages', function() {
	return view('messages');

});

Route::get('/newMessages', function() {
	return view('newMessages');
});

Route::post('/sendMessage', 'ProfileController@sendMessage');

Route::get('/getMessages', function() {
	$allUsers1 = DB::table('users')
	->Join('conversation', 'users.id', 'conversation.user_one')
	->where('conversation.user_two', Auth::user()->id)
	->get();
	// return $allUsers1;

	$allUsers2 = DB::table('users')
	->Join('conversation', 'users.id', 'conversation.user_two')
	->where('conversation.user_one', Auth::user()->id)
	->get();
	// return $allUsers2;

	return array_merge($allUsers1->toArray(), $allUsers2->toArray());

});

Route::get('/getMessages/{id}', function($id) {
	$userMsg = DB::table('messages')
	->join('users', 'users.id', 'messages.user_from')
	->where('messages.conversation_id',$id)->get();
	return $userMsg;
});


Route::get('/', function () {
	// return view('welcome');
	$posts = App\post::with('user', 'likes')->orderBy('created_at', 'DESC')->get();
	return view('welcome', compact('posts'));
});

Route::get('/posts', function () {
	// $posts_json = DB::table('users')
	// ->rightJoin('profiles', 'profiles.user_id', 'users.id')
	// ->rightJoin('posts', 'posts.user_id', 'users.id')
	// ->orderBy('posts.id', 'Desc')
	// ->get();
	// return $posts_json;

	return App\post::with('user', 'likes')->orderBy('created_at', 'DESC')->get();
});

Route::post('addPost', 'PostsController@addPost');

Route::get('/likes', function() {

return App\likes::all();

});

Route::get('/', function() {

$likes = App\likes::all();
return view('welcome', compact('likes'));

});

Route::get('/deletePost/{id}', 'PostsController@deletePost');

Route::get('/likePost/{id}', 'PostsController@likePost');

Auth::routes();



Route::group(['middleware' => 'auth'], function() {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/profile/{slug}', 'ProfileController@index');

	Route::get('/changePhoto', function(){
		return view('profile.pic');
	});

	Route::post('/uploadPhoto', 'ProfileController@uploadPhoto');

	Route::get('editProfile', 'ProfileController@editProfileForm');

	Route::post('/updateProfile', 'ProfileController@updateProfile');

	Route::get('/findFriends', 'ProfileController@findFriends');

	Route::get('/addFriend/{id}', 'ProfileController@sendRequest');

	Route::get('/requests', 'ProfileController@requests');

	Route::get('/accept/{name}/{id}', 'ProfileController@accept');

	Route::get('/friends', 'ProfileController@friends');

	Route::get('/requestRemove/{id}', 'ProfileController@requestRemove');

	Route::get('/notifications/{id}', 'ProfileController@notifications');

	Route::get('/unfriend/{id}', function($id) {
		$loggedUser = Auth::user()->id;

		DB::table('friendships')
		->where('requester', $loggedUser)
		->where('user_requested', $id)
		->delete();
		return back()->with('msg', 'You are not friend with this');

	});


});

// Route::get('posts', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');
