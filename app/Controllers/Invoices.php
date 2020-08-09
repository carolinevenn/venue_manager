<?php namespace App\Controllers;

use App\Models\Contract_model;
use App\Models\Invoice_model;

/**
 * Class Invoices
 * @package App\Controllers
 */
class Invoices extends BaseController
{
    /** Create a new Invoice record with the given contract ID
     * @param int $contract The contract ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function add($contract = null)
    {
        // Check $contract value is numeric
        if (!is_numeric($contract))
        {
            return redirect()->to(base_url('contracts'));
        }

        // Check if valid contract ID
        $c_model = new Contract_model();
        if ($c_model->get_contract($contract) == null)
        {
            return redirect()->to(base_url('contracts'));
        }

        $model = new Invoice_model();

        // Validate data
        if (! $this->validate([
            'date'          => 'required',
            'number'        => 'required',
            'amount'        => 'required',
            'paid'          => 'required',
            'invoiceUpload' => 'ext_in[invoiceUpload,pdf,docx,xlsx]'
        ],[
            // Validation error messages
            'invoiceUpload' => [
                'ext_in' => 'Only .pdf .docx or .xlsx files can be uploaded. Please try again.'
            ]
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod(),
                'contract'   => $contract
            ];

            // If validation fails, load the 'New Invoice' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('contracts/invoice_add', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data
            $model->insert([
                'contract_id'    => $contract,
                'date'           => $this->request->getPost('date'),
                'invoice_number' => $this->request->getPost('number'),
                'amount'         => $this->request->getPost('amount'),
                'paid'           => $this->request->getPost('paid')
            ]);

            // Get the new invoice ID
            $id = $model->insertID();

            // Retrieve the uploaded file
            $file = $this->request->getFile('invoiceUpload');

            // Check that the file was uploaded without errors
            if ($file->isValid())
            {
                // Move the uploaded file
                $filename = 'invoice_'.$id.'.'.$file->getExtension();
                $file->store('../../public/uploads/', $filename);
                $path = 'uploads/'.$filename;

                // Update the database to include the file path
                $model->update($id, [
                    'invoice' => $path
                ]);
            }

            // Return to the contract view
            return redirect()->to(base_url('contracts/'.$contract));
        }
    }


    /**
     * Edit an individual Invoice record
     * @param int $id The invoice ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function edit($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('contracts'));
        }

        $model = new Invoice_model();

        // Retrieve invoice record
        $invoice = $model->get_invoice($id);

        // Check invoice record exists
        if ($invoice != null)
        {
            // Validate data
            if (! $this->validate([
                'date'          => 'required',
                'number'        => 'required',
                'amount'        => 'required',
                'paid'          => 'required',
                'invoiceUpload' => 'ext_in[invoiceUpload,pdf,docx,xlsx]'
            ],[
                // Validation error messages
                'invoiceUpload' => [
                    'ext_in' => 'Only .pdf .docx or .xlsx files can be uploaded. Please try again.'
                ]
            ]))
            {
                $data = [
                    'validation' => $this->validator,
                    'method'     => $this->request->getMethod(),
                    'invoice'   => $invoice
                ];

                // If validation fails, load the 'Edit Invoice' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('contracts/invoice_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, retrieve the uploaded file
                $file = $this->request->getFile('invoiceUpload');

                // Check that the file was uploaded without errors
                if ($file->isValid())
                {
                    // Move the uploaded file
                    $filename = 'invoice_'.esc($id).'.'.$file->getExtension();
                    $file->move('uploads/', $filename, true);
                    $path = 'uploads/'.$filename;
                }
                // If no new file, keep the existing file path
                else
                {
                    $path = $invoice['invoice'];
                }

                // Save the data and return to the contract view
                $model->update($id, [
                    'date'           => $this->request->getPost('date'),
                    'invoice_number' => $this->request->getPost('number'),
                    'amount'         => $this->request->getPost('amount'),
                    'paid'           => $this->request->getPost('paid'),
                    'invoice'        => $path
                ]);

                return redirect()->to(base_url('contracts/'.$invoice['contract_id']));
            }
        }
        // If invoice record not found
        else
        {
            return redirect()->to(base_url('contracts'));
        }
    }


    /**
     * Delete an individual Invoice record
     * @param int $id The invoice ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('contracts'));
        }

        $model = new Invoice_model();

        // Retrieve the invoice record
        $invoice = $model->get_invoice($id);

        // Check the invoice record exists
        if ($invoice != null)
        {
            // Extract the contract ID
            $contract = $invoice['contract_id'];

            // Delete the invoice record
            if ($this->request->getMethod() == 'post')
            {
                $model->where('invoice_id', $id)
                    ->delete();
            }

            // Return to the contract view
            return redirect()->to(base_url('contracts/' . $contract));
        }
        // If invoice record not found
        else
        {
            return redirect()->to(base_url('contracts'));
        }
    }

}
