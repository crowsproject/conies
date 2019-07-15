<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControladorAdmin extends Controller
{
    //
    public function inicio()
    {
        return view('machote');
    }
}
