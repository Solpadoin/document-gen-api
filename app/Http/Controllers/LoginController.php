<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OjsUser;
use Log;

class LoginController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function account()
    {
        return view('pages.auth.home');
    }

    public function loginRequest(Request $request)
    {
        $valid = OjsUser::validCredentials($request->email, $request->password);
        return $valid ? redirect()->route('account') : redirect()->back();
    }

    public function registerRequest(Request $request)
    {
        try {
            $registered = OjsUser::register($request->username, $request->password, $request->email);
            return $registered ? $this->login() : $this->register();
        }
        catch (\Exception $e) {
            Log::error(self::class.' '.$e->getMessage());
        }
    }
}
