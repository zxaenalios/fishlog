<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoinController;

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

//Route Auth dengan JWT
Route::group([
    'middleware' => 'cors',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
});

//Route User
Route::group([
    'middleware' => 'api',
    'prefix' => 'user'

], function ($router) {
    Route::get('/katalog', [KatalogController::class, 'index']);    
    Route::get('/katalog/{id}', [KatalogController::class, 'show']);    
    Route::get('/kategori/{id}', [KategoriController::class, 'show']);    
    Route::put('/profil/{id}', [UserController::class, 'update']);    
    Route::get('/poin/{id}', [PoinController::class, 'show']);    
});

//Route Admin
Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'

], function ($router) {
    Route::get('/users', [UserController::class, 'index']);  
    Route::put('/poin/{id}', [PoinController::class, 'update']); 
    Route::get('/katalog', [KatalogController::class, 'index']); 
    Route::post('/katalog', [KatalogController::class, 'create']); 
    Route::put('/katalog/{id}', [KatalogController::class, 'update']); 
    Route::delete('/katalog/{id}', [KatalogController::class, 'destroy']); 
    Route::get('/kategori', [KategoriController::class, 'index']); 
    Route::post('/kategori', [KategoriController::class, 'create']); 
    Route::put('/kategori/{id}', [KategoriController::class, 'update']); 
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
    Route::get('/katalog/total', [KatalogController::class, 'getTotalKatalog']);  
    Route::get('/kategori/total', [KategoriController::class, 'getTotalKategori']);  
    Route::get('/poin/total', [PoinController::class, 'getTotalPoin']);  
    Route::get('/poin/max/id-user', [PoinController::class, 'getIdUserMaxPoin']);  
    Route::get('/poin/min/id-user', [PoinController::class, 'getIdUserMinPoin']);  
});
