<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EmployeeController::class,'list']);

Route::post('save',[EmployeeController::class,'save'])->name('save');

Route::get('edit',[EmployeeController::class,'edit'])->name('edit');

Route::post('update',[EmployeeController::class,'update'])->name('update');

Route::post('delete',[EmployeeController::class,'delete'])->name('delete');

Route::post('fetch_designation',[EmployeeController::class,'fetchDesignation'])->name('fetch_designation');
