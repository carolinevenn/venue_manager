<?php namespace App\Controllers;

use App\Models\Venue_model;

class Venue extends BaseController
{
    public function index()
    {
        $model = new Venue_model();

        $data = [
            'rooms' => $model->get_rooms(),
            'staff' => $model->get_staff(),
            'venue' => $model->get_venue(1),
            'title'     => 'Venue',
        ];

        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('venue/index', $data);
        echo view('templates/footer', $data);
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
            'venue'   => $model->get_venue($id),
            'method'  => $this->request->getMethod()
        ];

        if ($data['venue'] != null)
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
                echo view('venue/venue_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data
                $model->update_venue($id, [
                    'venue_name'  => $this->request->getPost('name')
                ]);
                return redirect()->to(base_url('/venue'));
            }
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }
}