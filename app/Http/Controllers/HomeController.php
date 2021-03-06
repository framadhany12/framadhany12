<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', ['currentUser'=> Auth::user()]);
    }

    public function contact()
    {
        return view('home.contact');
    }
}
