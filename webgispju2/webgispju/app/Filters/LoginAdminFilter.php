<?php namespace App\Filters;


use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginAdminFilter implements FilterInterface
{


    /**
     * @inheritDoc
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // TODO: Implement before() method.
        if (!session('pju_userid')) {
            return redirect('/auth');
        }
    }

    /**
     * @inheritDoc
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}