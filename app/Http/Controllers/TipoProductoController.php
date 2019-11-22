<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class TipoProductoController extends Controller
{
    public function InsertTipo(Request $tipo)
    {

        $tipo->validate([

            'nombre' => 'required',
            'descripcion' =>' required'
           
        ]);

         
        $instanciatipo = new App\TipoProductos;
        $instanciatipo->nombre = $tipo->nombre;
        $instanciatipo->descripcion = $tipo->descripcion;
        $instanciatipo->save();
        return redirect('TipoProducto/view')->with('guardado',
        'El Tipo de Producto fue guardado con exito!');

    }

    public function ViewTipo()
        {
            $objetoretornado = App\TipoProductos::paginate(4);
            return view('TipoProducto/view',compact('objetoretornado'));
        }


        public function DeleteTipo($id)
        {
            $deletetipo = App\TipoProductos::FindOrFail($id);
            $deletetipo->delete();
            return redirect('TipoProducto/view')->with('guardado','El Tipo de Producto Fue Borrado Con Exito');
            

        }

        public function UpdateTipo($id)
        {
            $updatetipo= App\TipoProductos::FindOrFail($id);
            return view('TipoProducto/update',compact('updatetipo'));


        }

        public function UpdateBdTipo(Request $tipo)
        {
           
            $instanciatipo = App\TipoProductos:: FindOrFail($tipo->id);
            $instanciatipo->nombre = $tipo->nombre;
            $instanciatipo->descripcion = $tipo->descripcion;
            $instanciatipo->update();
            return redirect('TipoProducto/view')->with('guardado','Tipo de Producto Actualizado Con Exito!');

        }
}
