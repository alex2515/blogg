<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	// return $category->load('posts');
    	$title = "Publicaciones de la categoría '$category->name'";
    	$posts = $category->posts()->paginate();
    	return view('pages.home', compact('posts', 'title'));
    }
}
