<?php
namespace App\Validation;
use App\Models\AdminModel;

class Userrules
{
  public function validateUser(string $str, string $fields, array $data){
    $model = new AdminModel();
    $user = $model->where('email', $data['email'])
                  ->where('password', hash('sha1', $data['password']))
                  ->first();

    if(!$user)
      return false;

    // return password_verify($data['password'], $user['password']);
  }
}
