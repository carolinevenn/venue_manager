<?php namespace App\Controllers;

use App\Models\Venue_model;

/**
 * Class Venue
 * @package App\Controllers
 */
class Venue extends BaseController
{
    /**
     * View venue overview, including rooms and staff
     */
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


    /**
     * Edit venue details
     * @param int $id The venue ID
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

        $data = [
            'venue'   => $model->get_venue($id),
            'method'  => $this->request->getMethod()
        ];

        // Check venue exists
        if ($data['venue'] != null)
        {
            // Validate data
            if (! $this->validate([
                'name' => 'required'
            ]))
            {
                $data ['validation'] = $this->validator;

                // If validation fails, load the 'Edit Venue' page
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
                // Return to venue overview
                return redirect()->to(base_url('venue'));
            }
        }
        // If venue ID is incorrect
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }
}
