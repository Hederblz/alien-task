<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profiles.show', ['user' => $user]);
    }

    public function configs($id)
    {
        $user = User::findOrFail($id);
        return view('profiles.configs', ['user' => $user]);
    }

    public function updateData($id)
    {
        $user = User::findOrFail($id);
       return view('profile.update', ['user' => $user]);
    }

    public function statistics($id)
    {
        $user = User::findOrFail($id);
        return view('profiles.statistics', ['user' => $user]);
    }
}
