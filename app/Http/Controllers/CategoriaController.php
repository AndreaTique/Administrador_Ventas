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


    public function ViewInsertCate()
    {
        $data['departamentos'] = App\departamento::all();
        $data['municipios'] = App\municipios::all();

        return view('Categoria/insert',compact('data'));
    }
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
    $user->departamento=DB::table('departamentos')->where('id_departamento', $request->departamento)->value('departamento');
    $user->municipio=DB::table('municipios')->where('id_municipio', $request->municipio)->value('municipio');;
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
        $data['departamentos'] = App\departamento::all();
        $data['municipios'] = App\municipios::all();
        $updatecategoria = App\Categorias::FindOrFail($id);
        return view('Categoria/update',compact('data','updatecategoria'));
        
    }

    public function UpdateBdCate(Request $categoria)
    {
      
        $instanciacategoria = App\Categorias::FindOrFail($categoria->id);
     
        $instanciacategoria->nombre=$categoria->nombre;
        $instanciacategoria->fecha=$categoria->fecha;
        $instanciacategoria->departamento=DB::table('departamentos')->where('id_departamento', $categoria->departamento)->value('departamento');
        $instanciacategoria->municipio=DB::table('municipios')->where('id_municipio', $categoria->municipio)->value('municipio');
        $instanciacategoria->update();

        return redirect('Categoria/view');
    }
}