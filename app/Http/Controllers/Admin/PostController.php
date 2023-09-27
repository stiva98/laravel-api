<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Controllers\Controller;

//Models
use App\Models\Post;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $formData = $request->all();
        $coverImagePath = null;

        if (isset($formData['cover_image'])) {
            $coverImagePath = Storage::put('uploads/images', $formData['cover_image']);
        }

        $post = new Post();
        $post->title = $formData['title'];
        $post->slug = $formData['slug'];
        $post->content = $formData['content'];
        $post->cover_image = $coverImagePath;
        $post->type_id = $formData['type_id'];
        $post->save();

        if (isset($formData['technologies'])) {
            foreach ($formData['technologies'] as $technologyId) {
                                                
                $post->technologies()->attach($technologyId);
            }
        }

        return redirect()->route('admin.posts.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $formData = $request->all();
        $coverImagePath = $post->cover_image;
        if (isset($formData['cover_image'])) {
            if ($post->cover_image) {
                Storage::delete($post->cover_image);
            }

            $coverImagePath = Storage::put('uploads/images', $formData['cover_image']);
        }
        else if (isset($formData['remove_cover_image'])) {
            if ($post->cover_image) {
                Storage::delete($post->cover_image);
            }

            $coverImagePath = null;
        }

        $post->title = $formData['title'];
        $post->slug = $formData['slug'];
        $post->content = $formData['content'];
        $post->cover_image = $coverImagePath;
        $post->type_id = $formData['type_id'];
        $post->save();

        if (isset($formData['technologies'])) {
            $post->technologies()->sync($formData['technologies']);
        }
        else {
            $post->technologies()->detach();
        }

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post -> delete();

        return redirect() ->route('admin.posts.index');
    }
}
