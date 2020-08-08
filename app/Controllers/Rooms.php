<?php namespace App\Controllers;

use App\Models\Venue_model;

class Rooms extends BaseController
{
    /**
     * View an individual Room record
     * @param int $id The room ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function view($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('venue'));
        }

        $model = new Venue_model();

        // Retrieve room record
        $data = [
            'room' => $model->get_room($id)
        ];

        // Check room record exists
        if ($data['room'] != null)
        {
            // Load page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('venue/room_view', $data);
            echo view('templates/footer');
        }
        // If room record not found
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }


    /**
     * Create a new Room record
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
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
            // If validation passes, save the data and view the new room record
            $model->save_room([
                'name'      => $this->request->getPost('name'),
                'price'     => $this->request->getPost('price'),
                'capacity'  => $this->request->getPost('capacity'),
                'resources' => $this->request->getPost('resources'),
                'venue_id'  => '1'
            ]);
            return redirect()->to(base_url('rooms/'.$model->insertID()));
        }
    }


    /**
     * Edit an individual Room record
     * @param int $id The room ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function edit($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('venue'));
        }

        $model = new Venue_model();

        // Retrieve the room record
        $data = [
            'room'   => $model->get_room($id),
            'method' => $this->request->getMethod()
        ];

        // Check the room record exists
        if ($data['room'] != null)
        {
            // Validate data
            if (! $this->validate([
                'name' => 'required'
            ]))
            {
                $data ['validation'] = $this->validator;

                // If validation fails, load the 'Edit Room' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('venue/room_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and return to the room record
                $model->update_room($id, [
                    'name'      => $this->request->getPost('name'),
                    'price'     => $this->request->getPost('price'),
                    'capacity'  => $this->request->getPost('capacity'),
                    'resources' => $this->request->getPost('resources')
                ]);
                return redirect()->to(base_url('rooms/'.$id));
            }
        }
        // If room record not found
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }

}
