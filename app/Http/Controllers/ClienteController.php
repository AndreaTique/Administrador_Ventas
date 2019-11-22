<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App;

class ClienteController extends Controller
{

    public function InsertCli(Request $cliente)
    {

        $cliente->validate([

            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' =>' required',
            'telefono' => 'required|numeric',
            'documento' => 'required|numeric',
            'foto' => 'required',
            'acepta' => 'accepted'


        ]);

        if($cliente->file('foto')){
        $fot=Storage::disk('public')->put('storage/cliente',$cliente->file('foto'));
        $foto_url=asset($fot);
        }  
        $instanciacliente = new App\Clientes;
        $instanciacliente->nombre = $cliente->nombre;
        $instanciacliente->apellido = $cliente->apellido;
        $instanciacliente->direccion = $cliente->direccion;
        $instanciacliente->telefono = $cliente->telefono;
        $instanciacliente->documento = $cliente->documento;
        $instanciacliente->foto =  $foto_url;
        $instanciacliente->foto_url = $foto_url;
        $instanciacliente->save();
        return redirect('Cliente/view')->with('guardado',
        'El proveedor fue guardado con exito!');

    }

    public function ViewCli()
        {
            $objetoretornado = App\Clientes::paginate(4);
            return view('Cliente/view',compact('objetoretornado'));
        }


        public function DeleteCli($id)
        {
            $deletecliente = App\Clientes::FindOrFail($id);
            $deletecliente->delete();
            return redirect('Cliente/view')->with('guardado','El cliente Fue Borrado Con Exito');
            

        }

        public function UpdateCli($id)
        {
            $updatecliente= App\Clientes::FindOrFail($id);
            return view('Cliente/update',compact('updatecliente'));


        }

        public function UpdateBdCli(Request $cliente)
        {
            if($cliente->file('foto')){
                $fot=Storage::disk('public')->put('storage/cliente',$cliente->file('foto'));
                $foto_url=asset($fot);
            }
            $instanciacliente = App\Clientes:: FindOrFail($cliente->id);
            $instanciacliente->nombre = $cliente->nombre;
            $instanciacliente->apellido = $cliente->apellido;
            $instanciacliente->direccion = $cliente->direccion;
            $instanciacliente->telefono = $cliente->telefono;
            $instanciacliente->foto = $foto_url;
            $instanciacliente->foto_url = $foto_url;
            $instanciacliente->update();

            return redirect('Cliente/view')->with('guardado','Registro Actualizado Con Exito!');

        }
    
}