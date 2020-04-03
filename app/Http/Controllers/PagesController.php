<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio(){
        return view('welcome');
    }

    public function fotos(){
        return view('fotos');
    }

    public function noticias(){
        return view('blog');
    }

    public function nosotros($nombre = null){
        $equipo = ['Jose', 'Luis'];
        return view('nosotros', compact('equipo','nombre'));
        //return view('nosotros',['equipo'=>$equipo],'nombre'=>$nombre);
    }
}
