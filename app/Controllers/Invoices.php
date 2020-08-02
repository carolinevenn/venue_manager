<?php namespace App\Controllers;

use App\Models\Contract_model;
use App\Models\Invoice_model;

class Invoices extends BaseController
{
    public function add($contract)
    {
        // Check $contract value is numeric
        if (!is_numeric($contract))
        {
            return redirect()->to(base_url('/contracts'));
        }

        // Check if valid contract
        $c_model = new Contract_model();
        if ($c_model->get_contract($contract) == null)
        {
            return redirect()->to(base_url('/contracts'));
        }

        $model = new Invoice_model();

        // Validate data
        if (! $this->validate([
            'date'   => 'required',
            'number' => 'required',
            'amount' => 'required',
            'paid'   => 'required'
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod(),
                'contract'   => $contract
            ];

            // If validation fails, load the 'Add Customer' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('contracts/invoice_add', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data and view the new customer's details
            $model->insert([
                'contract_id'    => $contract,
                'date'           => $this->request->getPost('date'),
                'invoice_number' => $this->request->getPost('number'),
                'amount'         => $this->request->getPost('amount'),
                'paid'           => $this->request->getPost('paid'),
                // Invoice upload
            ]);

            return redirect()->to(base_url('/contracts/'.$contract));
        }
    }

    public function edit($id)
    {
        // Check id is numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }

        $model = new Invoice_model();

        $invoice = $model->get_invoice($id);

        if ($invoice != null)
        {
            // Validate data
            if (! $this->validate([
                'date'   => 'required',
                'number' => 'required',
                'amount' => 'required',
                'paid'   => 'required'
            ]))
            {
                $data = [
                    'validation' => $this->validator,
                    'method'     => $this->request->getMethod(),
                    'invoice'   => $invoice
                ];

                // If validation fails, load the 'Add Customer' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('contracts/invoice_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and view the new customer's details
                $model->update($id, [
                    'date'           => $this->request->getPost('date'),
                    'invoice_number' => $this->request->getPost('number'),
                    'amount'         => $this->request->getPost('amount'),
                    'paid'           => $this->request->getPost('paid'),
                    // Invoice upload
                ]);

                return redirect()->to(base_url('/contracts/'.$invoice['contract_id']));
            }
        }
        else
        {
            return redirect()->to(base_url('/contracts'));
        }

    }

    public function delete($id)
    {
        // Check id is numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }

        $model = new Invoice_model();

        $invoice = $model->get_invoice($id);

        if ($invoice != null)
        {
            $contract = $invoice['contract_id'];

            if ($this->request->getMethod() == 'post')
            {
                $model->where('invoice_id', $id)
                    ->delete();

                return redirect()->to(base_url('/contracts/'.$contract));
            }
            else
            {
                return redirect()->to(base_url('/contracts'));
            }
        }
    }
}
