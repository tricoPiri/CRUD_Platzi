<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\POST;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        if($request->file('file'))
        {
            $post->image =  $request->file('file')->store('post', 'public');
            $post->save();
        }

        return back()->with('status', 'salvado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\POST  $pOST
     * @return \Illuminate\Http\Response
     */
    public function show(POST $pOST)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\POST  $pOST
     * @return \Illuminate\Http\Response
     */
    public function edit(POST $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\POST  $pOST
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->iframe = $request->iframe;
        $post->user_id = auth()->user()->id;

        if($request->file('file'))
        {
            $post->image =  $request->file('file')->store('post', 'public');
            $post->save();
        }else{
            $post->save();
        }

        return back()->with('status', 'editado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\POST  $pOST
     * @return \Illuminate\Http\Response
     */

    //1. asi tambien se puede
    //public function destroy(Post $post)
    public function destroy($id)
    {
        //1. asi tambien se podria
        //$post->delete();

        $post = new Post();
        $post->id = $id;
        $post->destroy($post->id);

        return back();
    }
}
