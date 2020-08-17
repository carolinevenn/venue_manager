<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Invoice_model
 * @package App\Models
 */
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


    /**
     * Returns a single Invoice record
     * @param int $id The invoice ID
     * @return array|null Invoice record
     */
    public function get_invoice($id)
    {
        return $this->find($id);
    }

}
