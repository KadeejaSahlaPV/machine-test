<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EmployeeController::class,'list']);

Route::post('save',[EmployeeController::class,'save'])->name('save');
