<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosContoller extends Controller
{
    public function index()
    {
        
        return view('usuario');
    }
}
