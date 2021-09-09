<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function show_login(){
        return view('login');
    }

    public function show_create(){
        return view('create_user');
    }
}