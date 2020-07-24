<?php namespace App\Controllers;

use App\Models\Contract_model;

class Contracts extends BaseController
{
    public function index()
    {
        $model = new Contract_model();

        if ($this->request->getMethod() == 'post')
        {
            $search = $this->request->getPost('search');
            $status = $this->request->getPost('status');
        }
        else
        {
            $search = false;
            $status = false;
        }

        $data = [
            'contracts' => $model->get_all_contracts($search, $status),
            'title'     => 'Contracts',
        ];

        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('contracts/index', $data);
        echo view('templates/footer', $data);
    }


    public function view($id)
    {

    }


    public function edit($id)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }


    }


    public function add()
    {

    }



}