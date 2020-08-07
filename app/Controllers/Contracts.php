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


    public function view($id = false)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }

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



    public function add($id = false)
    {
        $model = new Contract_model();
        $c_model = new Customer_model();

        // Validate data
        if (! $this->validate([
            'customer' => 'required',
            'event'    => 'required',
            'status'   => 'required',
            'contract' => 'ext_in[contract,pdf,docx,xlsx]',
            'quote'    => 'ext_in[quote,pdf,docx,xlsx]'
        ],[
            // Validation error messages
            'contract' => [
                'ext_in' => 'Only .pdf .docx or .xlsx files can be uploaded. Please try again.'
            ],
            'quote' => [
                'ext_in' => 'Only .pdf .docx or .xlsx files can be uploaded. Please try again.'
            ]
        ]))
        {
            // Find current customer
            if ($id != false)
            {
                // Redirect if the ID is not numeric
                if (!is_numeric($id))
                {
                    return redirect()->to(base_url('/contracts'));
                }

                $customer = $c_model->get_customer($id);
            }
            else
            {
                $customer = null;
            }

            // Create array of customers
            $c_array[""] = "";
            $c = $c_model->get_all_customers();
            foreach ($c as $item):
                $c_array[$item['customer_id']] = $item['company_name'];
            endforeach;

            $data = [
                'validation'    => $this->validator,
                'method'        => $this->request->getMethod(),
                'customer_list' => $c_array,
                'customer'      => $customer
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
            $model->transStart();
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
            ]);

            // Retrieve the new contract ID
            $id = $model->insertID();

            // Retrieve the uploaded files
            $contractFile = $this->request->getFile('contract');
            $quoteFile = $this->request->getFile('quote');

            // Check that the contract file was uploaded without errors
            if ($contractFile->isValid())
            {
                // Move the uploaded file
                $filename = 'contract_'.$id.'.'.$contractFile->getExtension();
                $contractFile->store('../../public/uploads/', $filename);
                $path = 'uploads/'.$filename;

                // Update the database to include the file path
                $model->update($id, [
                    'contract' => $path
                ]);
            }

            // Check that the quote file was uploaded without errors
            if ($quoteFile->isValid())
            {
                // Move the uploaded file
                $filename = 'quote_'.$id.'.'.$quoteFile->getExtension();
                $quoteFile->store('../../public/uploads/', $filename);
                $path = 'uploads/'.$filename;

                // Update the database to include the file path
                $model->update($id, [
                    'quote' => $path
                ]);
            }

            // Save the event data
            $model->save_event([
                'contract_id'  => $id,
                'event_title'  => $this->request->getPost('event'),
                'running_time'  => $this->request->getPost('runTime'),
                'genre'  => $this->request->getPost('genre'),
                'guidance'  => $this->request->getPost('guidance')
            ]);
            $model->transComplete();

            // View the new contract
            return redirect()->to(base_url('/contracts/'.$id));
        }
    }



    public function edit($id = false)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }

        $model = new Contract_model();

        $contract = $model->get_contract($id);

        // If the contract exists
        if ($contract != null)
        {
            // Validate data
            if (! $this->validate([
                'customer' => 'required',
                'event'    => 'required',
                'status'   => 'required',
                'contract' => 'ext_in[contract,pdf,docx,xlsx]',
                'quote'    => 'ext_in[quote,pdf,docx,xlsx]'
            ],[
                // Validation error messages
                'contract' => [
                    'ext_in' => 'Only .pdf .docx or .xlsx files can be uploaded. Please try again.'
                ],
                'quote' => [
                    'ext_in' => 'Only .pdf .docx or .xlsx files can be uploaded. Please try again.'
                ]
            ]))
            {
                // Create array of customers
                $c_model = new Customer_model();
                $c_array[""] = "";
                $c = $c_model->get_all_customers();
                foreach ($c as $item):
                    $c_array[$item['customer_id']] = $item['company_name'];
                endforeach;

                $data = [
                    'contract'      => $contract,
                    'validation'    => $this->validator,
                    'method'        => $this->request->getMethod(),
                    'customer_list' => $c_array
                ];

                // If validation fails, load the 'Edit Contract' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('contracts/update', $data);
                echo view('templates/footer');
            }
            else
            {
                // Retrieve the uploaded files
                $contractFile = $this->request->getFile('contract');
                $quoteFile = $this->request->getFile('quote');

                // Check that the contract file was uploaded without errors
                if ($contractFile->isValid())
                {
                    // Move the uploaded file
                    $filename = 'contract_'.$id.'.'.$contractFile->getExtension();
                    $contractFile->move('uploads/', $filename, true);
                    $contractPath = 'uploads/'.$filename;
                }
                else
                {
                    $contractPath = $contract['contract'];
                }

                // Check that the quote file was uploaded without errors
                if ($quoteFile->isValid())
                {
                    // Move the uploaded file
                    $filename = 'quote_'.$id.'.'.$quoteFile->getExtension();
                    $quoteFile->move('uploads/', $filename, true);
                    $quotePath = 'uploads/'.$filename;
                }
                else
                {
                    $quotePath = $contract['quote'];
                }

                // If validation passes, update the contract
                $model->transStart();
                $model->update($id, [
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
                    'contract'       => $contractPath,
                    'quote'          => $quotePath
                ]);

                // Update the event data
                $model->update_event($contract['event_id'], [
                    'contract_id'  => $id,
                    'event_title'  => $this->request->getPost('event'),
                    'running_time'  => $this->request->getPost('runTime'),
                    'genre'  => $this->request->getPost('genre'),
                    'guidance'  => $this->request->getPost('guidance')
                ]);
                $model->transComplete();

                // View the contract
                return redirect()->to(base_url('/contracts/'.$id));
            }
        }
        else
        {
            return redirect()->to(base_url('/contracts'));
        }
    }


    public function export($id = false)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('/contracts'));
        }

        $model = new Contract_model();

        $contract = $model->get_contract_export($id);

        if ($contract != null)
        {
            $array = [
                'headings' => array_keys($contract),
                'contract' => $contract,
            ];

            // Open output stream, "writing only" mode
            $f = fopen('php://output', 'w');
            // Loop over the array
            foreach ($array as $line) {
                // Generate csv lines from the inner arrays
                fputcsv($f, $line);
            }
            // Tell the browser it's going to be a csv file
            header('Content-Type: application/csv');
            // Tell the browser we want to save it instead of displaying it
            header('Content-Disposition: attachment; filename="contract_'.$id.'.csv";');
        }
        else
        {
            return redirect()->to(base_url('/contracts'));
        }
    }

}
