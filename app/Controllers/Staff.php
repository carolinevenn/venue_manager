<?php namespace App\Controllers;

use App\Models\Venue_model;

class Staff extends BaseController
{
    public function view($id)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/venue'));
        }

        $model = new Venue_model();

        $data = [
            'staff' => $model->get_staff_member($id)
        ];

        if ($data['staff'] != null)
        {
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('venue/staff_view', $data);
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
            'name' => 'required',
            'email' => 'required',
            'password1' => 'required',
            'access' => 'required',
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ];

            // If validation fails, load the 'New Staff Member' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('venue/staff_add', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data and view the new staff member's details
            $model->insert([
                'name'         => $this->request->getPost('name'),
                'email'        => $this->request->getPost('email'),
                'password'     => $this->request->getPost('password1'),
                'access_level' => $this->request->getPost('access'),
                'role'         => $this->request->getPost('role'),
                'phone'        => $this->request->getPost('phone'),
                'venue_id'     => '1'
            ]);
            return redirect()->to(base_url('/staff/'.$model->insertID()));
        }
    }

    public function edit($id)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/venue'));
        }

        $model = new Venue_model();

        $data = [
            'staff' => $model->get_staff_member($id),
            'method' => $this->request->getMethod()
        ];

        if ($data['staff'] != null)
        {
            // Validate data
            if (! $this->validate([
                'name' => 'required',
                'email' => 'required',
                'password1' => 'required',
                'access' => 'required',
            ]))
            {
                $data ['validation'] = $this->validator;

                // If validation fails, load the 'Edit Customer' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('venue/staff_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and view the new customer's details
                $model->update($id, [
                    'name'         => $this->request->getPost('name'),
                    'email'        => $this->request->getPost('email'),
                    'password'     => $this->request->getPost('password1'),
                    'access_level' => $this->request->getPost('access'),
                    'role'         => $this->request->getPost('role'),
                    'phone'        => $this->request->getPost('phone'),
                ]);
                return redirect()->to(base_url('/staff/'.$id));
            }
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }
}