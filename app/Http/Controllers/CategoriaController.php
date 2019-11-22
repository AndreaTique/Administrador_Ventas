<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use DB;

class CategoriaController extends Controller
{
    
    // protected function getRegister()
    // {
    //     return view("Registro/registro");
    // }

    
protected function InsertCate(Request $request)
{
    $this->validate($request, [
        'nombre' => 'required',
        'fecha' => 'required',
        'departamento' => 'required',
        'municipio' => 'required',
    ]);
    
    $user=new App\Categorias;
    $user->nombre=$request->nombre;
    $user->fecha=$request->fecha;
    $user->departamento=$request->departamento;
    $user->municipio=$request->municipio;
    $user->save();

        return redirect('Categoria/view');
            
    }

    public function ViewCate()
    {
        $objetoretornado = App\Categorias::paginate(5);
        return view('Categoria/view',compact('objetoretornado'));
    }


    public function DeleteCate($idcategoria)
    {
  
        $deletecategoria = App\Categorias::Find($idcategoria);
        $deletecategoria->delete();
        return redirect('Categoria/view')->with('guardado','La Categoria fue Borardo con Exito');
    }
    
    public function UpdateCate($id)
    {
        $updatecategoria = App\Categorias::FindOrFail($id);
        return view('Categoria/update',compact('updatecategoria'));
    }

    public function UpdateBdCate(Request $categoria)
    {
      
        $instanciacategoria = App\Categorias::FindOrFail($categoria->id);
     
        $instanciacategoria->nombre=$categoria->nombre;
        $instanciacategoria->fecha=$categoria->fecha;
        $instanciacategoria->departamento=$categoria->departamento;
        $instanciacategoria->municipio=$categoria->municipio;
        $instanciacategoria->update();

        return redirect('Categoria/view');
    }
}