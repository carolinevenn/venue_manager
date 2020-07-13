<?php namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'customer_id';

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

    public function add_customer()
    {
    /*
        $validationRules = [
            'companyName' => 'required',
            'other' => 'required'
        ];

        $validationMessages = [
            'other'        => [
                'required' => 'These details are extremely important! Please do not leave them out.'
            ]
        ];

        $data = [
            'company_name' => $this->input->post('companyName'),
        ];

        return $this->insert($data);
    */
    }
}
