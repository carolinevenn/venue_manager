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
            return $this->find($id);
        }
    }

    // Return multiple contracts
    public function get_all_contracts($search = false, $status = false)
    {
        if ($search === false && $status === false) {
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
            return $this->select('contract.contract_id, contract.booking_status, contract.updated_on, 
                                event_details.event_title, room.name AS room')
                ->select('DATE_FORMAT(MIN(booking.start_time), "%d %b %Y") AS start_date')
                ->select('DATE_FORMAT(MAX(booking.end_time), "%d %b %Y") As end_date')
                ->join('booking', 'booking.contract_id = contract.contract_id', 'left')
                ->join('event_details', 'event_details.contract_id = contract.contract_id', 'left')
                ->join('room', 'room.room_id = booking.room_id', 'left')
                ->where('contract.booking_status', $status)
                ->groupStart()
                    ->like('event_details.event_title', $search)
                    ->orLike('contract.contract_id', $search)
                ->groupEnd()

                ->groupBy('booking.contract_id')
                ->orderBy('contract.contract_id', 'ASC')
                ->findAll();
        }


    }
}
