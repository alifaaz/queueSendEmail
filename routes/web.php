<?php

use App\Models\Post;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('posts',[
    'posts' => Post::latest()->get()
]);
});


Route::get('/posts', function () {
    DB::listen(function($query){
        logger($query->sql);
    });

    return view('posts',[
        'posts'=> Post::latest()->get()
    ]);

});


Route::get('/cats', function () {
    return view('Cat.Cats',[
        'cats'=>Cat::all()
    ]);
});


Route::get('/cats/{cat}', function (Cat $cat) {
    
    return view('posts',[
        "posts"=> $cat->posts,
        'title'=> $cat->name
    ]);
});

Route::get('/authors/{user:nickname}', function (User $user) {
    
    return view('posts',[
        "posts"=> $user->posts,
        'title'=> $user->name,
        "userId" =>$user->id
    ]);
});


Route::get('/post/{post:title}', function (Post $post) {

    // route model bindinf mean bind id to elquent p

    // send it with the view
    
    return view('post',[
        'post' => $post
    ]);

})->where("slug","[0-9]+");
