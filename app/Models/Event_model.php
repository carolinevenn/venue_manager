<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Event_model
 * @package App\Models
 */
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


    /**
     * Returns a single Event Instance record
     * @param int $id The instance ID
     * @return array|null Event Instance record
     */
    public function get_event_instance($id)
    {
        return $this->find($id);
    }

    /**
     * Returns the ID of the Contract that an Event Instance is attached to
     * @param int $event The event ID
     * @return int|null Contract ID
     */
    public function get_contract_id($event)
    {
        $query = $this->query("SELECT * FROM event_details 
                                WHERE event_id =".$this->escape($event));
        $contract = $query->getRowArray();
        if ($contract != null)
        {
            return $contract['contract_id'];
        }
        else
        {
            return null;
        }
    }

}
