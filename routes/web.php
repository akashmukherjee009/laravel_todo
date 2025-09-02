<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;

Route::get('/', [BlogController::class, 'index']);


Route::get('/trash', [BlogController::class, 'about']);

Route::post('/set-data',[BlogController::class, 'submitBlog'] );

Route::get('/get-data', [BlogController::class, 'getData']);
Route::post('/update-data/{id}', [BlogController::class, 'update']);

// Route::get('/delete/{id}', function(int $id){
//     echo $id;
// });
Route::get('/delete/{id}', [BlogController::class, 'delete']);
Route::get('/edit/{id}', [BlogController::class, 'getDataById']);


Route::get('/permanent/delete/{id}', [BlogController::class, 'pdelete']);
Route::get('/restore/{id}', [BlogController::class, 'restore']);

//Auth Code
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');