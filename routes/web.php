<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks', function () {

    $tasks = DB::table('tasks')->get();
    //dd($tasks);

    return view('tasks', compact('tasks'));
});

Route::get('tasks/show/{id}', function ($id) {

    $task = DB::table('tasks')->find($id);
    //dd($task)

    return view('show', compact('task'));
});

Route::get('app', function () {

    $tasks =DB::table('tasks')->get();

   return view('todo' , compact('tasks'));
});
