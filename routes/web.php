<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function(){
    $user = User::find(1);
    $role = new Role(['name'=>'Administrator']);

    $user->roles()->save($role);

});