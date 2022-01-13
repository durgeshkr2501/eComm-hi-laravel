<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        session()->forget('error');
        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user) {
            return redirect('/');
        }

        session()->put('error', 'Please fill the correct user id and password');
        return redirect()->back();
       
    }

    public function logout() 
    {
        Auth::logout();
        return redirect('/login');
    }

   
}
