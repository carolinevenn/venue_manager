<?php namespace App\Controllers;

use App\Models\Customer_model;

class Customers extends BaseController
{
    public function index()
    {
        $model = new Customer_model();

        $data = [
            'customers' => $model->getCustomers(),
            'title' => 'Customers',
        ];

        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('customers/index', $data);
        echo view('templates/footer', $data);
    }

    public function view($id)
    {
        $model = new Customer_model();

        $data['customer'] = $model->getCustomers($id);

        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('customers/view', $data);
        echo view('templates/footer', $data);
    }

    public function update()
    {

    }

    public function create()
    {

    }
}