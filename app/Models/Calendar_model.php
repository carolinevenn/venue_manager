<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Calendar_model
 * @package App\Models
 */
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


    /**
     * Returns all Room Booking records
     * @return array Room Booking records
     */
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


    /**
     * Updates an existing Rom Booking record
     * @param int $id The booking ID
     * @param string $start The booking start time
     * @param string $end The booking end time
     * @param int $room The room ID
     * @return bool TRUE on success, FALSE on failure
     */
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


    /**
     * Returns the ID of the Contract that a Room Booking is attached to
     * @param int $bookingId The booking ID
     * @return int The contract ID
     */
    public function get_contract_id($bookingId)
    {
        $booking = $this->find($bookingId);
        return $booking['contract_id'];
    }

}
