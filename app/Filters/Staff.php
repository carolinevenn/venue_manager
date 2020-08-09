<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Staff implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Redirect users with the Access Level 'Staff'
        if (session()->get('access') == 'Staff')
        {
            return redirect()->to(base_url());
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}