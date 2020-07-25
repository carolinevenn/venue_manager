<?php namespace App\Controllers;

use App\Models\Calendar_model;
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

        if ($page == 'home')
        {
            $cal = new Calendar_model();
            $venue = new Venue_model();

            $data = [
                'title'  => 'Home',
                'room'   => $venue->get_rooms(),
                'booking'  => $cal->get_bookings(),

            ];

            echo view('templates/header', $data);
            echo view('templates/navbar');
            echo view('pages/home', $data);
            echo view('templates/footer', $data);
        }
        else if ($page == 'login')
        {
            echo view('templates/header', $data);
            echo view('pages/'.$page, $data);
            echo view('templates/footer', $data);
        }
        else {
            echo view('templates/header', $data);
            echo view('templates/navbar');
            echo view('pages/'.$page, $data);
            echo view('templates/footer', $data);
        }
    }
}