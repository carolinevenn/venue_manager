<?php namespace App\Controllers;

use App\Models\Venue_model;

class Rooms extends BaseController
{
    public function view($id = false)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/venue'));
        }

        $model = new Venue_model();

        $data = [
            'room' => $model->get_room($id)
        ];

        if ($data['room'] != null)
        {
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('venue/room_view', $data);
            echo view('templates/footer');
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }

    public function add()
    {
        $model = new Venue_model();

        // Validate data
        if (! $this->validate([
            'name' => 'required'
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ];

            // If validation fails, load the 'New Room' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('venue/room_add', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data and view the new room's details
            $model->save_room([
                'name'      => $this->request->getPost('name'),
                'price'     => $this->request->getPost('price'),
                'capacity'  => $this->request->getPost('capacity'),
                'resources' => $this->request->getPost('resources'),
                'venue_id'  => '1'
            ]);
            return redirect()->to(base_url('/rooms/'.$model->insertID()));
        }
    }

    public function edit($id = false)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/venue'));
        }

        $model = new Venue_model();

        $data = [
            'room'   => $model->get_room($id),
            'method' => $this->request->getMethod()
        ];

        if ($data['room'] != null)
        {
            // Validate data
            if (! $this->validate([
                'name' => 'required'
            ]))
            {
                $data ['validation'] = $this->validator;

                // If validation fails, load the 'Edit Customer' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('venue/room_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and view the new customer's details
                $model->update_room($id, [
                    'name'      => $this->request->getPost('name'),
                    'price'     => $this->request->getPost('price'),
                    'capacity'  => $this->request->getPost('capacity'),
                    'resources' => $this->request->getPost('resources')
                ]);
                return redirect()->to(base_url('/rooms/'.$id));
            }
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }

}
