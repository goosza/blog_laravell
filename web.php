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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Route::get('/', function () {
    $results = App\Category::all();
    return view('welcome',["links"=>$results]);
});
Route::get('/posts/{num}',function($num){
    $results=App\Post::where('category_id',$num)->get();
    
    $links=App\Category::all();
    return view("posts",["posts"=>$results, "links"=>$links]);
    
});
Route::get('/post/{num}',function($num){
    $links=App\Category::all();
    $ids=App\Post::find($num);
    $comments=App\Comment::where('post_id',$num)->get();
    return view("post",["post"=>$ids,"links"=>$links,"comments"=>$comments]);
    
    
});
Route::post('/comment/{num}',function(Request $req,$num){
    
    $comments=App\Comment::create([
        "body"=>$req->comment_body,
        "post_id"=>$num
    ]);
    
    return back();

});

Route::get('/admin',function(){
    $links=App\Category::all();
    return view('admin',["links"=>$links]);
});
Route::post('/addPost',function(Request $req){
    $a = Storage::put('public',$req->file("post_image"));
    $url = Storage::url($a);
   App\Post::create([
       "title"=>$req->post_title,
       "body"=>$req->post_body,
       "category_id"=>$req->group1,
       "images"=>$url
   ]); 
    return back();
});
