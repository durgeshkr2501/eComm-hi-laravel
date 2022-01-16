<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    
    {
        return view('auth.registration');
    }

    function registration(Request $request)
    {
        session()->forget('error');
        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user) {
            return redirect('/');
        }

        session()->put('error', 'Please fill the correct user id and password');
        return redirect()->back();
       
    }

}
