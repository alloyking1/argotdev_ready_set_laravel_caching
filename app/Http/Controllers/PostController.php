<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'title' => 'string|require|max:100',
                'body' => 'string|require',
                'author' => 'string|require',
            ]
        );

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'author' => $request->author,
        ]);

        return response()->json(['message' => 'Post created'], 201);
    }

    public function show($id)
    {
        $Post = Post::find($id);
        if (!$post = null) {
            return response()->json(['post' => $post], 200);
        } else {
            return response()->json([
                'message' => "Post not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'string|require',
            'author' => 'string|require',
        ]);
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json(['message' => 'Post updated successfully'],);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json(['message' => "post deleted"], 200);
    }
}
