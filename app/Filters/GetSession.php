<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Users_model;

// Butuh authentikasi (login) untuk mengaksed direktori
class GetSession implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Parsing URL data into header view from Users Controller
        $users = new Users_model();
        $data['user'] = $users->where('idUser', session()->get('idUser'))->first();
        /*$uri = service('uri'); 
        // Cek uri
        if($uri->getSegment(2)==='similarity'){ // no require users id or login
            redirect()->to('/method/similarity');
        }
        elseif($uri->getSegment(3) != session()->get('idUser')){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        else{
            return false;
        }
        */
        return view('templates/header', $data);
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}