<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Route::resource('components', EmployeeController::class);
// Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/employee', [EmployeeController::class, 'index'])->name('index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('create');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('store');

Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::put('/employee/{employee}/edit', [EmployeeController::class, 'update'])->name('update');

Route::delete('/employee/{employee}/delete', [EmployeeController::class, 'destroy'])->name('delete');

Route::get('/contact', [EmployeeController::class, 'contacts'])->name('contact');