<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.admin_home');
    }

    public function api()
    {
        return view('admin.api.api_home');
    }

}
