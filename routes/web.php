<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Form'], function(){

    Route::get('listar-usuarios', 'TestController@listAllUsers')->name('users');

    // tem q ser adicioanada acima da rota q determina uma variavel, senao, novo não será reconhecido por ser uma string, e a variavel {user} é um inteiro
    Route::get('usuario/novo', 'TestController@formAddUser')->name('users.formAddUser');

    Route::get('usuario/editar/{user}', 'TestController@formEditUser')->name('users.formAddUser');

    // usuario/{user} -> armazena em uma variavel um dado q foi enviado pela url
    Route::get('usuario/{user}', 'TestController@listUser')->name('users.list');

    // create
    Route::post('usuario/store', 'TestController@storeUser')->name('users.store');

    // update
    Route::put('usuario/edit/{user}', 'TestController@edit')->name('users.edit');

    // delete
    Route::delete('usuario/destroy/{user}', 'TestController@destroy')->name('users.destroy');
    
});

