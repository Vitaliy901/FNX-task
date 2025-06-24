<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user/{id}', [UserController::class, 'show']);
});


