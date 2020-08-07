<?php namespace App\Controllers;

use App\Models\Venue_model;

class Staff extends BaseController
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
            'email' => 'required|valid_email|is_unique[staff.email]',
            'password1' => 'required|min_length[8]',
            'password2' => 'required|matches[password1]',
            'access' => 'required',
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

            // Save the data and view the new staff member's details
            $model->insert([
                'name'         => $this->request->getPost('name'),
                'email'        => $this->request->getPost('email'),
                'password'     => $passHash,
                'access_level' => $this->request->getPost('access'),
                'role'         => $this->request->getPost('role'),
                'phone'        => $this->request->getPost('phone'),
                'venue_id'     => '1'
            ]);
            return redirect()->to(base_url('/staff/'.$model->insertID()));
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
            'staff' => $model->get_staff_member($id),
            'method' => $this->request->getMethod()
        ];

        if ($data['staff'] != null)
        {
            // Validate data
            if (! $this->validate([
                'name' => 'required',
                'email' => 'required|valid_email|is_unique[staff.email,staff_id,{staffId}]',
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
                return redirect()->to(base_url('/staff/'.$id));
            }
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }


    public function password($id = false)
    {
        // Redirect if user doesn't have permission
        if ($this->session->get('access') == 'Staff' && $this->session->get('user_id') != $id)
        {
            return redirect()->to(base_url());
        }

        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/venue'));
        }

        $model = new Venue_model();

        $staff = $model->get_staff_member($id);

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
                if ($id == $this->session->get('user_id'))
                {
                    $url = "";
                }
                else
                {
                    $url = "staff/".$id;
                }

                $data = [
                    'method'     => $this->request->getMethod(),
                    'validation' => $this->validator,
                    'url'        => $url
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

                // Save the data and view the new customer's details
                $model->update($id, [
                    'password' => $passHash
                ]);
                return redirect()->to(base_url('/staff/'.$id));
            }
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }


    public function delete($id = false)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/venue'));
        }

        $model = new Venue_model();

        $staff = $model->get_staff_member($id);

        if ($staff != null)
        {
            if ($this->request->getMethod() == 'post')
            {
                $model->where('staff_id', $id)
                    ->delete();
            }
            return redirect()->to(base_url('/venue/'));
        }
        else
        {
            return redirect()->to(base_url('/venue'));
        }
    }

}
