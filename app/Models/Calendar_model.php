<?php namespace App\Models;

use CodeIgniter\Model;

class Calendar_model extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    protected $returnType = 'array';

/*
    protected $allowedFields = [
        '',

    ];
*/

    public function get_rooms()
    {
        $query = $this->query("SELECT * FROM room;");
        return $query->getResultArray();
    }

    public function get_bookings()
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


}