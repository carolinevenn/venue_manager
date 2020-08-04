<?php namespace App\Controllers;

use App\Models\Event_model;

class Events extends BaseController
{
    public function add($event)
    {
        $model = new Event_model();

        $contract = $model->get_contract_id($event);

        // Validate data
        if (! $this->validate([
            'showTime' => 'required'
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

            return redirect()->to(base_url('/contracts/'.$contract));
        }
    }

    public function edit($id)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }

        $model = new Event_model();

        $event_instance = $model->get_event_instance($id);
        $contract = $model->get_contract_id($event_instance['event_id']);

        if ($event_instance != null)
        {
            // Validate data
            if (! $this->validate([
                'showTime' => 'required'
            ]))
            {
                $data = [
                    'validation' => $this->validator,
                    'method'     => $this->request->getMethod(),
                    'event'      => $event_instance,
                    'contract'   => $contract
                ];

                // If validation fails, load the 'Edit event instance' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('contracts/event_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and return to the contract
                $model->update($id, [
                    'show_time'  => $this->request->getPost('showTime'),
                    'standard'   => $this->request->getPost('standard'),
                    'concession' => $this->request->getPost('concession'),
                    'student'    => $this->request->getPost('student')
                ]);

                return redirect()->to(base_url('/contracts/'.$contract));
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

        $model = new Event_model();
        $event_instance = $model->get_event_instance($id);
        $contract = $model->get_contract_id($event_instance['event_id']);

        if ($this->request->getMethod() == 'post')
        {
            $model->where('instance_id', $id)
                ->delete();

            return redirect()->to(base_url('/contracts/'.$contract));
        }
        else
        {
            return redirect()->to(base_url('/contracts'));
        }
    }
}
