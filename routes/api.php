<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function(){
    return response()->json([
        'message' => 'Hello World'
    ]);
});

Route::get('/students', [StudentController::class, 'list']);
Route::get('/list', [StudentController::class, 'list']);
