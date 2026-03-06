<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('authenticate',[AuthenticationController::class,'authenticate']);

// Route::get('/user', function (Request $request) {
   // return $request->user();
// })->middleware('auth:sanctum');


Route::group(['middleware' => ['auth:sanctum']],function(){

Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('logout', [AuthenticationController::class, 'logout']);
    
});



Route::post('bookings', [BookingController::class, 'store']);

Route::get('bookings', [BookingController::class, 'index']);

Route::put('bookings/{id}/approve', [BookingController::class, 'approve']);

Route::put('bookings/{id}/deny', [BookingController::class, 'deny']);