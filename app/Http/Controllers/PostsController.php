<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

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
    public function store(PostsCreateRequest $request)
    {
        $user = Auth::user();

        $user->posts()->create($request->all());


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        //$this->authorize('update', $post);

        $post = Post::findOrFail($id);

        if(Auth::user()->id == $post->user_id) {
            return view('posts.edit', compact('post'));
        }
        return "У вас недостаточно прав";

        //return view('posts.edit', compact('post'));
    }

    /**
     * @param PostsUpdateRequest $request
     * @param Post $post
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostsUpdateRequest $request, Post $post, $id)
    {

        $post = Post::findOrFail($id);

        $post->update(
            $request->only('title', 'decription')
        );

        return redirect('/post/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if(Auth::user()->id == $post->user_id) {
            return redirect('/');
        }
        return "У вас недостаточно прав";

        //
    }

    public function updateOwnPost($user, $post, $permission) {
        $post = $this->getModel(\App\Post::class, $post);

        return $user->id === $post->user_id;
    }
}
