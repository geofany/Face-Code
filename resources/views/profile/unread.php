<?php

$test1 = DB::table('conversation')
->where('status', 1) //Unread messages
->where('user_one', Auth::user()->id)
->count();

$test2 = DB::table('conversation')
->where('status', 1) //Unread messages
->where('user_two', Auth::user()->id)
->count();

echo $test1 + $test2;

// return array_merge($test1 -> toArray(), $test2 -> toArray());

 ?>
