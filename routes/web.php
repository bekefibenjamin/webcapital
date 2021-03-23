<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
    Artisan::call('storage:link');
    return view('welcome');
})->name('welcome')->middleware('guest');

Route::get('home', function(){
    return redirect('students');
})->name('home');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('login', function () {
    return view('welcome');
})->name('login')->middleware('guest');

Route::resources(['students' => StudentsController::class]);

Route::get('studentJson/{id}',[StudentsController::class, 'studentJson']);
