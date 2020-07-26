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

    }



}