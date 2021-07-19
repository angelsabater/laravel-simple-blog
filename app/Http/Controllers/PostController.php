<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $search = $request->input('search');
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $posts = Post::latest('id')->get();
        }


        return view('user.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'image'     => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('public/images') : null;

        $post = new Post;
        $post->title    = $request->title;
        $post->content  = $request->content;
        $post->image    = $path;
        $post->user_id  = Auth::user()->id;
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['comments'] = Comment::select('users.id', 'users.username', 'comments.text', 'comments.created_at')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('post_id', '=', $post->id)->get();

        return view('user.posts.show', compact('post'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Gate::allows('edit-post', $post)) {
            return view('user.posts.edit', compact('post'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'     => 'required',
            'image'     => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }

        $post->title    = $request->title;
        $post->content  = $request->content;
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Gate::allows('delete-post', $post)) {
            $post->delete();

            return redirect()->route('posts.index')
                ->with('success', 'Post has been deleted successfully');
        } else {
            abort(403);
        }
    }
}
