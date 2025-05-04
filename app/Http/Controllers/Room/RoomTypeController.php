<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Accommodation $accommodation)
    {
        return view('room-types.index', compact('accommodation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Accommodation $accommodation)
    {
        return view('room-types.create', compact('accommodation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Accommodation $accommodation)
    {
        dd($request->all());
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
