<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Customer_model
 * @package App\Models
 */
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


    /**
     * Returns a single Customer record
     * @param int $id The customer ID
     * @return array|null Customer record
     */
    public function get_customer($id)
    {
        return $this->find($id);
    }

    /**
     * Returns all Customer records, ordered by company_name
     * Optionally limited by a search term
     * @param string $search The search term
     * @return array Customer records
     */
    public function get_all_customers($search = null)
    {
        if ($search === null)
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

    /**
     * Returns current contract overviews for a single Customer
     * @param int $id The customer ID
     * @return array Contract overviews
     */
    public function get_current($id)
    {
        $query = $this->query("SELECT CONT.contract_id, 
                                    CONT.booking_status, 
                                    DATE_FORMAT(MIN(B.start_time), '%d %b %Y') AS start_date, 
                                    DATE_FORMAT(MAX(B.end_time), '%d %b %Y') As end_date, 
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

    /**
     * Returns historical contract overviews for a single Customer
     * @param int $id The customer ID
     * @return array Contract overviews
     */
    public function get_history($id)
    {
        $query = $this->query("SELECT CONT.contract_id, 
                                    CONT.booking_status, 
                                    DATE_FORMAT(MIN(B.start_time), '%d %b %Y') AS start_date, 
                                    DATE_FORMAT(MAX(B.end_time), '%d %b %Y') As end_date, 
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
