<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Room;

class CreateRoomJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    
    public $room;
    public $roomAction;
    public $rooms_count=0;

    public function __construct($room)
    {
        $this->room = $room;
        $this->roomAction = app(\App\Actions\RoomAction::class);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for($floor = 1; $floor <= $this->room['floor_count']; $floor++) {
            $base_number = $floor * 100;
            for($index = 1; $index <= $this->room['rooms_per_floor']; $index++) {
                $this->rooms_count++;
                $room_number = $this->room['building_code_leading'] == 'on' && !empty($this->room['building_code'])
                              ? $this->room['building_code'] . ($base_number + $index)
                              : $base_number + $index;
                              
                $this->roomAction->create([
                    'room_number' => $room_number,
                    'status' => Room::STATUS_AVAILABLE,
                    'accommodation_id' => $this->room['accommodation_id'],
                ]);
                if($this->rooms_count >= $this->room['total_room_count']){
                    break;
                }
            }
        }
    }
}
