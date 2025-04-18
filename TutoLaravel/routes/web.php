<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->group(function () {

    Route::get('/', function (Request $request) {
        return \App\Models\Post::paginate(25);
    })->name('index');
    
    Route::get('/{slug}-{id}', function (string $slug , string $id,Request $request ) {
        $post = \App\Models\Post::findorFail($id);
        if ($post->slug = $slug){
            return to_route('blog.show',['slug' => $post->slug, 'id' => $post->id]);
        }
        return $post;
    })-> where([
        'id' => '[0-9;]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
    
});

