<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.user.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password],  $request->remember)) {
            if (Auth::user()->status == 1)
                return redirect()->route('admin.home');
            else {
                Auth::logout();
                return redirect()->back()->with(['type' => 'danger', 'msg' => 'Your account has been blocked!']);
            }
        } else {
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Incorrect login information!']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }
}
