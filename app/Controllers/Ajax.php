<?php namespace App\Controllers;

use App\Models\Calendar_model;

class Ajax extends BaseController
{
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
}