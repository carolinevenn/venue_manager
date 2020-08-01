<?php namespace App\Controllers;

use App\Models\Calendar_model;

class Calendar extends BaseController
{
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

    public function delete($id)
    {
        $model = new Calendar_model();

        if ($this->request->getMethod() == 'post')
        {
            $model->where('booking_id', $id)
                ->delete();

            return redirect()->back();
        }
        else
        {
            return redirect()->to(base_url('/contracts'));
        }
    }

}