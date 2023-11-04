<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use App\Models\directorio;
use Illuminate\Http\Request;

class directorioController extends Controller
{
    //

    public function index(){
        $directorios = directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function destroy($id){
        $directorio = directorio::find($id);
        return view('eliminar', compact('directorio'));
    }

    public function borrar($id){
        $directorio = directorio::find($id);
        $contactos = contacto::where('codigoEntrada', $id)->get();

        foreach($contactos as $contacto){
            $contacto->delete();
        }

        $directorio->delete();
        return redirect()->route('directorio.index');
    }

    public function newEntrada(){
        return view('crearEntrada');
    }

    public function buscar(){
        return view('buscar');
    }

    public function vercontacto($id){
        $contactos = contacto::where('codigoEntrada', $id)->get();
        $directorio = directorio::find($id);
        return view('vercontactos', compact('directorio'),compact('contactos'));
    }

    public function create(Request $request){

        $directorio = new directorio();
        $directorio->codigoEntrada = $request->input('codigo');
        $directorio->nombre = $request->input('nombre');
        $directorio->apellido = $request->input('apellido');
        $directorio->telefono = $request->input('telefono');
        $directorio->correo = $request->input('correo');
        $directorio->save();

        return redirect()->route('directorio.index');
    }

    public function busqueda(Request $request){
        
        if($request->correo != null){
            $directorios = directorio::where('correo', $request->correo)->get();
           if($directorios != null){
                $directorio = $directorios[0];
                $contactos = contacto::where('codigoEntrada', $directorio->codigoEntrada)->get();
                return view('vercontactos', compact('directorio'), compact('contactos'));
           }
           return redirect()->route('directorio.index');
        }

        return redirect()->route('directorio.index');

    }
}
