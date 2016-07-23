<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hola', function() {
    //return "Hola mundo!!";
    $form = "<form action='hola' method='post'>".
        "<input type='hidden' name='_token' value='".csrf_token()."'>".
        "<input type='hidden' name='_method' value='put'>".
        "<input type='submit'>".
        "</form>";
    return $form;
});

Route::post('hola', function() {
    return "POST!!!";
});

Route::put('hola', function() {
    return "PUT!!!";
});

// Ruta administrada por controlador
Route::get('prueba', 'PruebaController@prueba');


//Route::get('post', 'PostController@index');
Route::resource('post', 'PostController');
Route::auth();

Route::get('/home', 'HomeController@index');
