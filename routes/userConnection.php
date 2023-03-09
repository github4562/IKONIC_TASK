<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// new routes should be written into a new routing in this file

Route::post('send_request', [UserController::class, 'sendRequest'])->name('send_request');
Route::post('change-status', [UserController::class, 'status'])->name('change-status');
Route::post('delete-connection', [UserController::class, 'deleteConnection'])->name('delete-connection');
Route::post('with_draw_request', [UserController::class, 'withdrawRequest'])->name('with_draw_request');
