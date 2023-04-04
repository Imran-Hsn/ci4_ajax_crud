<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class UserController extends BaseController
{
    public function index()
    {
        helper('render');
        
        return render('users/index');
    }
}
