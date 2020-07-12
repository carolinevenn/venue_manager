<?php namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'customer_id';

    public function getCustomers($id = false)
    {
        if ($id === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['customer_id' => $id])
            ->first();
    }
}
