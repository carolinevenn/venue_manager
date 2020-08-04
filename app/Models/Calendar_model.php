<?php namespace App\Models;

use CodeIgniter\Model;

class Calendar_model extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'room_id',
        'contract_id',
        'start_time',
        'end_time'
    ];


    public function get_all_bookings()
    {
        $query = $this->query("SELECT B.*, E.event_title, C.booking_status 
                                FROM `booking` B 
                                LEFT JOIN event_details E 
                                ON B.contract_id = E.contract_id
                                LEFt JOIN contract C
                                ON B.contract_id = C.contract_id  
                                WHERE NOT C.booking_status = 'Cancelled'");
        return $query->getResultArray();
    }


    public function update_booking($id, $start, $end, $room)
    {
        $data = [
            'room_id'    => $room,
            'start_time' => $start,
            'end_time'   => $end
        ];
        return $this->where('booking_id', $id)
            ->set($data)
            ->update();
    }

    public function get_contract_id($bookingId)
    {
        $booking = $this->find($bookingId);
        return $booking['contract_id'];
    }


}