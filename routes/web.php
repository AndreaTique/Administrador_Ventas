<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#region Para Home
Route::get('Home', function () {
    return view('home');//menu
});

// Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
#endregion

#region Para Registro
Route::get('/', function () {
    return view('Registro/registro');
});

Route::post('Registro/registro','RegistroController@postRegister')->name('InsertRegistro');
//el mismo isset
#endregion

#region Para Login
Route::get('Login', function () {
    return view('Login/login');
});

Route::post('Login/login','LoginController@postLogin')->name('InsertLogin');
//el mismo isset
Route::get('Login/login','LoginController@getLogin');
//el mismo isset
#endregion

#region para Categoria
Route::get('Categoria/insert', function () {
    return view('Categoria/insert');
})->name('insertarcate');

// Route::post('Categoria/insert','CategoriaController@InsertCate')->name('InsertCategoria');

Route::get('Categoria/view', function () {
    return view('Categoria/view');
})->name('viewcate');

// Route::get('Categoria/view','CategoriaController@ViewCate')->name('ViewCategoria');
// //el mismo isset

// Route::post('Categoria/update','CategoriaController@UpdateBdCate')->name('UpdateBdCategoria');//el mismo isset

// Route::get('Categoria/update{id}','categoriaController@UpdateCate')
// ->name('UpdateCategoria');
// //el mismo isset
// Route::get('Categoria/delete{idcategoria}','CategoriaController@DeleteCate')
// ->name('DeleteCategoria');
// #endregion

#region para rutas Articulos
Route::get('Articulo/insert', 'ArticuloController@viewInsertArti')->name('viewInsertArticulo');

Route::post('Articulo/insert','ArticuloController@InsertArti')->name('InsertarArticulo');

Route::get('Articulo/view', 'ArticuloController@ViewArti')->name('ViewArticulo');

Route::get('Articulo/delete/{id}','ArticuloController@DeleteArti')->name('DeleteArticulo');

Route::get('Articulo/update/{id}','ArticuloController@UpdateArti')->name('UpdateArticulo');

Route::post('Articulo/update','ArticuloController@UpdateBdArti')->name('UpdateBdArticulo');

#endregion

#region Categoria Prueba

// Route::get('Categoria/insert',function() {

//     return view('Categoria/insert');
// })->name('insercate');

// Route::get('Categoria/view',function() {

//     return view('Categoria/view');
// })->name('viewcate');

Route::get('Categoria/view','CategoriaController@ViewCate')->name('ViewCategoria');

Route::get('Categoria/delete/{id}','CategoriaController@DeleteCate')->name('DeleteCategoria');

Route::get('Categoria/update/{id}','CategoriaController@UpdateCate')->name('UpdateCategoria');

Route::post('Categoria/insert','CategoriaController@InsertCate')->name('InsertCategoria');

Route::post('Categoria/update','CategoriaController@UpdateBdCate')->name('UpdateBdCategoria');
#endregion

#region Cliente

Route::get('Cliente/insert',function() {

    return view('Cliente/insert');
})->name('insertarcli');

Route::get('Cliente/view',function() {

    return view('Cliente/view');
})->name('viewcli');

Route::get('Cliente/view','ClienteController@ViewCli')->name('ViewCliente');

Route::get('Cliente/delete/{id}','ClienteController@DeleteCli')->name('DeleteCliente');

Route::get('Cliente/update/{id}','ClienteController@UpdateCli')->name('UpdateCliente');

Route::post('Cliente/insert','ClienteController@InsertCli')->name('InsertCliente');

Route::post('Cliente/update','ClienteController@UpdateBdCli')->name('UpdateBdCliente');

#endregion

#region
Route::get('TipoProducto/insert',function() {

    return view('TipoProducto/insert');
})->name('insertartipo');

Route::get('TipoProducto/view',function() {

    return view('TipoProducto/view');
})->name('viewtipo');

Route::post('TipoProducto/insert','TipoProductoController@InsertTipo')->name('InsertTipoProducto');
Route::get('TipoProducto/view','TipoProductoController@ViewTipo')->name('ViewTipoProducto');

Route::get('TipoProducto/update/{id}','TipoProductoController@UpdateTipo')->name('UpdateTipoProducto');
Route::post('TipoProducto/update','TipoProductoController@UpdateBdTipo')->name('UpdateBdTipoProducto');

Route::get('TipoProducto/delete/{id}','TipoProductoController@DeleteTipo')->name('DeleteTipoProducto');
#endregion







