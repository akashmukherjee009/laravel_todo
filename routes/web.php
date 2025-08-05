<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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