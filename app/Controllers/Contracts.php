<?php namespace App\Controllers;

use App\Models\Contract_model;
use App\Models\Customer_model;
use App\Models\Venue_model;

class Contracts extends BaseController
{
    public function index()
    {
        $model = new Contract_model();
        $venue = new Venue_model();

        if ($this->request->getMethod() == 'post')
        {
            $search = $this->request->getPost('search');
            $status = $this->request->getPost('status');
            $room = $this->request->getPost('room');
            $sort = $this->request->getPost('sort');
        }
        else
        {
            $search = false;
            $status = false;
            $room = false;
            $sort = false;
        }

        // Create array of room IDs and names, for dropdown
        $room_array["All"] = "All";
        $r = $venue->get_rooms();
        foreach ($r as $item):
        $room_array[$item['room_id']] = $item['name'];
        endforeach;

        $data = [
            'contracts' => $model->get_all_contracts($search, $status, $room, $sort),
            'rooms'     => $room_array,
            'title'     => 'Contracts',
        ];

        echo view('templates/header', $data);
        echo view('templates/navbar');
        echo view('contracts/index', $data);
        echo view('templates/footer', $data);
    }


    public function view($id)
    {
        $model = new Contract_model();
        $customer = new Customer_model();

        $contract = $model->get_contract($id);

        if ($contract != null)
        {
            $data = [
                'contract' => $contract,
                'customer' => $customer->get_customer($contract['customer_id']),
                'bookings' => $model->get_bookings($id),
                'events'   => $model->get_events($id),
                'invoices' => $model->get_invoices($id)
            ];

            echo view('templates/header');
            echo view('templates/navbar');
            echo view('contracts/view', $data);
            echo view('templates/footer');
        }
        else
        {
            return redirect()->to(base_url('/contracts'));
        }
    }


    public function edit($id)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }


    }


    public function add()
    {
        $model = new Contract_model();

        // Validate data
        if (! $this->validate([
            'customer' => 'required',
            'event'    => 'required',
            'status'   => 'required'
        ]))
        {
            $data = [
                'validation' => $this->validator,
                'method'     => $this->request->getMethod()
            ];

            // If validation fails, load the 'Add Contract' page
            echo view('templates/header');
            echo view('templates/navbar');
            echo view('contracts/create', $data);
            echo view('templates/footer');
        }
        else
        {
            // If validation passes, save the contract data
            $model->insert([
                'customer_id'    => $this->request->getPost('customer'),
                'price_agreed'   => $this->request->getPost('price'),
                'deposit'        => $this->request->getPost('deposit'),
                'contract_type'  => $this->request->getPost('type'),
                'revenue_split'  => $this->request->getPost('split'),
                'requirements'   => $this->request->getPost('requirements'),
                'booking_status' => $this->request->getPost('status'),
                'ticket_sales'   => $this->request->getPost('sales'),
                'get_in'         => $this->request->getPost('getIn'),
                'get_out'        => $this->request->getPost('getOut'),
                'misc_terms'     => $this->request->getPost('terms'),
                'updated_on'     => date('Y-m-d H:i:s'),
                // 'updated_by'     =>
                // 2 document uploads
            ]);
            // Retrieve the new contract ID
            $id = $model->insertID();
            // Save the event data
            $model->save_event([
                'contract_id'  => $id,
                'event_title'  => $this->request->getPost('event'),
                'running_time'  => $this->request->getPost('runTime'),
                'genre'  => $this->request->getPost('genre'),
                'guidance'  => $this->request->getPost('guidance')
            ]);
            // View the new contract
            return redirect()->to(base_url('/contracts/'.$id));
        }
    }

}
