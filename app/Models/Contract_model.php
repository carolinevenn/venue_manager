<?php namespace App\Models;

use CodeIgniter\Model;

class Contract_model extends Model
{
    protected $table = 'contract';
    protected $primaryKey = 'contract_id';

    protected $returnType = 'array';

    protected $allowedFields = [

    ];

    // Return a single contract
    public function get_contract($id = false)
    {
        if ($id === false) {
            return null;
        } else {
            return $this->join('event_details', 'event_details.contract_id = contract.contract_id', 'left')
                ->find($id);
        }
    }

    // Return all room booking details for a single contract
    public function get_bookings($id)
    {
        $query = $this->query("SELECT * FROM booking
                                LEFT JOIN room ON booking.room_id = room.room_id
                                WHERE contract_id =".$this->escape($id)."
                                ORDER BY booking.start_time ASC");
        return $query->getResultArray();
    }

    // Return all event instance details for a single contract
    public function get_events($id)
    {
        $query = $this->query("SELECT event_instance.* FROM event_instance
                                LEFT JOIN event_details ON event_details.event_id = event_instance.event_id
                                WHERE event_details.contract_id =".$this->escape($id));
        return $query->getResultArray();
    }

    // Return all invoice details for a single contract
    public function get_invoices($id)
    {
        $query = $this->query("SELECT * FROM invoice
                                WHERE contract_id =".$this->escape($id));
        return $query->getResultArray();
    }

    // Return multiple contracts
    public function get_all_contracts($search = false, $status, $room, $sort)
    {
        if ($search === false) {
            $query = $this->query("SELECT C.contract_id, 
                                      C.booking_status,
                                      DATE_FORMAT(MIN(B.start_time), \"%d %b %Y\") AS start_date, 
                                      DATE_FORMAT(MAX(B.end_time), \"%d %b %Y\") As end_date, 
                                      E.event_title, 
                                      R.name AS room 
                                FROM contract C
                                LEFT JOIN booking B ON C.contract_id = B.contract_id
                                LEFT JOIN event_details E ON C.contract_id = E.contract_id
                                LEFT JOIN room R ON B.room_id = R.room_id
                                GROUP BY B.contract_id
                                ORDER BY C.updated_on DESC");
            return $query->getResultArray();
        } else {
            $query = $this->select('contract.contract_id, contract.booking_status, contract.updated_on, 
                                event_details.event_title, room.name AS room')
                ->select('DATE_FORMAT(MIN(booking.start_time), "%d %b %Y") AS start_date')
                ->select('DATE_FORMAT(MAX(booking.end_time), "%d %b %Y") As end_date')
                ->join('booking', 'booking.contract_id = contract.contract_id', 'left')
                ->join('event_details', 'event_details.contract_id = contract.contract_id', 'left')
                ->join('room', 'room.room_id = booking.room_id', 'left')
                ->groupStart()
                    ->like('event_details.event_title', $search)
                    ->orLike('contract.contract_id', $search)
                ->groupEnd()
                ->groupBy('booking.contract_id');

            // Select by status
            if ($status =="History")
            {
                $query->Having('MAX(booking.end_time) <', date('Y-m-d'));
            }
            elseif ($status != "All")
            {
                $query->where('contract.booking_status', $status)
                    ->Having('MAX(booking.end_time) >=', date('Y-m-d'));
            }

            // Select by room
            if ($room != "All")
            {
                $query->where('room.room_id', $room);
            }

            // Sort results
            switch ($sort)
            {
                case "altered":
                    $query->orderBy('contract.updated_on', 'DESC');
                    break;
                case "booking":
                    $query->orderBy('booking.start_time', 'ASC');
                    break;
                case "az":
                    $query->orderBy('event_details.event_title', 'ASC');
                    break;
                case "za":
                    $query->orderBy('event_details.event_title', 'DESC');
                    break;
            }

            return $query->findAll();
        }
    }


}
