<?php namespace App\Controllers;

use App\Models\Customer_model;

/**
 * Class Customers
 * @package App\Controllers
 */
class Customers extends BaseController
{
    /**
     * View all customers
     */
    public function index()
    {
        $model = new Customer_model();

        // Set search variable
        if ($this->request->getMethod() == 'post')
        {
            $search = $this->request->getPost('search');
        }
        else
        {
            $search = false;
        }

        $data = [
            // Retrieve all customer records, limited by search criteria
            'customers' => $model->get_all_customers($search),
            'title'     => 'Customers',
        ];

        // Load page
        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('customers/index', $data);
        echo view('templates/footer', $data);
    }


    /**
     * View an individual Customer record
     * @param int $id The customer ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function view($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('customers'));
        }

        $model = new Customer_model();

        // Retrieve customer record, and corresponding contract records
        $data = [
            'customer' => $model->get_customer($id),
            'current' => $model->get_current($id),
            'history' => $model->get_history($id),
        ];

        // Check customer record exists
        if ($data['customer'] != null)
        {
            // Load page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('customers/view', $data);
            echo view('templates/footer');
        }
        // If customer record not found
        else
        {
            return redirect()->to(base_url('customers'));
        }
    }


    /**
     * Create new Customer record
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function add()
    {
        $model = new Customer_model();

        // Validate data
        if (! $this->validate([
            'companyName' => 'required'
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ];

            // If validation fails, load the 'Add Customer' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('customers/create', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the data and view the new customer's details
            $model->insert([
                'company_name'  => $this->request->getPost('companyName'),
                'address'       => $this->request->getPost('address'),
                'town'          => $this->request->getPost('town'),
                'county'        => $this->request->getPost('county'),
                'postcode'      => $this->request->getPost('postcode'),
                'phone'         => $this->request->getPost('phone'),
                'email'         => $this->request->getPost('email'),
                'contact_name'  => $this->request->getPost('contactName'),
                'vat_number'    => $this->request->getPost('vat'),
                'other_details' => $this->request->getPost('other'),
            ]);
            return redirect()->to(base_url('customers/'.$model->insertID()));
        }
    }


    /**
     * Edit an individual Customer record
     * @param int $id The customer ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function edit($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('customers'));
        }

        $model = new Customer_model();

        $data = [
            // Retrieve customer record
            'customer'   => $model->get_customer($id),
            'method'     => $this->request->getMethod()
        ];

        // Check customer record exists
        if ($data['customer'] != null)
        {
            // Validate data
            if (! $this->validate([
                'companyName' => 'required'
            ]))
            {
                $data ['validation'] = $this->validator;

                // If validation fails, load the 'Edit Customer' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('customers/update', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and view the customer record
                $model->update($id, [
                    'company_name'  => $this->request->getPost('companyName'),
                    'address'       => $this->request->getPost('address'),
                    'town'          => $this->request->getPost('town'),
                    'county'        => $this->request->getPost('county'),
                    'postcode'      => $this->request->getPost('postcode'),
                    'phone'         => $this->request->getPost('phone'),
                    'email'         => $this->request->getPost('email'),
                    'contact_name'  => $this->request->getPost('contactName'),
                    'vat_number'    => $this->request->getPost('vat'),
                    'other_details' => $this->request->getPost('other'),
                ]);
                return redirect()->to(base_url('customers/'.$id));
            }
        }
        // If customer record not found
        else
        {
            return redirect()->to(base_url('customers'));
        }
    }

}
