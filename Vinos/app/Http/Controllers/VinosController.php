<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\vino;
use Hash;

class VinosController extends Controller
{
    public function index()
    { 
        return view('vinos');
    }

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'edad' => 'required|min:3|max:30',
            'color'  => 'required|min:3|max:30',
            'azucar'  => 'required|min:3|max:30',
            'grado'  => 'required|min:2'
        ]);
    if($validator ->fails()){
        return back()
        ->withInput()
        ->with('ErrorInsert','Favor de llenar los campos correctamente')
        ->withErrors($validator);
    }else{
        $usuario = vino::create([
            'edad'=>$request->edad,
            'color'=>$request->color,
            'azucar_residual'=>$request->azucar,
            'grado_alcoholico'=>$request->grado,
                        

        ]);
        return back()->with('Listo','Se ha insertado correctamente');
    }
    
    }
}
