<?php

namespace App\Http\Controllers\Room;

use App\Actions\RoomTypeAction;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Accommodation $accommodation)
    {
        $room_types = RoomType::where('accommodation_id', $accommodation->id)->paginate(6);
        return view('room-types.index', compact('accommodation', 'room_types'));
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
    public function store(Request $request, Accommodation $accommodation, RoomTypeAction $roomTypeAction)
    {

        Validator::make($request->all(), [
            'type'     => ['required', 'string'],
            'pricing'  => ['required', 'numeric', 'gt:0'],
            'currency' => ['required', 'string'],
            'discount' => ['nullable', 'numeric', 'between:0,100'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);
        $room_type = $roomTypeAction->create([...$request->all(),'accommodation_id'=>$accommodation->id]);
        if(is_null($room_type) || empty($room_type)){
            return back()->withErrors('Room type was not found!');
        }
        return redirect()->route('room-types.index', compact('room_type', 'accommodation'));   
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

    public function edit(Request $request, Accommodation $accommodation, RoomTypeAction $roomTypeAction, string $id)
    {
        $room_type = RoomType::where('accommodation_id', $accommodation->id)->findOrFail($id);
        return view('room-types.edit', compact('room_type', 'accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation, RoomTypeAction $roomTypeAction, string $id)
    {
        $validated = Validator::make($request->all(), [
            'type'        => ['required', 'string'],
            'pricing'     => ['required', 'numeric', 'gt:0'],
            'currency'    => ['required', 'string'],
            'discount'    => ['nullable', 'numeric', 'between:0,100'],
            'description' => ['nullable', 'string', 'max:1000'],
        ])->validate();

        $room_type = RoomType::where('accommodation_id', $accommodation->id)->findOrFail($id);
        $roomTypeAction->update([...$validated, 'id' => $id]);

        return redirect()->route('room-types.index', compact('accommodation'))->with('success', 'Room type updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accommodation $accommodation, RoomType $roomType)
    {
        if ($roomType->delete()) {
            return redirect()
                ->route('room-types.index', ['accommodation' => $accommodation->id])
                ->with('success', 'Room type deleted successfully.');
        }

        return back()->withErrors('Failed to delete room type.');
    }

}
