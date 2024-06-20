<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $acceptedUserType = ['admin', 'supervisor'];

    public function login(Request $request)
    {
        // echo "<pre>";
        // print_r($request->session());

        // if ($request->session()->getId() === null) {
        // print_r(bcrypt(12345));
        // die;
        return view('admin.auth.login');
        // } else {
        // return redirect()->intended('/');
        // }
    }

    function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
            // 'userType' => 'required'
        ]);

        // $userType = $request->userType;

        // if (!in_array($userType, $this->acceptedUserType)) {
        //     return back()->withErrors([
        //         'userType' => 'The provided user type do not match our records.',
        //     ])->onlyInput('userType');
        // }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            // 'role' => $request->userType
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $request->user()->update([
                'lastlogin_from' => $request->getClientIp()
            ]);
            return redirect()->intended('/');


        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function logout(Request $request)
    {
        // Auth::guard('web')->logout();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
