<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get(uri: '/', action: function (){
    return view(view: 'welcome');
});

Route::get(uri: '/about', action: function () {
    $name = 'Diaa';

    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];


    //return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);
    return view(view: 'about', data: compact( 'name', 'departments' ));
});


Route::post(uri: '/about', action: function(){
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view(view: 'about', data: compact( 'name',  'departments'));
});

Route::get(uri: 'tasks',action:[TaskController::class, 'index'] );

Route::post(uri: 'create', action:[TaskController::class, 'create'] );

 Route::post(uri: 'delete/{id}', action: [TaskController::class, 'destroy'] );

 Route::post(uri:'edit/{id}', action: [TaskController::class, 'edit'] );

    Route::post(uri: 'update', action: [TaskController::class, 'update']);

    Route::get('app', function () {
        return view('layouts.app');

    });


Route::get('users', [UserController::class, 'index']);
Route::post('users/create', [UserController::class, 'create']);
Route::post('users/delete/{id}', [UserController::class, 'destroy']);
Route::post('users/edit/{id}', [UserController::class, 'edit']);
Route::post('users/update', [UserController::class, 'update']);
