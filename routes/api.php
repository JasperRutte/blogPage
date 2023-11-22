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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/test', [AuthController::class, 'test']);
Route::post('/authCheck',[AuthController::class, 'authenticatedCheck']);

//blogs
Route::post('/create/blog', [BlogController::class, 'create']);
Route::put('/update/blog/{id}', [BlogController::class, 'update']);
Route::delete('/delete/{id}', [BlogController::class, 'delete']);
Route::get('/index/blogs', [BlogController::class, 'index']);
Route::get('/show/{id}',[BlogController::class, 'show']);


//links
Route::post('/create/link', [LinkController::class, 'create']);
Route::get('/index/link',[LinkController::class, 'index']);
