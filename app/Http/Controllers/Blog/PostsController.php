<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
   public function show(Post $post){


       return view('blog.show')->with('post',$post);

   }


    public function category(Category $category){

      $search = request()->query('search');

      if ($search){

         $posts = Post::where('title', 'LIKE', "%{$search}%")
                     ->where('published_at', '<=', now())
                     ->orderBy('published_at', 'DESC')
                     ->paginate(2);

      }
      else
          $posts = $category->posts()->where('published_at', '<=', now())
                  ->orderBy('published_at', 'DESC')
                  ->paginate(2);


       return view('blog.category')
           ->with('category', $category)
           ->with('categories', Category::all())
           ->with('tags', Tag::all())
           ->with('posts', $posts);

    }

    public function tag(Tag $tag){

       $search = request()->query('search');
       if ($search){

           $posts = Post::where('published_at', '<=', now())
                        ->where('title', 'LIKE', "%{$search}%")
                        ->orderBy('published_at', 'DESC')
                        ->paginate(2);
       }
       else
           $posts = $tag->posts()->where('published_at', '<=', now())
                   ->orderBy('published_at', 'ASC')
                   ->paginate(2);

       return view('blog.tag')
           ->with('tag', $tag)
           ->with('tags', Tag::all())
           ->with('categories', Category::all())
           ->with('posts', $posts);

    }




}
