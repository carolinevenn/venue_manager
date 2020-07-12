<?php namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'customer_id';

    public function get_customers($id = false)
    {
        if ($id === false)
        {
            return $this->orderBy('company_name', 'ASC')
                ->findAll();
        }

        return $this->asArray()
            ->where(['customer_id' => $id])
            ->first();
    }

}
