<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitasconfigController extends Controller
{
    public function index () {

        return view('admin.citas_config');

    }
}
