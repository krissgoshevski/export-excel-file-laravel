<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/read-excel', [ExcelController::class, 'read_excel'])->name('read.excel');
Route::get('/send-email', [ExcelController::class, 'send_email'])->name('send.email');




