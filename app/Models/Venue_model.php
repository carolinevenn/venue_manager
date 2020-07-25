<?php namespace App\Models;

use CodeIgniter\Model;

class Venue_model extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';

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




}