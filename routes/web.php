<?php

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/altaherramienta','ControladorHerramienta@altaherramienta');
Route::POST('/guardaherramienta','ControladorHerramienta@guardaherramienta')->name('guardaherramienta');
Route::get('/reporteherramientas','ControladorHerramienta@reporteherramientas');
Route::get('/modificaherramienta/{id_herramienta}','ControladorHerramienta@modificaherramienta')->name('modificaherramienta');
Route::POST('/guardamodificaherramienta','ControladorHerramienta@guardamodificaherramienta')->name('guardamodificaherramienta');
Route::get('/eliminaherramienta/{id_herramienta}','ControladorHerramienta@eliminaherramienta')->name('eliminaherramienta');
Route::get('/restauraherramienta/{id_herramienta}','ControladorHerramienta@restauraherramienta')->name('restauraherramienta');
Route::get('/efisicaherramienta/{id_herramienta}','ControladorHerramienta@efisicaherramienta')->name('efisicaherramienta');

Route::get('/altacliente','ControladorCliente@altacliente');
Route::POST('/guardacliente','ControladorCliente@guardacliente')->name('guardacliente');
Route::get('/reporteclientes','ControladorCliente@reporteclientes');
Route::get('/modificacliente/{id_cliente}','ControladorCliente@modificacliente')->name('modificacliente');
Route::POST('/guardamodificacliente','ControladorCliente@guardamodificacliente')->name('guardamodificacliente');
Route::get('/eliminacliente/{id_cliente}','ControladorCliente@eliminacliente')->name('eliminacliente');
Route::get('/restauracliente/{id_cliente}','ControladorCliente@restauracliente')->name('restauracliente');
Route::get('/efisicacliente/{id_cliente}','ControladorCliente@efisicacliente')->name('efisicacliente');

Route::get('/altatipoherramienta','ControladorTipoHerramienta@altatipoherramienta');
Route::POST('/guardatipoherramienta','ControladorTipoHerramienta@guardatipoherramienta')->name('guardatipoherramienta');
Route::get('/reportetipoherramienta','ControladorTipoHerramienta@reportetipoherramienta');
Route::get('/modificatipoherramienta/{id_tipo_herramienta}','ControladorTipoHerramienta@modificatipoherramienta')->name('modificatipoherramienta');
Route::POST('/guardamodificatipoherramienta','ControladorTipoHerramienta@guardamodificatipoherramienta')->name('guardamodificatipoherramienta');
Route::get('/eliminatipoherramienta/{id_tipo_herramienta}','ControladorTipoHerramienta@eliminatipoherramienta')->name('eliminatipoherramienta');
Route::get('/restauratipoherramienta/{id_tipo_herramienta}','ControladorTipoHerramienta@restauratipoherramienta')->name('restauratipoherramienta');
Route::get('/efisicatipoherramienta/{id_tipo_herramienta}','ControladorTipoHerramienta@efisicatipoherramienta')->name('efisicatipoherramienta');

//Codigo Alonso 02/07/2019

//Conductores

Route::get('/listaConductores','ControladorConductor@conductores')->name('listaConductores');
Route::get('/altaConductor','ControladorConductor@altaConductor')->name('altaConductor');
Route::post('/guardaConductor','ControladorConductor@guardaConductor')->name('guardaConductor');

//Modificación Conductores
Route::get('/modConductor/{id_conductor}','ControladorConductor@modConductor')->name('modConductor');
Route::post('/guardaCambiosC','ControladorConductor@guardaCambiosC')->name('guardaCambiosC');

//Eliminaciones Conductor

Route::get('/suspenderConductor/{id_conductor}','ControladorConductor@suspenderConductor')->name('suspenderConductor');
Route::get('/activarConductor/{id_conductor}','ControladorConductor@activarConductor')->name('activarConductor');
Route::get('/eliminaCondutor/{id_conductor}','ControladorConductor@eliminaCondutor')->name('eliminaCondutor');

//Marcas

Route::get('/listaMarcas','ControladorMarca@marcas')->name('listaMarcas');
Route::get('/altaMarca','ControladorMarca@altaMarca')->name('altaMarca');
Route::post('/guardaMarca','ControladorMarca@guardaMarca')->name('guardaMarca');

Route::get('/modMarca/{id_marca}','ControladorMarca@modMarca')->name('modMarca');
Route::post('/guardaCambiosM','ControladorMarca@guardaCambiosM')->name('guardaCambiosM');

//Eliminaciones Marca

Route::get('/suspenderMarca/{id_marca}','ControladorMarca@suspenderMarca')->name('suspenderMarca');
Route::get('/activarMarca/{id_marca}','ControladorMarca@activarMarca')->name('activarMarca');
Route::get('/eliminarMarca/{id_marca}','ControladorMarca@eliminarMarca')->name('eliminarMarca');