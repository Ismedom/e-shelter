<?php

namespace App\Http\Controllers\Api\BookingApp;

use App\Http\Controllers\Controller;
use App\Repositories\AccommodationRepository;
use App\Repositories\PostRepository;
use App\Supports\ApiResponse;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    use ApiResponse;

    public $posts;
    public $accommodation;
    public function __construct()
    {
       $this->posts = new PostRepository();
       $this->accommodation = new AccommodationRepository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function listAccommodations()
    {
        $posts = $this->posts->listPosts()->latest('posts.created_at')->paginate(10);
        return $this->success($posts, 'Accommodations retrieved successfully.', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function topRating()
    {
        // $posts = $this->posts->listPosts()->where('accommodations.star_rating', '>', 1)->paginate(10);
        $posts = $this->posts->listPosts()->where('posts.star_rating', '>', 3)->get();
        return $this->success($posts, 'Accommodations retrieved successfully.', 200);
    }

    public function accommodation(Request $request, string $id)
    {
       $accommodation = $this->accommodation->showDetails()->find($id);
       return $this->success($accommodation, 'Get accommodation successfully!', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
