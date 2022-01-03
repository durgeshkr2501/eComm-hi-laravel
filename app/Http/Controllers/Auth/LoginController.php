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
        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($user) {
            return redirect('/');
        }
        return redirect()->back();

        // $user= User::where(['email'=>$req->email])->first();
        // if(!$user || Hash::check($req->password, $user ->password))
        // {
        //     return "Username or password is note match";
        // }
        // else{
        //     $req->session()->put('user',$user);
        //     return redirect('/');
        // }
    }
}
