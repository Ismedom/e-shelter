<?php

namespace App\Http\Controllers\Accommodations;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Accommodation;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Accommodation $accommodation)
    {
        $posts = Post::with(['accommodation', 'roomType'])->where('accommodation_id', $accommodation->id)->latest()->paginate(10);
        return view('posts.index', compact('posts', 'accommodation'));
    }

    public function create(Accommodation $accommodation)
    {
        $roomTypes = RoomType::all();
        return view('posts.create', compact('accommodation', 'roomTypes'));
    }

    public function store(Request $request, Accommodation $accommodation)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'star_rating' => 'nullable|numeric|min:0|max:5',
            'room_type_id' => 'required|exists:room_types,id',
            'tags' => 'nullable|string',
            'img' => 'nullable|image|max:2048',
        ]);

        if (!$data['slug']) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        }

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('posts', 'public');
        }

        if (!empty($data['tags'])) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        }

        Post::create([...$data, 'accommodation_id' => $accommodation->id]);

        return redirect()->route('posts.index', $accommodation)->with('success', 'Post created successfully.');
    }

    public function edit(Accommodation $accommodation, Post $post)
    {
        $roomTypes = RoomType::all();
        return view('posts.edit', compact('post', 'accommodation', 'roomTypes'));
    }

    public function update(Request $request, Accommodation $accommodation, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'star_rating' => 'nullable|numeric|min:0|max:5',
            'room_type_id' => 'required|exists:room_types,id',
            'tags' => 'nullable|string',
            'img' => 'nullable|image|max:2048',
        ]);

        if (!$data['slug']) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        }

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('posts', 'public');
        }

        if (!empty($data['tags'])) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        }

        $post->update($data);

        return redirect()->route('posts.index', $accommodation)->with('success', 'Post updated successfully.');
    }

    public function destroy(Accommodation $accommodation, Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index', $accommodation)->with('success', 'Post deleted successfully.');
    }
}