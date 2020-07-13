<?php namespace App\Controllers;

use App\Models\Customer_model;

class Customers extends BaseController
{
    public function index()
    {
        $model = new Customer_model();

        $data = [
            'customers' => $model->get_customers(),
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
        echo view('templates/header');
        echo view('templates/navbar');
        echo view('customers/create');
        echo view('templates/footer');

    }
}