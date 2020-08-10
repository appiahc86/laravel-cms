<?php

namespace App\Http\Controllers;



use App\Category;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\EditPostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {

        $this->middleware('verifyCategoriesCount')->only('create', 'store');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        $tags = Tag::pluck('name', 'id')->all();
       return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {



      $image = $request->image->store('posts'); //Store image to storage

    $post =   Post::create([
          'title' => $request->title,
          'description' => $request->description,
          'category_id'=> $request->category,
          'published_at' => $request->published_at,
          'content' => $request->content,
          'image' => $image,
          'user_id'=> Auth::user()->id

      ]);

    if ($request->tags){

        $post->tags()->attach($request->tags);
    }

      Session::flash('success', 'Post Created Successfully');

      return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name','id')->all();
        $tags = Tag::pluck('name', 'id')->all();
       return view('posts.create')->with('post',$post)->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post)
    {

        if (!empty($request->image)){

            Storage::delete($post->image);
            $image = $request->image->store('posts');
            $post->update([
                'title'=> $request->title,
                'description' => $request->description,
                'category_id'=> $request->category,
                'published_at' => $request->published_at,
                'content' => $request->content,
                'image' => $image

            ]);


        }
        else{

            $post->update([
                'title'=> $request->title,
                'description' => $request->description,
                'category_id'=> $request->category,
                'published_at' => $request->published_at,
                'content' => $request->content
            ]);
        }

        if ($request->tags){

            $post->tags()->sync($request->tags);
        }

        Session::flash('success', 'Post Updated Successfully');
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()){
            Storage::delete($post->image);    //Delete image from storage
            $post->forceDelete();
            Session::flash('deleted', 'Post Has Been Permanently Deleted');
        }

        else{
            $post->delete();
            Session::flash('deleted', 'Post Has Been Trashed Successfully');
        }

       return redirect()->back();
    }


    public function trashed(){

       $posts = Post::onlyTrashed()->get();

        return view('posts.trashed')->with('posts', $posts);

    }


    /**
     * Restore trashed post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id){

     $post = Post::withTrashed()->where('id', $id)->firstOrFail();

     $post->restore();

     Session::flash('success', 'Post Restored Successfully');

     return redirect()->back();

    }


}
