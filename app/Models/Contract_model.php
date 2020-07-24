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
    public function get_all_contracts($search = false)
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
            return $this->like('event_title', $search)
                ->orLike('contract_id', $search)
                ->orderBy('contract_id', 'ASC')
                ->findAll();
        }


    }
}
