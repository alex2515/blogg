<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	$title = "Publicaciones de la categoría '$category->name'";
    	$posts = $category->posts()->published()->paginate();

    	if (request()->wantsJson()) {
    		return $posts;
    	}
    	// return $category->load('posts');
    	return view('pages.home', compact('posts', 'title'));
    }
}
