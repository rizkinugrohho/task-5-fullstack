<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller
{
    public function index()
    {
        $post = Post::paginate(3);
        return response($post, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->only('title', 'content', 'image', 'user_id', 'category_id'));
        return response($post, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response($post, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post tidak ditemukan'], 404);
        }

        $post->update($request->only('title', 'content', 'image', 'user_id', 'category_id'));

        return response($post, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $post = Post::destroy($id);
        return response($post, Response::HTTP_NO_CONTENT);
    }
}
