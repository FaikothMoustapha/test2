<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index (): Paginator{
        return \App\Models\Post::paginate(25);
    }
    public function show(string $slug, string $id):RedirectResponse | Post
    {
        $post = \App\Models\Post::findorFail($id);
        if ($post->slug = $slug){

            return to_route('blog.show',['slug' => $post->slug, 'id' => $post->id]);

        }
        return $posts;
    }

}
