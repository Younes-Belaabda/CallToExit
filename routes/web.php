<?php

use App\Models\ExitRequest;
use Illuminate\Http\Request;
use App\Models\ExitRequestStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExitRequestController;

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

    Route::get('requests', [ExitRequestController::class , 'index'])->name('requests.all');
    Route::get('requests/approved', [ExitRequestController::class , 'approved'])->name('requests.approved');
    Route::get('requests/progress', [ExitRequestController::class , 'progress'])->name('requests.progress');
    Route::get('requests/rejected', [ExitRequestController::class , 'rejected'])->name('requests.rejected');
    Route::post('requests/{request}/approve', [ExitRequestController::class , 'approve'])->name('requests.approve');
    Route::post('requests/{request}/reject', [ExitRequestController::class , 'reject'])->name('requests.reject');
});

Route::get('request-exit' , function(){
    return view('guest.request-exit-1');
})->name('guest.request-exit');

Route::post('request-exit-choose' , function(Request $request){

    $validated = $request->validate([
        'reason' => 'required'
    ]);

    $exit_request = ExitRequest::create([
        'requested_by' => $request->requested_by,
        'reason' => $request->reason
    ]);

    foreach($request->eIDs as $id){
        ExitRequestStudent::create([
            'exit_request_id' => $exit_request->id,
            'user_id' => $id
        ]);
    }

    return response()->json('تم الإنشاء');
})->name('guest.request-exit-choose');
