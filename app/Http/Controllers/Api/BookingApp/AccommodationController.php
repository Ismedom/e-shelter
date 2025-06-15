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
    public function __construct(PostRepository $posts, AccommodationRepository $accommodation)
    {
        $this->posts = $posts;
        $this->accommodation = $accommodation;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function listAccommodations(Request $request)
    {
        $query = $request->has('state_province')?$request->all():[...$request->all(), 'state_province' => ''];
        $posts = $this->posts->listPosts($query)->latest('posts.created_at')->paginate(20);
        return $this->success($posts, 'Accommodations retrieved successfully.', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function highlights()
    {
        $baseQuery  = $this->posts->listPosts();
        $top_rating = (clone $baseQuery)->where('posts.star_rating', '>', 3)->get();
        $best_deal  = (clone $baseQuery)->where('posts.star_rating', '>', 3)
                                        ->whereBetween('room_types.pricing', [15, 50])
                                        ->get();
        $posts = ['top_rating' => $top_rating,'best_deal'  => $best_deal,];
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

    public function searchAccommodation(Request $request, $id)
    {
       $accommodation = $this->accommodation->showDetails()->find($id);
       return $this->success($accommodation, 'Get accommodation successfully!', 200);
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
