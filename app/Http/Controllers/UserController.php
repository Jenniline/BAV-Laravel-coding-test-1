<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // -------------------- [ user registration view ] -------------
    public function index() {
        return view('authentication.register');
    }

    public function userPostRegistration(Request $request) {

        // validate form fields
        $request->validate([
                'name'        =>      'required',
                'email'             =>      'required|email',
                'password'          =>      'required|min:6',
            ]);

        $input          =           $request->all();

        // if validation success then create an input array
        $inputArray      =           array(
            'name'        =>      $request->name,
            'email'             =>      $request->email,
            'password'          =>      Hash::make($request->password),
        );

        // register user
        $user           =           User::create($inputArray);

        // if registration success then return with success message
        if(!is_null($user)) {
            // return back()->with('success', 'You have registered successfully.');

            return view ('pages.welcome')
            ->with('success', 'You have registered successfully.');

        }

        // else return with error message
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }

    // -------------------- [ User login view ] -----------------------
    public function userLoginIndex() {
            return view('authentication.login');
        }

    // --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request) {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            // return redirect()->intended('dashboard');
            return redirect()->route('homepage');
        }

        else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }


}
