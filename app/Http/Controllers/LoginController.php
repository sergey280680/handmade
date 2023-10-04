<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
//        abort(403);
        return view('login.index');
    }

    public function store()
    {
        return 'Запрос на вход';
    }
}
