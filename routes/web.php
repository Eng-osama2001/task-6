<?php

use App\Models\Task;
use Illuminate\Http\Request;
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

Route::get('todo', function () {
                        //للترتيب ابجديا
    //$tasks = DB::table('tasks')->orderBy('title',"asc")->get();
    $tasks = Task::all();
    //dd($tasks);
    return view('todo' , compact('tasks'));
});

Route::post('store', function (Request $request) {

    // $tasks =DB::table('tasks')->get();
    // DB::table('tasks')->insert([
    //     'title' => $request->title
    // ]);

    $task = new Task();

    $task->title=$request->title;

    $task->save();

    return redirect()->back();
});

Route::post('del/{title}', function($tasks) {

    Task::where('title', $tasks)-> delete();

    return redirect()->back();


});
