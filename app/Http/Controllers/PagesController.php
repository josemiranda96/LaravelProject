<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class PagesController extends Controller
{
    public function inicio(){
        $notas = App\Nota::all();
        return view('welcome', compact('notas'));
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

    public function detalle($id){
        //Si el id no existe nos dara un error 404
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }
}
