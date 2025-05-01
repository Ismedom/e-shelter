<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected $userRepo;

    public function __construct(){
        $this->userRepo = app(\App\Repositories\UserRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rawFilter = $request->query('search', '');
        // $users = $this->userRepo
        //     ->active()
        //     ->whereHas('bookings')
        //     ->filterUser($rawFilter)
        //     ->where('contributor_id')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);
        // dd($users);
        return view('guests.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
