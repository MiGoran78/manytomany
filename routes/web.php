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



Route::get('/read', function(){
    $user = User::findOrFail(1);

//    dd($user->roles);

    foreach ($user->roles as $role){
//        dd($role);
        echo $role->name;
    }
});


Route::get('/update', function (){
    $user = User::findOrFail(1);

    if($user->has('roles')){
        foreach ($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'subscriber';
                $role->save();
            }
        }
    }
});



Route::get('/delete', function (){
    $user = User::findOrFail(1);

//    $user->roles()->delete();

    foreach ($user->roles as $role){
//        dd($role);
        $role->whereId(5)->delete();
    }
});



Route::get('/attach', function (){
    $user = User::findOrFail(1);

    $user->roles()->attach(6);
});



Route::get('/detach', function (){
    $user = User::findOrFail(1);

    $user->roles()->detach(6);
});



Route::get('/sync', function (){
    $user = User::findOrFail(1);

    $user->roles()->sync([]);
});



