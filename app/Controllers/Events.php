<?php namespace App\Controllers;

use App\Models\Event_model;

class Events extends BaseController
{
    public function add($event)
    {
        $model = new Event_model();

        // Validate data
        if (! $this->validate([
            'showTime' => 'required'
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ];

            // If validation fails, load the 'Add Customer' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('contracts/event_add', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data and view the new customer's details
            $model->insert([
                'event_id'   => $event,
                'show_time'  => $this->request->getPost('showTime'),
                'standard'   => $this->request->getPost('standard'),
                'concession' => $this->request->getPost('concession'),
                'student'    => $this->request->getPost('student')
            ]);

            $contract = $model->get_contract_id($event);
            return redirect()->to(base_url('/contracts/'.$contract));
        }
    }

    public function edit($id)
    {

    }

    public function delete($id)
    {

    }
}
