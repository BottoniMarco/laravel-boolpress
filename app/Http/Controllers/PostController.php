<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $post = new Post();

        // $title = "Title-2";
        // $post->title = $title;
        // $post->subtitle = "Subtitle-2";
        // $post->author = "Author-2";
        $post->publication_date = "2021-02-22 16:54:28";


        $post->fill($data);
        $postSaveResult = $post->save();

        if($postSaveResult) {
            $post->tags()->attach($data['tags']);
        }

        return redirect()->route('posts.index')->with('message',"post creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        // $data["slug"] = Str::slug($data["title"]);
        
        
        // $post = new Post();
        
        // $title = "Title-1";
        // $post->title = $title;
        // $post->subtitle = "Subtitle-1";
        // $post->author = "Author-1";
        // $post->publication_date = "2021-02-22 16:54:28";
        
        $post->update($data);

        // $post->fill($data);
        // $postSaveResult = $post->save();

        if(empty($data['tags'])) {
            $post->tags()->detach();
        }else{
            $post->sync($data['tags']);
        }

        return redirect()->route('posts.index')->with('message',"post AGGIORNATO correttamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
