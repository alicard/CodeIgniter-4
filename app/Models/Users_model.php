<?php namespace App\Models;
use CodeIgniter\Model;
 
class Users_model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'idUser';
    protected $allowedFields = ['nmUser', 'email', 'password', 'updated_at'];

    public function getUsers($id = false)
    {
        if($id === false){
            return $this->findAll();
        }
        else{
            return $this->getWhere(['idUser' => $id]);
        }   
    }

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['password']))
          $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

}