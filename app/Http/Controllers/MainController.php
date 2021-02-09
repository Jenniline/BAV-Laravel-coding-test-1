<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
    }
}
