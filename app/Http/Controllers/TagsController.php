<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\EditTagRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTagRequest;
use Illuminate\Support\Facades\Session;

class tagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('name', 'ASC')->paginate(4);
//        $tags = Tag::paginate(5);
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        //

        Tag::create(['name'=>$request->name]);

        Session::flash('success', 'Tag Created Successfully');

        return redirect(route('tags.index'));

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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTagRequest $request, Tag $tag)
    {


        $tag->update([
            'name'=>$request->name
        ]);

        Session::flash('success', 'Tag Updated Successfully');

        return redirect(route('tags.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {

        if ($tag->posts()->count() > 0){

            Session::flash('deleted', 'Tag Cannot be deleted. It is associated with ' . $tag->posts()->count() . ' post(s)');
            return  redirect()->back();

        }
        else{

            $tag->delete();

            Session::flash('deleted', 'Tag Deleted Successfully');
            return redirect(route('tags.index'));
        }




    }



}
