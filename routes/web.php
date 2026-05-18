<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get(uri: 'tasks',action:function(){
    return view (view:'tasks');
});

Route::post(uri: 'create', action: function(){
    $task_name = $_POST['name'];
     DB::table(table: 'tasks')->insert(['name' => $task_name]);
    return view(view: 'tasks');

 });
