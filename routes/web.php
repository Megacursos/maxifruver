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

Route::group(['middleware' => ['guest']], function () {

    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');

});


Route::group(['middleware' => ['auth']], function () {

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('admin', 'HomeController@index');


    Route::group(['middleware' => ['Comprador']], function () {

        Route::resource('productos/categoria', 'CategoriaController');
        Route::resource('productos/productos', 'ProductoController');
        Route::resource('compras/proveedor', 'ProveedorController');
        Route::resource('compras/compras', 'CompraController');
        Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('compra_pdf');

    });

    Route::group(['middleware' => ['Vendedor']], function () {

         Route::resource('productos/categoria', 'CategoriaController');
         Route::resource('productos/productos', 'ProductoController');
         Route::resource('ventas/cliente', 'ClienteController');
         Route::resource('ventas/venta', 'VentaController');
         Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');


    });

    Route::group(['middleware' => ['Administrador']], function () {

      Route::resource('productos/categoria', 'CategoriaController');
      Route::resource('productos/productos', 'ProductoController');
      Route::resource('compras/proveedor', 'ProveedorController');
      Route::resource('compras/compras', 'CompraController');
      Route::resource('ventas/venta', 'VentaController');
      Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');
      Route::resource('ventas/cliente', 'ClienteController');
      Route::resource('seguridad/roles', 'RolController');
      Route::resource('seguridad/usuario', 'UserController');



    });


});