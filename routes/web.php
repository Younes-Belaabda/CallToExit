<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('students', StudentController::class);
    Route::get('students/{student}/fathers' , [StudentController::class , 'fathers'])->name('students.fathers');
    Route::get('students/{student}/create/fathers' , [StudentController::class , 'create_fathers'])->name('students.create.fathers');
    Route::post('students/{student}/store/fathers' , [StudentController::class , 'store_fathers'])->name('students.store.fathers');

    Route::resource('admins', AdminController::class);

    Route::resource('staffs', StaffController::class);

    Route::resource('fathers', FatherController::class);
    Route::get('fathers/{father}/students' , [FatherController::class , 'students'])->name('fathers.students');
    Route::get('fathers/{father}/create/students' , [FatherController::class , 'create_students'])->name('fathers.create.students');
    Route::post('fathers/{father}/store/students' , [FatherController::class , 'store_students'])->name('fathers.store.students');
});
