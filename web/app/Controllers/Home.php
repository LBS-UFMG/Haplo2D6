<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function entrada(){
        return view('home');
    }

    public function documentation(){
        return view('documentation');
    }
}
