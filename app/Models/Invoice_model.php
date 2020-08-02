<?php namespace App\Models;

use CodeIgniter\Model;

class Invoice_model extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'invoice_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'contract_id',
        'date',
        'invoice_number',
        'amount',
        'paid',
        'invoice'
    ];

    // Return a single invoice
    public function get_invoice($id = false)
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




}
