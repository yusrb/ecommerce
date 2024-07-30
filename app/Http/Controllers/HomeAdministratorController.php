<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAdministratorController extends Controller
{
    public function index () {
        return view("administrator/home");
    }
}