<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        
        return view('Admin.User.index', ['user' => $user]);
    }

    public function show($nip)
    {
        $user = User::where('nip', $nip)->first();

        return view('Admin.User.show', ['user' => $user]);
    }
}
