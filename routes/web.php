<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// route in laravel 9
Route::controller(EmployeeController::class)->group(function(){

    Route::get('/','index');

    Route::post('post','store');

    // routes/web.php

    Route::get('/form', [EmployeeController::class, 'showForm'])->name('showForm');
    Route::post('/form', [EmployeeController::class, 'submitForm'])->name('submitForm');


    Route::get('/show', 'show');

});