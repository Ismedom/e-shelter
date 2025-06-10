<?php

namespace App\Http\Controllers\Api\BookingApp;

use App\Actions\BookingAction;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\AccommodationRepository;
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
    protected $accommodation;
    protected $transaction;

    public function __construct(Booking $model, Room $room, AccommodationRepository $accommodation)
    {
        $this->model = $model;
        $this->room = $room;
        $this->accommodation = $accommodation;
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
                'accommodation_id' => 'required',
            ])->validate();
            $booking =  $bookingAction->create([
                'accommodation_id' => $request->accommodation_id,
                'check_in' => Carbon::now(),
                'check_out'=> Carbon::now(),
                'total_price' => $request->total_price??24,
                'booking_reference' => \Illuminate\Support\Str::random(10),
            ]);
            $accommodation_owner = $this->accommodation->find($request->accommodation_id);

            $transaction = Transaction::create([
                'accommodation_id' => $request->accommodation_id,
                'amount'           => $booking->total_price,
                'currency'         => 'USD',
                'payee'            => $request->full_name??"unknow",
                'transfer_to'      => $accommodation_owner->business_owner_id,
                'payment_method'   => null,
                'reference'        => $booking->payment_reference ?? \Str::uuid(),
                'meta'             => [],
                'paid_at' => null
            ]);
            DB::commit();
            return $this->success([...$booking->toArray(), 'transaction_id' => $transaction->id], 'Booking successfully!', 201);
        }catch(\Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $transaction_id, string $id)
    {
        try{
            $booking = $this->model->find($id);
            if(!$booking) return $this->error('Booking was not found!');
            $transaction = Transaction::find($transaction_id);
            if(!$transaction) return $this->error('Transaction was not found!');
            return $this->success([ ...$transaction->toArray(), 'booking' =>$booking->toArray(),], 'Get booking successfully!', 200);
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
