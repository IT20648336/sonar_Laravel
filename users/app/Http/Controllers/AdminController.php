<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    /**
     * Show the dashboard for the admin user.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }
}