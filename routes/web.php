<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/diaries',[DiaryController::class,'index']);
Route::post('/diaries',[DiaryController::class,'store']);
Route::get('/diaries/{id}/edit',[DiaryController::class,'edit']);
Route::post('/diaries/{id}/update',[DiaryController::class,'update']);
Route::post('/diaries/{id}/delete',[DiaryController::class,'destroy']);