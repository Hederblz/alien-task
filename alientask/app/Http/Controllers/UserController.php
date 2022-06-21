<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function show()
    {
        $user = Auth::user()->id;
        return view('user.show', compact($user));
    }
    
    public function configs()
    {
        $user = Auth::user()->id;
        return view('user.configs', compact($user));
    }
    
    public function edit()
    {
        $user = Auth::user()->id;
        return view('user.edit', compact($user));
    }
}
