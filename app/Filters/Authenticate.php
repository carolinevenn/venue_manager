<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authenticate implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Block access unless user is logged in
        if (! session()->get('user_id'))
        {
            return redirect()->to(base_url('login'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}