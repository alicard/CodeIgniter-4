<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// User telah melakukan authentikasi (login), maka diizinkan mengakses direktori 
class Noauth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        if(session()->get('isLoggedIn')){
          return redirect()->to('/users/'.session()->get('idUser')); // User tidak bisa mengakses halaman login lagi jika sudah berhasil masuk dan dikembalikan ke direktori dashboard
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}