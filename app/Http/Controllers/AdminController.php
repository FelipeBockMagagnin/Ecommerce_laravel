<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

    public function show_login(){
        return view('login_admin');
    }

    public function show_create(){
        return view('create_admin');
    }
}