<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('father/students' , function(Request $request){
    $father_identity = $request->input('father_identity');
    $father = User::role('father')->where('eID' , $father_identity)->first();
    if(is_null($father))
        return response()->json([
            'phase' => 'phase-2',
            'status' => 'رقم الهوية غير موجود لدينا'
        ]);
    $students_ids = $father->students->pluck('student_id')->toArray();
    $students = User::whereIn('id' , $students_ids)->get();
    if($students == [])
        return response()->json([
            'phase' => 'phase-2',
            'status' => 'إضغط على التالي و البحث برقم هوية الطالب'
        ]);
    return response()->json([
        'phase' => 'phase-3',
        'students' => $students
    ]);
})->name('api.father.students');
Route::post('student' , function(Request $request){
    $student_identity = $request->input('student_identity');
    $student = User::role('student')->where('eID' , $student_identity)->first();
    if(is_null($student))
        return response()->json([
            'phase' => 'phase-2',
            'status' => 'رقم هوية الطالب غير موجودة لدينا'
        ]);
    $students[] = $student;
    return response()->json([
        'phase' => 'phase-3',
        'students' => $students
    ]);
})->name('api.student');
