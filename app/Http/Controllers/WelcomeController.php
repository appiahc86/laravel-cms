<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;


class WelcomeController extends Controller
{
    public function index(){

        $search = request()->query('search');
        if ($search){

           $posts = Post::where('title', 'LIKE', "%{$search}%")
               ->where('published_at', '<=', now())
               ->orderBy('published_at', 'DESC')
               ->paginate(2);

        }

        else
            $posts = Post::where('published_at', '<=', now())
                         ->orderBy('published_at', 'DESC')
                         ->paginate(4);



    return view('welcome')
        ->with('categories',Category::all())
        ->with('tags', Tag::all())
        ->with('posts', $posts);
    }


}
