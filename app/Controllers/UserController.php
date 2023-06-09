<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class UserController extends BaseController
{
    public function __construct() {
        helper('render');
        $this->user = new UserModel();
    }
    public function index()
    {
        return render('users/index');
    }

    public function store() {
        $user = new UserModel();
        $user_password = $this->request->getPost('password');
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'password' => $hashed_password
        ];
        
        // var_dump($data); die;

        $user->save($data);
        $data = ['status'=>'User Saved Successfully'];

        return $this->response->json_encode($data);
    }

    public function fetch() {
        $data['user'] = $this->user->findAll();

        return $this->response->setJSON($data);
    }
}
