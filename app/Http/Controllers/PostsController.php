<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
    	if ($post->isPublished() || auth()->check() ) // Acceso a post con fecha de publicacion y usuario autenticfiado
    	{
    		return view('posts.show', compact('post'));
    	}
    	abort(404);
    }
}
