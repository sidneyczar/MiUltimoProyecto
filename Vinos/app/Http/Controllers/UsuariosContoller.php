<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;

class UsuariosContoller extends Controller
{
    public function index()
    {
        //Consultas
        $usuarios = \DB::table('users')->select('users.*')->orderBy('id', 'DESC')->get();
        return view('usuario')->with('usuario', $usuarios);
    }

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'nombre' => 'required|min:3|max:20',
            'email'  => 'email:rfc,dns',
            'pass1'  => 'required|min:3|required_with:pass2|same:pass2',
            'pass2'  => 'required|min:3'
        ]);
    if($validator ->fails()){
        return back()
        ->withInput()
        ->with('ErrorInsert','Favor de llenar los campos correctamente')
        ->withErrors($validator);
    }else{
        $usuario = User::create([
            'name'=>$request->nombre,
            'img'=>'default.jpg',
            'nivel'=>'usuario',
            'email'=>$request->email,
            'password'=>Hash::make($request->pass1)            

        ]);
        return back()->with('Listo','Se ha insertado correctamente');
    }
    
    }
}
