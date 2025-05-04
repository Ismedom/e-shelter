<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Jobs\CreateRoomJob;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoomController extends Controller
{
    use AuthorizesRequests;
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Accommodation $accommodation){
        $this->authorize('view', $accommodation);
        $rooms = $accommodation->rooms()->get();
        return view('rooms.index', compact('accommodation', 'rooms'));
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
    public function store(Request $request, Accommodation $accommodation){
        $this->authorize('view', $accommodation);
        Validator::make($request->all(), [
            'floor_count'     => 'required|integer|min:1',
            'rooms_per_floor' => 'required|integer|min:1',
            'total_room_count'=> 'required|integer|min:1',
            'building_code'   => 'nullable|string',
        ])->validate();
        CreateRoomJob::dispatch([
            'accommodation_id' => $accommodation->id,
            'floor_count'      => $request->floor_count,
            'rooms_per_floor'  => $request->rooms_per_floor,
            'total_room_count' => $request->total_room_count,
            'building_code'    => $request->building_code??null,
            'building_code_leading' =>isset($request->building_code_leading)?$request->building_code_leading:'off',
        ]);
        return back()->with('success', 'Rooms created successfully');
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
