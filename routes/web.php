<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function()
{
    $post = Post::create(['name'=>'My first post 1']);
    // associate tag1 with post
    $tag1 = Tag::findOrFail(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video.mov']);
    // associate tag2 with video
    $tag2 = Tag::findOrFail(2);
    $video->tags()->save($tag2);
});


Route::get('/read', function()
{
   //$post = Post::findOrFail(10);
    $post = Post::ff(); //using Query Scope from Post.php (scopeFf)

   foreach($post->tags as $tag)
   {
       echo $tag;
   }

});


//Route::get('/update', function()
//{
////    $post = Post::findOrFail(10);
////
////    foreach($post->tags as $tag)
////    {
////        echo $tag->whereName('LatestPosts')->update(['name'=>'Updated PHP']);
////    }
//
//    $post = Post::findOrFail(10);
//
//    $tag = Tag::findOrFail(1);
//
//    //$post->tags()->save($tag); // Will add new record.
//
//    //$post->tags()->attach($tag); // Will add new record.
//    $post->tags()->sync([11, 12, 13]); // updates tag_id in the taggables table to 11, for post 10, or adds new records if not there.
//});


Route::get('/delete', function()
{
//    $post = Post::findOrFail(10);
//
//    foreach($post->tags as $tag)
//    {
//        $tag->whereId(1)->delete();
//    }

    $video = Video::findOrFail(1);

    foreach($video->tags as $tag)
    {
        $tag->whereId(2)->delete();
    }
});
