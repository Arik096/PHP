<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $title="arik";
        return view('welcome',compact('title'));
    }
}
