<?php

namespace App\Http\Controllers\Room;

use App\Actions\RoomAction;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Room;
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
        $rooms = $accommodation->rooms()->paginate(9);
        return view('rooms.index', compact('accommodation', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Accommodation $accommodation)
    {
        $rooms = $accommodation->rooms()->get();
        return view('rooms.create', compact('accommodation', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Accommodation $accommodation, RoomAction $roomAction)
    {
        $this->authorize('view', $accommodation);
        
        $validated = $request->validate([
            'floor_count' => 'required|integer|min:1',
            'rooms_per_floor' => 'required|integer|min:1',
            'total_room_count' => 'required|integer|min:1',
            'building_code' => 'nullable|string',
            'building_code_leading' => 'nullable|string',
        ]);
    
        $rooms = [];
        $roomsCreated = 0;
        
        for ($floor = 1; $floor <= $validated['floor_count']; $floor++) {
            $base_number = $floor * 100;
        
            for ($index = 1; $index <= $validated['rooms_per_floor']; $index++) {
                if ($roomsCreated >= $validated['total_room_count']) {
                    break 2;
                }
        
                $room_number = ($validated['building_code_leading'] ?? 'off') === 'on' && !empty($validated['building_code'])
                    ? $validated['building_code'] . ($base_number + $index)
                    : $base_number + $index;
        
                $rooms[] = [
                    'room_number' => $room_number,
                    'status' => Room::STATUS_AVAILABLE,
                    'accommodation_id' => $accommodation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
        
                $roomsCreated++;
            }
        }
        
        Room::insert($rooms);
        
    
        return redirect()->route('rooms.index', $accommodation);
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
    public function edit(Request $request, Accommodation $accommodation, string $id)
    {
        $room = Room::find($id);
        return view('rooms.edit', compact('accommodation', 'room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accommodation $accommodation, string $id)
    {
        Room::find($id)->update([
            'room_number' => $request->room_number,
            'status'      => $request->status??"available",
        ]);
        return redirect()->route('rooms.index', $accommodation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
