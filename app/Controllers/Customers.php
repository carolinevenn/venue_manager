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

        $data['customer'] = $model->get_customers($id);

        echo view('templates/header');
        echo view('templates/navbar');
        echo view('customers/view', $data);
        echo view('templates/footer');
    }

    public function update()
    {

    }

    public function add()
    {
        $model = new Customer_model();

        if (! $this->validate([
            'companyName' => 'required'
        ]))
        {
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
            $model->save([
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

            return redirect()->to(base_url('/customers'));
        }

    }
}
