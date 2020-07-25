<?php namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'customer_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'company_name',
        'address',
        'town',
        'county',
        'postcode',
        'phone',
        'email',
        'contact_name',
        'vat_number',
        'other_details'
    ];

 //   protected $validationRules    = [];
 //   protected $validationMessages = [];

    // Return a single customer
    public function get_customer($id = false)
    {
        if ($id === false)
        {
            return null;
        }
        else
        {
            return $this->find($id);
        }
    }

    // Return multiple customers
    public function get_all_customers($search = false)
    {
        if ($search === false)
        {
            return $this->orderBy('company_name', 'ASC')
                ->findAll();
        }
        else
        {
            return $this->like('company_name', $search)
                ->orLike('customer_id', $search)
                ->orderBy('company_name', 'ASC')
                ->findAll();
        }
    }

    // Return current bookings
    public function get_current($id)
    {
        $query = $this->query("SELECT CONT.contract_id, 
                                    CONT.booking_status, 
                                    DATE_FORMAT(MIN(B.start_time), \"%d %b %Y\") AS start_date, 
                                    DATE_FORMAT(MAX(B.end_time), \"%d %b %Y\") As end_date, 
                                    E.event_title, 
                                    R.name AS room 
                                FROM customer CUST
                                INNER JOIN contract CONT 
                                    ON CUST.customer_id = CONT.customer_id
                                LEFT JOIN booking B 
                                    ON CONT.contract_id = B.contract_id
                                LEFT JOIN event_details E 
                                    ON CONT.contract_id = E.contract_id
                                LEFT JOIN room R 
                                    ON B.room_id = R.room_id
                                WHERE CUST.customer_id = ".$this->escape($id)."
                                AND NOT CONT.booking_status = \"Cancelled\"
                                GROUP BY B.contract_id
                                HAVING MAX(B.end_time) >= '".date('Y-m-d')."'
                                ORDER BY start_date ASC;");
        return $query->getResultArray();
    }

    // Return historical bookings
    public function get_history($id)
    {
        $query = $this->query("SELECT CONT.contract_id, 
                                    CONT.booking_status, 
                                    DATE_FORMAT(MIN(B.start_time), \"%d %b %Y\") AS start_date, 
                                    DATE_FORMAT(MAX(B.end_time), \"%d %b %Y\") As end_date, 
                                    E.event_title, 
                                    R.name AS room 
                                FROM customer CUST
                                INNER JOIN contract CONT 
                                    ON CUST.customer_id = CONT.customer_id
                                LEFT JOIN booking B 
                                    ON CONT.contract_id = B.contract_id
                                LEFT JOIN event_details E 
                                    ON CONT.contract_id = E.contract_id
                                LEFT JOIN room R 
                                    ON B.room_id = R.room_id
                                WHERE CUST.customer_id = ".$this->escape($id)."
                                GROUP BY B.contract_id
                                HAVING MAX(B.end_time) < '".date('Y-m-d')."'
                                OR CONT.booking_status = 'Cancelled'
                                ORDER BY start_date ASC;");
        return $query->getResultArray();
    }

}
