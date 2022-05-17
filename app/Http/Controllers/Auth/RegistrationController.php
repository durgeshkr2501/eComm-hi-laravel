<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('Auth.registration');
    }

    function registration(UserRegisterRequest $req)
    {
      
      $user = new User;
      $user->name=$req->input('name');
      $user->email=$req->input('email');
      $user-> password=Hash::make($req->input('password'));
      $user->contact=$req->input('contact');
      $user->save();
      $req->session()->put('user',$req->input('name'));
      return redirect('/login');

      
      
    }

    
    
    
    
}
