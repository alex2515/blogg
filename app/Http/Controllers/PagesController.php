<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function home()
	{
		// $posts = Post::whereNotNull('published_at')
		// 			->where('published_at', '<=', Carbon::now() )
		// 			->latest('published_at')
		// 			->get();
		$posts = Post::published()->paginate(1);
		return view('welcome', compact('posts'));
	}
}