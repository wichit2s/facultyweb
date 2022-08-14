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
    $data = [
        [ 'count'=> 4,    'label'=> "Departments"],
        [ 'count'=> 19,   'label'=> "Programs"],
        [ 'count'=> 221,  'label'=> "Research"],
        [ 'count'=> 378,  'label'=> "Publication"],
        [ 'count'=> 20,   'label'=> "Patents"],
        [ 'count'=> 1420, 'label'=> "Students"]
    ];
    return view('welcome', [ 'data' => $data ]);
});

Route::get('/dashboard', function () {
    $data = [
        [ 'count'=> 4,    'label'=> "Departments"],
        [ 'count'=> 19,   'label'=> "Programs"],
        [ 'count'=> 221,  'label'=> "Research"],
        [ 'count'=> 378,  'label'=> "Publication"],
        [ 'count'=> 20,   'label'=> "Patents"],
        [ 'count'=> 1420, 'label'=> "Students"]
    ];
    return view('dashboard', [ 'data' => $data ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
