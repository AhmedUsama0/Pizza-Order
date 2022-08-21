<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//the function which fires when the user requests the route /pizzas is called an action which handle the request of the user
//we can use one single controller for some specific routes like pizza routes which will contain the functions which will fires when a specific route is requested
//so in general a controller is a group of functions(actions) and each function is associated to  a specific route
//a controller is also a class
//the middleware auth is the bridge between the user and the route /pizzas so if the user logged in the user can view the route /pizzas
Route::get('/pizzas','App\Http\Controllers\PizzaController@index')->name('pizzas.index')->middleware('auth');


//we should put this route before the wild card but I dont know why and that is to make this route appear when it is requested
Route::get('/pizzas/create', 'App\Http\Controllers\PizzaController@create')->name('pizzas.create');

//if any post request comes to /pizzas route we fires the store action inside the pizzacontroller
Route::post('/pizzas','App\Http\Controllers\PizzaController@store')->name('pizzas.store');

//id after pizzas is called route parameters or wild cards
Route::get('/pizzas/{id}','App\Http\Controllers\PizzaController@show')->name('pizzas.show')->middleware('auth');

//if any delete request comes to /pizzas/{id} route it fires the destroy action to handle it
Route::delete('/pizzas/{id}','App\Http\Controllers\PizzaController@destroy')->name('pizzas.destroy')->middleware('auth');

//composer require laravel/ui
//php artisan ui vue --auth
//npm install
//npm run dev
//all of these steps to use auth system
//Auth::routes() generates some routes for us like login and register..etc
Auth::routes([
    // used to disable register
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
