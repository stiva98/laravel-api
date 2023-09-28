<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('type','technologies')->paginate(3);
            if ($posts) {
                return response()->json([
                    'success' => true,
                    'results' => $posts
                ], 200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not found'
                ], 404);
            }
    }


    public function show(string $slug) {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ]);
        }
    }
};

//Route funzionanti dopo controllo su PostMan --> MILESTONE 2 ok!

