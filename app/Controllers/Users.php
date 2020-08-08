<?php namespace App\Controllers;

use App\Models\Venue_model;

class Users extends BaseController
{
    /**
     * User login
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
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
            // Check email and password, and retrieve user data
            $user = $model->login($email, $password);

            // If login is successful
            if ($user != null)
            {
                $userData = [
                    'user_name' => $user['name'],
                    'user_id'   => $user['staff_id'],
                    'access'    => $user['access_level']
                ];

                // Set session data
                $this->session->set($userData);
                // Load homepage
                return redirect()->to(base_url());
            }
            // If login fails
            else
            {
                // Set error message and reload login page
                $this->session->setFlashdata('login_fail',
                    'Email and/or Password are incorrect. Please try again');
                return redirect()->to(base_url('login'));
            }
        }
    }

    /**
     * Logout current user
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout()
    {
        // Clear session data
        $userData = ['user_name', 'user_id', 'access'];
        $this->session->remove($userData);
        // Return to login page
        return redirect()->to(base_url('login'));
    }
}
