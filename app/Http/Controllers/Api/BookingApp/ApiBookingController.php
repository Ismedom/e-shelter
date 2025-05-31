<?php

namespace App\Http\Controllers\Api\BookingApp;

use App\Actions\BookingAction;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Supports\ApiResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiBookingController extends Controller
{
    use ApiResponse;

    protected $model;
    protected $room;

    public function __construct(Booking $model, Room $room)
    {
        $this->model = $model;
        $this->room = $room;
    }
    /**
     * Display a listing of the resource.
     */
    public function history(Request $request){
       try{
            $bookings = $this->model->where('user_id', $request->user()->id())
                ->paginate(isset($request->item_per_page)?$request->item_per_page:10);
            if(empty($bookings)) return $this->error('No Bookig was found!', 404);
            return $this->success($bookings, 'get data successfully!', 200);
       }catch(\Exception $e){
            return $this->error($e->getMessage(), 500);
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeBooking(Request $request, BookingAction $bookingAction){
        DB::beginTransaction();
        try{
            Validator::make($request->all(), [
                'accommodation_id' => 'required|string',
                'room_id'          => 'required|string'
            ])->validate();
            $room = $this->room->find($request->room_id);
            if(!$room) return $this->error('Room not found!', 404);
            if($room->status != Room::STATUS_AVAILABLE) return $this->error('Room is not available for booking!', 400);
            $booking =  $bookingAction->create([
                'accommodation_id' => $request->accommodation_id,
                'room_id'          => $request->room_id,
                'check_in' => Carbon::now(),
                'check_out'=> Carbon::now(),
                'total_price' => '24',
                'booking_reference' => \Illuminate\Support\Str::random(10),
            ]);
            if($room->status == Room::STATUS_AVAILABLE){
                $room->update(['status' => Room::STATUS_BOOKED]);
            }  
            DB::commit();
            return $this->success($booking, 'Booking succesfully!', 201);
        }catch(\Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        try{
            $booking = [];
            $booking[] = $this->model->find($id);
            if($booking) return $this->error('Booking was not found!');
            if($request->user()->user_type === User::TYPE_HOTEL_USER){
                $booking_user = User::find($booking['user_id']);
                $booking['user'] = $booking_user->only('first_name', 'last_name', );
            }
            return $this->success($booking, 'Get booking successfully!', 200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(), 500);
        }
    }


    public function cancelBooking(Request $request, string $id)
    {
        try{
            $user = $request->user();
            $booking = $this->model->findOrFail($id);
            if(!$booking) return $this->error("Booking not found!");
            $booking->update(['status' => Booking::CANCEL_BOOKING,]);
            
            // switch($user->user_type){
            //     case User::TYPE_HOTEL_USER:
                    
            //         break;
            //     case User::TYPE_PLATFORM_USER:
            //         break;
            //     case User::TYPE_GUEST_USER:
            //         break;
            // } 
            return $this->success($booking, 'booking has been cancel', 200);
        }catch(Exception $e){
            return $this->error($e->getMessage(), 500);
        }
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
