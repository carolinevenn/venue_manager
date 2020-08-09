<?php namespace App\Controllers;

use App\Models\Calendar_model;

/**
 * Class Calendar
 * @package App\Controllers
 */
class Calendar extends BaseController
{
    /**
     * Create a new Room Booking record
     * @throws \ReflectionException
     */
    public function add()
    {
        if ($this->request->isAJAX()) {

            $model = new Calendar_model();

            $model->insert([
                'contract_id' => $this->request->getVar('id'),
                'room_id' => $this->request->getVar('room'),
                'start_time' => $this->request->getVar('start'),
                'end_time' => $this->request->getVar('end')
            ]);
        }
    }


    /**
     * Update an individual Room Booking record
     */
    public function update()
    {
        if ($this->request->isAJAX()) {

            $model = new Calendar_model();

            $id = $this->request->getVar("id");
            $start = $this->request->getVar("start");
            $end = $this->request->getVar("end");
            $room = $this->request->getVar("room");

            $model->update_booking($id, $start, $end, $room);
        }
    }


    /**
     * Delete an individual Room Booking record
     * @param int $id The booking ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($id = null)
    {
        $model = new Calendar_model();

        if ($this->request->getMethod() == 'post')
        {
            // Redirect if the ID is not numeric
            if (!is_numeric($id))
            {
                return redirect()->to(base_url());
            }

            // Retrieve the contract ID
            $contract = $model->get_contract_id($id);

            // Delete the room booking record
            $model->where('booking_id', $id)
                ->delete();

            // Return to the contract view
            return redirect()->to(base_url('contracts/'.$contract));
        }
        else
        {
            return redirect()->to(base_url('contracts'));
        }
    }

}
