<?php namespace App\Controllers;

use App\Models\Event_model;

/**
 * Class Events
 * @package App\Controllers
 */
class Events extends BaseController
{
    /**
     * Create a new Event Instance record
     * @param int $event The event ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function add($event = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($event))
        {
            return redirect()->to(base_url('contracts'));
        }

        $model = new Event_model();

        // Retrieve the contract ID, also checking that the event record exists
        $contract = $model->get_contract_id($event);

        // Check contract record exists
        if ($contract != null)
        {
            // Validate data
            if (! $this->validate([
                'showTime' => 'required'
            ]))
            {
                $data = [
                    'validation' => $this->validator,
                    'method'     => $this->request->getMethod(),
                    'contract'   => $contract
                ];

                // If validation fails, load the 'Add Event Instance' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('contracts/event_add', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and return to the contract view
                $model->insert([
                    'event_id'   => $event,
                    'show_time'  => $this->request->getPost('showTime'),
                    'standard'   => $this->request->getPost('standard'),
                    'concession' => $this->request->getPost('concession'),
                    'student'    => $this->request->getPost('student')
                ]);

                return redirect()->to(base_url('contracts/'.$contract));
            }
        }
        // If contract not found
        else
        {
            return redirect()->to(base_url('contracts'));
        }
    }


    /**
     * Edit an individual Event Instance
     * @param int $id The instance ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function edit($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('contracts'));
        }

        $model = new Event_model();

        // Retrieve event instance record
        $event_instance = $model->get_event_instance($id);
        // Retrieve contract ID
        $contract = $model->get_contract_id($event_instance['event_id']);

        // Check event instance record exists
        if ($event_instance != null)
        {
            // Validate data
            if (! $this->validate([
                'showTime' => 'required'
            ]))
            {
                $data = [
                    'validation' => $this->validator,
                    'method'     => $this->request->getMethod(),
                    'event'      => $event_instance,
                    'contract'   => $contract
                ];

                // If validation fails, load the 'Edit event instance' page
                echo view('templates/header');
                echo view('templates/navbar');
                echo view('contracts/event_edit', $data);
                echo view('templates/footer');
            }
            else
            {
                // If validation passes, save the data and return to the contract
                $model->update($id, [
                    'show_time'  => $this->request->getPost('showTime'),
                    'standard'   => $this->request->getPost('standard'),
                    'concession' => $this->request->getPost('concession'),
                    'student'    => $this->request->getPost('student')
                ]);

                return redirect()->to(base_url('contracts/'.$contract));
            }
        }
        // In event instance record not found
        else
        {
            return redirect()->to(base_url('contracts'));
        }

    }


    /**
     * Delete an individual Event Instance record
     * @param int $id The event instance ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($id = null)
    {
        // Redirect if the ID is not numeric
        if (!is_numeric($id))
        {
            return redirect()->to(base_url('contracts'));
        }

        $model = new Event_model();

        // Retrieve event instance record
        $event_instance = $model->get_event_instance($id);
        // Retrieve contract ID
        $contract = $model->get_contract_id($event_instance['event_id']);

        if ($this->request->getMethod() == 'post')
        {
            // Delete the event instance
            $model->where('instance_id', $id)
                ->delete();

            // Return to contract view
            return redirect()->to(base_url('contracts/'.$contract));
        }
        else
        {
            return redirect()->to(base_url('contracts'));
        }
    }

}
