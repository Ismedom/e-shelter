<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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
    public function index(Request $request){
        $user_id = $request->user()->isHotelOwner() ? $request->user()->id : $request->user()->current_owner_id;
        $query = [
            'id' => $user_id,
            'search'=> $request->query('search', ''),
            'data_start' => $request->data_start??'',
            'data_end' => $request->data_end ?? Carbon::now(),
            'order_by' => $request->order_by ?? 'desc',
        ];
        $users = $this->userRepo->getGuests($query)->paginate(8);
        return view('guests.index', compact('users'));
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
