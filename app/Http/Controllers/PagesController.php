<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class PagesController extends Controller
{
    public function inicio(){
        $notas = App\Nota::paginate(2);
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

    public function crear(Request $request){
        //return $request->all();

        $request->validate([
            'nombre'=> 'required',
            'descripcion'=>'required'
        ]);

        $notaNueva = new App\Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota Agregada!');

    }

    public function editar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function actualizar(Request $request,$id){
        $notaActualizar = App\Nota::findOrFail($id);
        $notaActualizar->nombre = $request->nombre;
        $notaActualizar->descripcion = $request->descripcion;
        $notaActualizar->save();
        return back()->with('mensaje', 'Nota Actualizada');
    }

    public function eliminar($id){

        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
    
        return back()->with('mensaje', 'Nota Eliminada');
    }
    
}
