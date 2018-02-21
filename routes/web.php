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
Auth::routes();

Route::group(['middleware' => 'auth'], function(){

	Route::get('/', function () {
	    return view('auth/login');
	});

	Route::get('super/admin/dashboard', function(){
		return view('superadmin/dashboard');
	})->name('super/admin/dashboard');

	Route::get('root/admin/dashboard', function(){
		return view('root/dashboard');
	})->name('root/admin/dashboard');

	Route::get('admin/dashboard', function(){
		return view('admin/dashboard');
	})->name('admin/dashboard');

	Route::get('llantero/dashboard', function(){
		return view('llantero/dashboard');
	})->name('llantero/dashboard');

	Route::get('bodega/dashboard', function(){
		return view('bodega/dashboard');
	})->name('bodega/dashboard');

	Route::get('bodega/dashboard/marcas', 'MarcaController@index')->name('all_marcas');
	Route::get('bodega/dashboard/add/marca', 'MarcaController@create')->name('add_marca');
	Route::post('bodega/dashboard/add/marca', 'MarcaController@store')->name('add_marca');
	Route::get('bodega/dashboard/edit/marca/{id}', 'MarcaController@edit')->name('edit_marca');
	Route::patch('bodega/dashboard/update/marca/{id}', 'MarcaController@update')->name('update_marca');

	Route::get('bodega/dashboard/medidas', 'MedidaController@index')->name('all-medidas');
	Route::get('bodega/dashboard/add/medida', 'MedidaController@create')->name('add-medida');
	Route::post('bodega/dashboard/add/medida', 'MedidaController@store')->name('add-medida');//find
	Route::get('bodega/dashboard/edit/medida/{id}', 'MedidaController@edit')->name('edit-medida');
	Route::patch('bodega/dashboard/update/{id}', 'MedidaController@update')->name('update-medida');
	Route::get('bodega/dashboard/delete/{id}', 'MedidaController@delete')->name('delete-medida');

	Route::get('bodega/dashboard/construcciones', 'ConstruccionController@index')->name('all-construcciones');
	Route::get('bodega/dashboard/add/construccion', 'ConstruccionController@create')->name('add-construccion');
	Route::post('bodega/dashboard/add/construccion', 'ConstruccionController@store')->name('add-construccion');
	Route::get('bodega/dashboard/edit/construccion/{id}', 'ConstruccionController@edit')->name('edit-construccion');
	Route::patch('bodega/dashboard/update/construccion/{id}', 'ConstruccionController@update')->name('update-construccion');
	Route::get('bodega/dashboard/delete/construccion/{id}', 'ConstruccionController@delete')->name('delete-construccion');

	Route::get('bodega/dashboard/tipos', 'TipoController@index')->name('all-tipos');
	Route::get('bodega/dashboard/add/tipo', 'TipoController@create')->name('add-tipo');
	Route::post('bodega/dashboard/add/tipo', 'TipoController@store')->name('add-tipo');
	Route::get('bodega/dashboard/edit/tipo/{id}', 'TipoController@edit')->name('edit-tipo');
	Route::patch('bodega/dashboard/update/tipo/{id}', 'TipoController@update')->name('update-tipo');
	Route::get('bodega/dashboard/delete/tipo/{id}', 'TipoController@delete')->name('delete-tipo');

	Route::get('bodega/dashboard/fabricantes', 'FabricanteController@index')->name('all-fabricantes');
	Route::get('bodega/dashboard/add/fabricante', 'FabricanteController@create')->name('add-fabricante');//find
	Route::post('bodega/dashboard/add/fabricante', 'FabricanteController@store')->name('add-fabricante');
	Route::get('bodega/dashboard/edit/fabricante/{id}', 'FabricanteController@edit')->name('edit-fabricante');
	Route::patch('bodega/dashboard/update/fabricante/{id}', 'FabricanteController@update')->name('update-fabricante');
	Route::get('bodega/dashboard/delete/fabricante/{id}', 'FabricanteController@delete')->name('delete-fabricante');

	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');
	Route::get('bodega/dashboard/delete/aplicacion/{id}', 'AplicacionController@delete')->name('delete-aplicacion');

	Route::get('bodega/dashboard/diseños', 'DesignController@index')->name('all-designs');
	Route::get('bodega/dashboard/add/design', 'DesignController@create')->name('add-design');
	Route::post('bodega/dashboard/add/design', 'DesignController@store')->name('add-design');
	Route::get('bodega/dashboard/edit/design/{id}', 'DesignController@edit')->name('edit-design');
	Route::patch('bodega/dashboard/update/design/{id}', 'DesignController@update')->name('update-design');
	Route::get('bodega/dashboard/delete/design/{id}', 'DesignController@delete')->name('delete-design');

	Route::get('bodega/dashboard/almacen', 'AlmacenController@index')->name('all-llantas');
	Route::get('bodega/dashboard/comprar/llanta', 'AlmacenController@mostrarComprarLlanta')->name('comprar-llanta');
	Route::get('bodega/dashboard/registrar/llanta', 'AlmacenController@mostrarRegistrarLlanta')->name('registrar-llanta');
	Route::post('bodega/dashboard/registrar/llanta', 'AlmacenController@store')->name('guardar-registrar-llanta');
	Route::get('bodega/dashboard/edit/llanta/{id}', 'AlmacenController@mostrarEditLlanta')->name('edit-llanta');
	Route::patch('bodega/dashboard/edit/llanta/', 'AlmacenController@update')->name('update-llanta');
	Route::patch('bodega/dashboard/update/llanta/{id}', 'AlmacenController@editarLlanta')->name('guardar-editar-llanta');

	Route::post('/design/getFabricantes', 'DesignController@getFabricanteAndAplicacion');

	// Routes for new models
	Route::get('llantero/dashboard/distribuciones', 'DistributionController@index')->name('all-distribuciones');
	Route::get('llantero/dashboard/add/distribucion', 'DistributionController@create')->name('add-distribucion');
	Route::post('llantero/dashboard/add/distribucion', 'DistributionController@store')->name('add-distribucion');
	Route::get('llantero/dashboard/edit/distribucion/{id}', 'DistributionController@edit')->name('edit-distribucion');
	Route::patch('llantero/dashboard/update/distribucion/{id}', 'DistributionController@update')->name('update-distribucion');

	Route::get('llantero/dashboard/posicionesDistribucion', 'DistributionPositionsController@index')->name('all-distribucion-posicions');
	Route::get('llantero/dashboard/add/posicionesDistribucion', 'DistributionPositionsController@create')->name('add-distribucion-posicion');
	Route::post('llantero/dashboard/add/posicionesDistribucion', 'DistributionPositionsController@store')->name('add-distribucion-posicion');
	Route::get('llantero/dashboard/edit/posicionesDistribucion/{id}', 'DistributionPositionsController@edit')->name('edit-distribucion-posicion');
	Route::patch('llantero/dashboard/update/posicionesDistribucion/{id}', 'DistributionPositionsController@update')->name('update-distribucion-posicion');

	Route::get('llantero/dashboard/eje', 'EjeController@index')->name('all-ejes');
	Route::get('llantero/dashboard/add/eje', 'EjeController@create')->name('add-eje');
	Route::post('llantero/dashboard/add/eje', 'EjeController@store')->name('add-eje');
	Route::get('llantero/dashboard/edit/eje/{id}', 'EjeController@edit')->name('edit-eje');
	Route::patch('llantero/dashboard/update/eje/{id}', 'EjeController@update')->name('update-eje');

	Route::get('llantero/dashboard/eje-distribucino/{id}', 'EjeDistributionController@index')->name('ejes-por-distribucion');
	//Route::get('llantero/dashboard/add/eje-distribucino/{id}', 'EjeDistributionController@create')->name('add-aplicacion');
	//Route::post('llantero/dashboard/add/eje-distribucino/{id}', 'EjeDistributionController@store')->name('add-aplicacion');
	//Route::get('llantero/dashboard/edit/eje-distribucino/{id}', 'EjeDistributionController@edit')->name('edit-aplicacion');
	//Route::patch('llantero/dashboard/update/eje-distribucino/{id}', 'EjeDistributionController@update')->name('update-aplicacion');

/*
	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');

	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');

	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');

	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');


	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');

	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');

	Route::get('bodega/dashboard/aplicaciones', 'AplicacionController@index')->name('all-aplicaciones');
	Route::get('bodega/dashboard/add/aplicacion', 'AplicacionController@create')->name('add-aplicacion');
	Route::post('bodega/dashboard/add/aplicacion', 'AplicacionController@store')->name('add-aplicacion');
	Route::get('bodega/dashboard/edit/aplicacion/{id}', 'AplicacionController@edit')->name('edit-aplicacion');
	Route::patch('bodega/dashboard/update/aplicacion/{id}', 'AplicacionController@update')->name('update-aplicacion');

	*/
});
