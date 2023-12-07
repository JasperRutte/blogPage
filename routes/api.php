<?php
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| API Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register API routes for your application. These
//| routes are loaded by the RouteServiceProvider and all of them will
//| be assigned to the "api" middleware group. Make something great!
//|
//*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\LinkController;
use \App\Http\Controllers\Controller;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'userLoggedIn'], function () {
    Route::post('/blog/create', [BlogController::class, 'create']);
    Route::put('/blog/{id}/update', [BlogController::class, 'update']);
    Route::delete('/blog/{id}/delete', [BlogController::class, 'delete']);

    Route::post('/link/create', [LinkController::class, 'create']);
    Route::delete('/link/{id}/delete', [LinkController::class, 'delete']);
    Route::put('/link/{id}/update', [LinkController::class, 'update']);
});

// authentication
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/test', [AuthController::class, 'test']);
Route::post('/authCheck',[AuthController::class, 'authenticatedCheck']);

//blogs
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blog/{id}',[BlogController::class, 'show']);


//links
Route::get('/links',[LinkController::class, 'index']);
Route::get('/link/{id}',[LinkController::class, 'show']);

//user
Route::get('/getUser/{id}', [Controller::class, 'getUserById']);

