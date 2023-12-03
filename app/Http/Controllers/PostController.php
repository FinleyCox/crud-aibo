<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => auth()->user()->posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'content' => 'required',
        ]);

        $post = new Post ();
        $post->title = $request->title ?? 'たいとるなし';
        $post->content = $validateData['content'];
        $post->filename = $request->filename ?? null;
        $post->user_id = Auth::user()->id;
        $post->save();

        return;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $post = Post::find($id);
        return Inertia::render('Posts/Edit', [
            'post' => $post,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validateData = $request->validate([
            'content' => 'required',
        ]);
        Log::info('Received Data: ' . json_encode($request->all()));
        $post->title = $request->title ?? 'たいとるなし';
        $post->content = $validateData['content'];
        $post->filename = $request->filename ?? null;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'UPDATED!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
