<?php namespace App\Controllers;

use App\Models\Venue_model;

/**
 * Class Staff
 * @package App\Controllers
 */
class Staff extends BaseController
{
    /**
     * View an individual staff record
     * @param int $id The staff ID
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

        // Retrieve staff record
        $data = [
            'staff' => $model->get_staff_member($id)
        ];

        // Check the staff record exists
        if ($data['staff'] != null)
        {
            // Load page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('venue/staff_view', $data);
            echo view('templates/footer');
        }
        // If staff record not found
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }


    /**
     * Create new staff record
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function add()
    {
        $model = new Venue_model();

        // Validate data
        if (! $this->validate([
            'name'      => 'required',
            'email'     => 'required|valid_email|is_unique[staff.email]',
            'password1' => 'required|min_length[8]',
            'password2' => 'required|matches[password1]',
            'access'    => 'required',
        ],[
            // Validation error messages
            'password1' => [
                'min_length' => 'The password must contain at least 8 characters'
            ],
            'password2' => [
                'matches' => 'The passwords must match'
            ],
            'email' => [
                'is_unique' => 'That email address belongs to another user'
            ]
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
            // If validation passes, create a password hash
            $password = $this->request->getPost('password1');
            $passHash = password_hash(trim($password), PASSWORD_DEFAULT);

            // Save the data and view the new staff record
            $model->insert([
                'name'         => $this->request->getPost('name'),
                'email'        => $this->request->getPost('email'),
                'password'     => $passHash,
                'access_level' => $this->request->getPost('access'),
                'role'         => $this->request->getPost('role'),
                'phone'        => $this->request->getPost('phone'),
                'venue_id'     => '1'
            ]);
            return redirect()->to(base_url('staff/'.$model->insertID()));
        }
    }


    /**
     * Edit an individual Staff record
     * @param int $id The staff ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
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
            // Retrieve staff record
            'staff'  => $model->get_staff_member($id),
            'method' => $this->request->getMethod()
        ];

        // Check the staff record exists
        if ($data['staff'] != null)
        {
            // Validate data
            if (! $this->validate([
                'name'   => 'required',
                'email'  => 'required|valid_email|is_unique[staff.email,staff_id,{staffId}]',
                'access' => 'required',
            ],[
                // Validation error messages
                'email' => [
                    'is_unique' => 'That email address belongs to another user'
                ]
            ]))
            {
                $data ['validation'] = $this->validator;

                // If validation fails, load the 'Edit Staff' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('venue/staff_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and return to the staff record
                $model->update($id, [
                    'name'         => $this->request->getPost('name'),
                    'email'        => $this->request->getPost('email'),
                    'access_level' => $this->request->getPost('access'),
                    'role'         => $this->request->getPost('role'),
                    'phone'        => $this->request->getPost('phone'),
                ]);
                return redirect()->to(base_url('staff/'.$id));
            }
        }
        // If staff record not found
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }


    /**
     * Update the password for an individual Staff record
     * @param int $id The staff ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function password($id = null)
    {
        // Redirect if user doesn't have permission
        // ('Staff' access levels can only change their own password)
        if ($this->session->get('access') == 'Staff' && $this->session->get('user_id') != $id)
        {
            return redirect()->to(base_url());
        }

        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('venue'));
        }

        $model = new Venue_model();

        // Retrieve staff record
        $staff = $model->get_staff_member($id);

        // Check staff record exists
        if ($staff != null)
        {
            // Validate data
            if (! $this->validate([
                'password1' => 'required|min_length[8]',
                'password2' => 'required|matches[password1]'
            ],[
                // Validation error messages
                'password1' => [
                    'min_length' => 'The password must contain at least 8 characters'
                ],
                'password2' => [
                    'matches' => 'The passwords must match'
                ]
            ]))
            {

                $data = [
                    'method'     => $this->request->getMethod(),
                    'validation' => $this->validator,
                    'staff_id'   => $id
                ];

                // If validation fails, load the 'Edit Password' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('venue/password_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, create a password hash
                $password = $this->request->getPost('password1');
                $passHash = password_hash(trim($password), PASSWORD_DEFAULT);

                // Update the database
                $model->update($id, [
                    'password' => $passHash
                ]);
                // Return to staff record
                return redirect()->to(base_url('staff/'.$id));
            }
        }
        // If staff record not found
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }


    /**
     * Delete an individual Staff record
     * @param int $id The staff ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('venue'));
        }

        $model = new Venue_model();

        // Retrieve staff record
        $staff = $model->get_staff_member($id);

        // Check staff record exists
        if ($staff != null)
        {
            // Delete staff record
            if ($this->request->getMethod() == 'post')
            {
                $model->where('staff_id', $id)
                    ->delete();
            }
            return redirect()->to(base_url('venue'));
        }
        // If staff record not found
        else
        {
            return redirect()->to(base_url('venue'));
        }
    }

}
