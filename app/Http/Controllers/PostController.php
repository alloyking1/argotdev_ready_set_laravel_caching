<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function allCachedPost()
    {

        return Cache::remember('articles', 60, function () {
            $post = Post::all();
            return response()->json($post);
        });
    }

    public function allPostWithoutCache()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
