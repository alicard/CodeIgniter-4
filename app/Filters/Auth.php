<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// Butuh authentikasi (login) untuk mengaksed direktori
class Auth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        if( !session()->get('isLoggedIn')){
            echo "<script>
                    window.alert('Anda harus login dahulu!');
                    window.location.href = 'http://localhost:8080';
                </script>";
            die();
          //return redirect()->to('/'); // User dikembalikan ke halaman login dan tidak bisa akses direktori apabila belum melakukan authentikasi
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}