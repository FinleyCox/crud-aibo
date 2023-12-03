<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;

class AllPostsController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/AllPosts', [
            'allPosts' => Post::all()
        ]);

    }
}
