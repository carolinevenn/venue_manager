<?php namespace App\Controllers;

use App\Models\Calendar_model;
use App\Models\Contract_model;
use App\Models\Venue_model;

class Pages extends BaseController
{
    /**
     * View a page
     * @param string $page Page name
     */
    public function view($page = 'home')
    {
        // Generate error if page doesn't exist
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        // Capitalize the first letter of page name, and set as title
        $data['title'] = ucfirst($page);

        // Load default homepage (Calendar)
        if ($page == 'home')
        {
            $cal = new Calendar_model();
            $venue = new Venue_model();
            $contract_model = new Contract_model();

            // Create array of contract IDs and names, for dropdown in new booking form
            $c_array[""] = "";
            $c = $contract_model->get_all_contracts();
            foreach ($c as $item):
                $c_array[$item['contract_id']] = $item['event_title'];
            endforeach;

            // Create array of room IDs and names, for dropdown in new booking form
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
