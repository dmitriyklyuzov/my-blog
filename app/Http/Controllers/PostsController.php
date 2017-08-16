<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth', ['except'=>['show', 'index']]);
    }

    // GET COLLECTION
    public function index()
    {
        $posts = Post::where(['published' => '1'])->orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts',$posts);
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

    // POST
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $post = new Post;
        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->published = $request->published;

        if(isset($request->image)){
        	$post->image_url = $request->image;
        }
        else{
            $post->image_url = '/img/defaultimage.jpg';  
        }

        // return $post;

        $post->save();

        return redirect('posts/' . $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */

    // GET RESOURCE
    public function show($id)
    {
        $post = Post::find($id);  

        $newer = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $older = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        return view('posts.post', [
                        'post' => $post,
                        'newer' => $newer,
                        'older' => $older
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $post = Post::find($id);

        // Check post ownership
        if(Auth::id() !== $post->user_id){
            return redirect('/posts')->with('error', 'You can only edit your own posts.');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */

    // PUT/PATCH
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);

        $post = Post::find($id);

        // // $post->user_id = Auth::id();

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->published = $request->published;
        // $post->image_url = $request->image;

        if(isset($request->image)){
            $post->image_url = $request->image;
        }
        else{
            $post->image_url = '/img/defaultimage.jpg';  
        }
        
        $post->save();

        return redirect('posts/' . $post->id)->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */

    // DELETE
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check post ownership
        if(Auth::id() !== $post->user_id){
            return redirect('/posts')->with('error', 'You can only delete your own posts.');
        }

        $post->delete();

        return redirect('/')->with('success', 'Post Deleted');
    }
}
