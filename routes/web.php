<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['GET', 'POST'],'/', [StaffController::class, 'list'])->name('list');
Route::match(['GET', 'POST'], 'add', [StaffController::class, 'add'])->name('add');
Route::match(['GET', 'POST'], 'edit/{id}', [StaffController::class, 'edit'])->name('edit');
