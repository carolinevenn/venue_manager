<?php namespace App\Controllers;

use App\Models\Calendar_model;
use App\Models\Contract_model;
use App\Models\Venue_model;

class Pages extends BaseController
{
    public function view($page = 'home')
    {
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        // Load homepage (Calendar)
        if ($page == 'home')
        {
            $cal = new Calendar_model();
            $venue = new Venue_model();
            $contract_model = new Contract_model();

            // Create array of contract IDs and names, for dropdown
            $c_array[""] = "";
            $c = $contract_model->get_all_contracts();
            foreach ($c as $item):
                $c_array[$item['contract_id']] = $item['event_title'];
            endforeach;

            // Create array of room IDs and names, for dropdown
            $room_array[""] = "";
            $r = $venue->get_rooms();
            foreach ($r as $item):
                $room_array[$item['room_id']] = $item['name'];
            endforeach;

            $data = [
                'title'         => 'Home',
                'room'          => $r,
                'booking'       => $cal->get_all_bookings(),
                'contract_list' => $c_array,
                'room_list'     => $room_array
            ];

            // Load page
            echo view('templates/header', $data);
            echo view('templates/navbar');
            echo view('pages/home', $data);
            echo view('templates/footer', $data);
        }

        // Load any other page
        else {
            echo view('templates/header', $data);
            echo view('templates/navbar');
            echo view('pages/'.$page, $data);
            echo view('templates/footer', $data);
        }
    }
}