<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Accommodation $accommodation)
    {
        $data = [];
        if($request->user()->isPlatformUser()){
            $data = [
                'total_bookings'  => '',
                'total_revenue'   => '2344',
                'occupancy_rate'  => '75%',
                'rating' => '4.5',
                'recent_bookings' => '',
                'partner_hotels'  => '',
                'active_users'    => '',
            ];
        }else{
            $user_id = $request->user()->isHotelOwner() ? $request->user()->id : $request->user()->current_owner_id;
            
            $bookings = Booking::query()
                ->join('accommodations', 'bookings.hotel_id', '=', 'accommodations.id')
                ->join('users', 'users.id', '=', 'bookings.user_id')
                ->join('rooms', function($join) {
                    $join->on('rooms.id', '=', \DB::raw('CAST(bookings.room_id AS INTEGER)'));
                })
                ->where('accommodations.business_owner_id', $user_id)
                ->where('accommodations.is_active', true)
                ->where('bookings.status', '!=', 'cancelled')
                ->select(
                    'users.first_name as first_name',
                    'users.last_name as last_name',
                    'rooms.room_number',
                    'rooms.status as room_status',
                    'bookings.total_price',
                    'bookings.created_at as booking_created_at',
                    'bookings.id',
                    'accommodations.created_at as accommodation_created_at'
                );
                
            $booking_count   = $bookings->count(); // More efficient than get()->count()
            $recent_bookings = $bookings->latest('bookings.created_at')->take(5)->get()->toArray();
            
            $data = [
                'booking_count' => $booking_count,
                'monthly_revenue' => '2344',
                'occupancy_rate' => '75%',
                'rating' => '4.5',
                'recent_bookings' => $recent_bookings,
            ];
        }
        return view('dashboard.index', compact('data'));
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
