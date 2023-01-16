<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin.Masyarakat.index');
    }

    public function show($nip)
    {
        return view('Admin.User.show');
    }
}
