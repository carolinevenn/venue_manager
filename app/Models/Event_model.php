<?php namespace App\Models;

use CodeIgniter\Model;

class Event_model extends Model
{
    protected $table = 'event_instance';
    protected $primaryKey = 'instance_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'event_id',
        'show_time',
        'standard',
        'concession',
        'student'
    ];

    public function get_contract_id($event)
    {
        $query = $this->query("SELECT * FROM event_details WHERE event_id =".$event);
        $contract = $query->getRowArray();
        return $contract['contract_id'];
    }




}
