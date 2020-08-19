<?php 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Users_model;
use App\Controller\BaseController;
 
// BaseController for routing
class Users extends Controller 
{  
    public function index()
    {
        $data = [];
        $model = new Users_model;
        $data['user'] = $model->where('idUser', session()->get('idUser'))->first();

        echo view('templates/header', $data);
        echo view('users_view', $data);
        echo view('templates/footer');
    }

    public function login()
    {

        $data = [];
        helper(['form']);
        $model = new Users_model();
        //print_r($_POST);
        //die;

        if ($this->request->getMethod() == 'post') 
        {
            //let's do the validation here
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
            ]
            ];

            // Here is user validation
            if (!$this->validate($rules, $errors)) 
            {
                $data['validation'] = $this->validator;
                //return redirect()->to('/');
            }

            else
            {
                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();

                $this->setUserSession($user);
                
                // Admin only
                if($user['role']==='admin'){
                    return redirect()->to('/method');
                }

                return redirect()->to('/users/'.$user['idUser']);
            }
        }
        $data['user'] = $model->where('idUser', session()->get('idUser'))->first();

        echo view('templates/header', $data);
        echo view('login_view', $data);
        echo view('templates/footer');
    }

    private function setUserSession($user)
    {
        $data = [
          'idUser' => $user['idUser'],
          'nmUser' => $user['nmUser'],
          'email' => $user['email'],
          'role' => $user['role'],
          'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //validation
            $rules = [
            'nmUser' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'password_confirm' => 'matches[password]',
            ];

            if (! $this->validate($rules)) 
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $model = new Users_model();

                $newData = [
                  'nmUser' => $this->request->getVar('nmUser'),
                  'email' => $this->request->getVar('email'),
                  'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/users/login');

            }
        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }

    public function edit(){
    
        $data = [];
        helper(['form']);
        $model = new Users_model();

        if ($this->request->getMethod() === 'post') 
        {
            //validation here
            $rules = [
            'nmUser' => 'required|min_length[3]|max_length[20]',
            ];

            if($this->request->getPost('password') != '')
            {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }


            if (! $this->validate($rules)) 
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $newData = [
                'idUser' => session()->get('idUser'),
                'nmUser' => $this->request->getPost('nmUser'),
                ];
                
                if($this->request->getPost('password') != '')
                {
                    $newData['password_confirm'] = $this->request->getPost('password');
                }

                $model->save($newData);
                $status = $model->getLastQuery();

                /*
                // Cheking value before update
                if($status==false):
                    return false;
                else:
                    var_dump($status);
                    return $status;
                endif;
                */

                session()->setFlashdata('success', 'Successfuly Updated');
                return redirect()->to('/users/edit/'.session()->get('idUser'));

            }
        }

        $data['user'] = $model->where('idUser', session()->get('idUser'))->first();

        echo view('templates/header', $data);
        echo view('edit_view', $data);
        echo view('templates/footer');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('succes', 'Anda telah logout');
        return redirect()->to('/');
    }

    
}
