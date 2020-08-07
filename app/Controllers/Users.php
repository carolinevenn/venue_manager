<?php namespace App\Controllers;

use App\Models\Venue_model;

class Users extends BaseController
{
    public function login()
    {
        $model = new Venue_model();

        // Validate data
        if (! $this->validate([
            'inputEmail' => 'required',
            'inputPassword' => 'required'
        ],[
        // Validation error messages
            'inputEmail' => [
                'required' => 'Please enter an email'
            ],
            'inputPassword' => [
                'required' => 'Please enter a password'
            ]
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ];

            // If validation fails, load the Login page
            echo view('templates/header');
            echo view('pages/login', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, attempt login
            $email = $this->request->getPost('inputEmail');
            $password = trim($this->request->getPost('inputPassword'));
            $user = $model->login($email, $password);


            if ($user != null)
            {
                $userData = [
                    'user_name' => $user['name'],
                    'user_id'   => $user['staff_id'],
                    'access'    => $user['access_level']
                ];

                $this->session->set($userData);
                return redirect()->to(base_url());
            }
            else {
                $this->session->setFlashdata('login_fail',
                    'Email and/or Password are incorrect. Please try again');
                return redirect()->to(base_url('login'));
            }
        }
    }

    public function logout()
    {
        $userData = ['user_name', 'user_id', 'access'];
        $this->session->remove($userData);

        return redirect()->to(base_url('login'));
    }
}
