<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentFather;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::role('student')->get();
        return view('admin.students.index' , ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'eID' => 'required|unique:users,eID',
            'name' => 'required',
            'grade_id' => 'required'
        ]);

        $validated['email'] = 'e-' . time() . '@mail.com';
        $validated['password'] = bcrypt(time());

        $user = User::create($validated);

        $user->assignRole('student');

        return redirect()->route('admin.students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        return view('admin.students.show' , ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        return view('admin.students.edit' , ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $student)
    {
        $validated = $request->validate([
            'eID' => 'required|unique:users,eID,' . $student->id,
            'name' => 'required',
            'grade_id' => 'required'
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index');
    }

    public function fathers(User $student){
        return view('admin.students.fathers' , ['student' => $student]);
    }

    public function create_fathers(User $student){
        return view('admin.father-student.create-fathers' , ['student' => $student]);
    }

    public function store_fathers(Request $request , User $student){
        $request->validate([
            'eIDs' => 'required'
        ]);

        $eIDs = $request->input('eIDs');
        $eIDs_status = [];

        // check if some eIDs not exists
        foreach($eIDs as $eID){
            if(User::role('father')->where('eID' , $eID)->count() && StudentFather::where([
                'father_id' => User::role('father')->where('eID' , $eID)->first()->id ,
                'student_id' => $student->id
            ])->count() == 0){
                StudentFather::create([
                    'father_id' => User::role('father')->where('eID' , $eID)->first()->id ,
                    'student_id' => $student->id
                ]);
            }
        }

        return redirect()->route('admin.students.fathers' , ['student' => $student]);
    }
}

