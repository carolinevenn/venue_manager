<?php namespace App\Controllers;

use App\Models\Customer_model;

class Customers extends BaseController
{

    public function index()
    {
        $model = new Customer_model();

        $data = [
            'customers' => $model->get_customers(),
            'title'     => 'Customers',
        ];

        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('customers/index', $data);
        echo view('templates/footer', $data);
    }

    public function view($id)
    {
        $model = new Customer_model();

        $data = [
            'customer' => $model->get_customers($id),
            'current' => $model->get_current($id),
            'history' => $model->get_history($id),
        ];

        if ($data['customer'] != null)
        {
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('customers/view', $data);
            echo view('templates/footer');
        }
        else
        {
            return redirect()->to(base_url('/customers'));
        }
    }

    public function update()
    {

    }

    public function add()
    {
        $model = new Customer_model();

        // Validate data
        if (! $this->validate([
            'companyName' => 'required'
        ]))
        {
            // If validation fails, load the 'Add Customer' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('customers/create', [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ]);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data and view the new customer's details
            $model->insert([
                'company_name'  => $this->request->getVar('companyName'),
                'address'       => $this->request->getVar('address'),
                'town'          => $this->request->getVar('town'),
                'county'        => $this->request->getVar('county'),
                'postcode'      => $this->request->getVar('postcode'),
                'phone'         => $this->request->getVar('phone'),
                'email'         => $this->request->getVar('email'),
                'contact_name'  => $this->request->getVar('contactName'),
                'vat_number'    => $this->request->getVar('vat'),
                'other_details' => $this->request->getVar('other'),
            ]);
            return redirect()->to(base_url('/customers/'.$model->insertID()));
        }
    }
}
