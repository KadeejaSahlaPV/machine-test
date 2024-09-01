<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EmployeeController::class,'list']);

Route::post('save',[EmployeeController::class,'save'])->name('save');

Route::post('fetch_designation',[EmployeeController::class,'fetchDesignation'])->name('fetch.designation');
