<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/tasks',function(){
    $now = Carbon::now();
    $keyword = request()->get("keyword");
    $tasks = \DB::table("tasks")->where("name","like","%$keyword%")->get();
    return view('task.list',[
        "tasks" => $tasks
    ]);
});

Route::get('/tasks/new',function(){
    return view('task.new');
});

Route::post('/tasks/new',function(){
    $payload = [
        "name" => request()->get("name"),
        "date_on" => request()->get("date_on"),
        "body" => request()->get("body"),
    ];
    $rules = [
        "name" => ["required"],
        "date_on" => ["required"],
        "body" => ["required"],
    ];

    $val = validator($payload,$rules);
    if($val->fails()){
        session()->flash("old_form",$payload);
        session()->flash("errors",$val->errors()->toArray());
        return redirect("/tasks/new");
    }
    \DB::table("tasks")->insert($payload);
    return redirect("/tasks");
});