<?php

use App\Http\Controllers\categoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\perfilesController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\rolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', inicioController::class);

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    
    Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard');

    Route::controller(productoController::class)->group(function(){

        route::get('producto', 'principal')->name('producto.principal');
    
        route::get('producto/crear', 'crear')->name('producto.crear');
    
        route::post('producto','store')->name('producto.store');
    
        Route::get('producto/{variable}/mostrar', 'mostrar')->name('producto.mostrar');
    
        route::get('producto/{producto}/edit', 'editar')->name('producto.editar');
    
        route::put('producto/{producto}', 'update')->name('producto.update');
        
        route::delete('producto/{id}', 'borrar')->name('producto.borrar');
    
        route::get('desactivar/{id}', 'desactivarproducto')->name('desactivapro');
    
        route::get('activa/{id}', 'activaproducto')->name('activapro');
    });
    Route::controller(rolController::class)->group(function(){

        route::get('rol', 'principal')->name('roles.principal');

        route::get('rol/crear', 'crear')->name('roles.crear');

        route::post('rol','store')->name('roles.store');
    
        route::get('rol/{variable}/mostrar', 'mostrar')->name('roles.mostrar');

        route::get('rol/{rol}/edit', 'editar')->name('roles.editar');

        route::delete('rol/{id}', 'borrar')->name('roles.borrar');

        route::put('rol/{rol}', 'update')->name('roles.update');
        
        route::delete('rol/{id}', 'borrar')->name('roles.borrar');
    
        route::get('desactivarrol/{id}', 'desactivarrol')->name('desactivarol');
    
        route::get('activarol/{id}', 'activarol')->name('activarol');
    });
    Route::controller(categoriaController::class)->group(function(){

        route::get('categoria', 'principal')->name('categorias.principal');

        route::get('categoria/crear', 'crear')->name('categorias.crear');

        route::post('categoria','store')->name('categorias.store');
    
        route::get('categoria/{variable}/mostrar', 'mostrar')->name('categorias.mostrar');

        route::get('categoria/{categoria}/edit', 'editar')->name('categorias.editar');

        route::delete('categoria/{id}', 'borrar')->name('categorias.borrar');

        route::put('categoria/{categoria}', 'update')->name('categorias.update');
        
        route::delete('categoria/{id}', 'borrar')->name('categorias.borrar');
    
        route::get('desactivarcategoria/{id}', 'desactivarcategoria')->name('desactivacategoria');
    
        route::get('activacategoria/{id}', 'activacategoria')->name('activacategoria');
    });
    Route::controller(perfilesController::class)->group(function(){

        route::get('perfil', 'principal')->name('perfiles.principal');

        route::get('perfil/crear', 'crear')->name('perfiles.crear');

        route::post('perfil','store')->name('perfiles.store');
    
        route::get('perfil/{variable}/mostrar', 'mostrar')->name('perfiles.mostrar');

        route::get('perfil/{perfil}/edit', 'editar')->name('perfiles.editar');

        route::delete('perfil/{id}', 'borrar')->name('perfiles.borrar');

        route::put('perfil/{perfil}', 'update')->name('perfiles.update');
        
        route::delete('perfil/{id}', 'borrar')->name('perfiles.borrar');
    
        route::get('desactivarperfil/{id}', 'desactivarperfil')->name('desactivaperfil');
    
        route::get('activaperfil/{id}', 'activaperfil')->name('activaperfil');
    });
});
