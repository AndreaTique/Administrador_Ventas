<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    public function viewInsertArti()
    {
        $infocategoria = App\Categorias::All();
        return view('Articulo/insert',compact('infocategoria'));
    }
    public function InsertArti(Request $request)
    {

        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required',
            'stok' => 'required',
            'descripcion' => 'required',
            'foto' => 'required|image',
            'estado' => 'required',
            'categoria' => 'required'
            
            ]);

        
            $ruta = Storage::disk('public')->put('storage/articulo',$request->file('foto'));
            $unavariable = asset($ruta);
        

        $use = new App\Articulos;
        $use->codigo = $request->codigo;
        $use->nombre = $request->nombre;
        $use->stok = $request->stok;
        $use->descripcion = $request->descripcion;
        $use->foto = $unavariable;
        $use->estado = $request->estado;
        $use->categoriaid = $request->categoria;
        $use->save();
        return redirect('Articulo/view');
    

    }
    public function ViewArti()
    {
        $objetoretornado = App\Articulos::paginate(5);
        return view('Articulo/view',compact('objetoretornado'));
    }
    
    public function DeleteArti($id)
    {
        $deletearticulo = App\Articulos::Find($id);
        $deletearticulo->delete();
        return redirect('Articulo/view')->with('guardado', 'El producto fue borrado con exito!');
    }

    public function UpdateArti($id)
    {
        $infocategoria = App\Categorias::All();
        $updatearticulo = App\Articulos::FindOrFail($id);
        return view('Articulo/update',compact('updatearticulo','infocategoria'));
    }

    public function UpdateBdCate(Request $request)
    {
        $ruta = Storage::disk('public')->put('storage/articulo',$request->file('foto'));
        $unavariable = asset($ruta);
        
        $use = App\Categorias::FindOrFail($request->id);
        $use->codigo = $request->codigo;
        $use->nombre = $request->nombre;
        $use->stok = $request->stok;
        $use->descripcion = $request->descripcion;
        $use->foto = $unavariable;
        $use->estado = $request->estado;
        $use->categoriaid = $request->categoria;
        $use->update();
        return redirect('Categoria/view')->with('guardado','El Registro fue Actualizado con Exito');
    }
  
}