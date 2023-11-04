<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use Illuminate\Http\Request;

class contactoController extends Controller
{
    //

    public function eliminarContacto($id){
        $contacto = contacto::find($id);
        return view('eliminar', compact('contacto'));
    }

    public function destroyContacto($id){
        $contacto = contacto::find($id);
        $contacto->delete();
        return redirect()->route('directorio.index');
    }

    public function agregar($id){
        return view('agregarcontacto', compact('id'));

    }

    public function guardar(Request $request){
        $contacto = new contacto();
        $contacto->codigoEntrada = $request->input('codigo');
        $contacto->nombre = $request->input('nombre');
        $contacto->apellido = $request->input('apellido');
        $contacto->telefono = $request->input('telefono');
        $contacto->save();

        $id = $request->input('codigo');

        return redirect()->route('directorio.contacto', compact('id'));
    }
}
