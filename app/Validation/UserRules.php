<?php 
namespace App\Validation;
use CodeIgniter\Controller;
use App\Models\Users_model;

class UserRules
{

  public function validateUser(string $str, string $fields, array $data){
    $model = new Users_model();
    $user = $model->where('email', $data['email'])
                  ->first();

    if(!$user)
      return false;

    return password_verify($data['password'], $user['password']);
  }
}