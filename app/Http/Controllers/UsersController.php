<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    
    function loadView($user)
    {
        return view('users',['name'=>$user]);
    }
    
}
