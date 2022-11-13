<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Routes all form AnimalControlles

#methode get
Route::get('/animals', [AnimalController::class, 'index']);

#methode post
Route::post('/animals', [AnimalController::class, 'store']);

#methode put
Route::put('/animals/{id}', [AnimalController::class, 'update']);

#methode delete
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);



// Routes all form StudentControlles

#Get all resorce student
#Methode get
Route::get('/student', [StudentController::class, 'index']);

#Menambahkan resorce student
#Methode post
Route::post('/student', [StudentController::class, 'store']);

#Update resource student
#Methode put
Route::put('/student/{id}', [StudentController::class, 'update']);

#Delete data student dengan id
#Methode delete
Route::delete('/student/{id}', [StudentController::class, 'destroy']);

#Show detail resource student
#Methode get (show)
Route::get('/student/{id}', [StudentController::class, 'show']);
