<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
    	$title = "Publicaciones de la etiqueta '$tag->name'";
    	$posts = $tag->posts()->paginate(1);
    	return view('welcome', compact('posts', 'title'));
    }
}
