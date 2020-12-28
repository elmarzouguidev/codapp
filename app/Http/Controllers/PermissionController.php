<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //

    public function index()
    {

        return view('theme_a.permissions._livewire.index');
    }
}
