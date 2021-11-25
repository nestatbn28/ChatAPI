<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;



Route::get('/list',[UserController::class,'index']);
Route::post('/store',[UserController::class,'store']);
Route::post('/kirim',[ChatController::class,'kirim']);
Route::get('/daftarchat/{id}',[ChatController::class,'daftarchat']);
Route::get('/percakapan/{id}/{tujuan}',[ChatController::class,'daftarpercakapan']);

Route::post('/membalas/{number}',[TiketController::class,'buka']);
Route::post('/menutup/{number}',[TiketController::class,'tutup']);
Route::post('/hapus/{id}',[TiketController::class,'destroy']);
