<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentFather;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fathers = User::role('father')->get();
        return view('admin.fathers.index' , ['fathers' => $fathers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fathers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'eID' => 'required|unique:users,eID',
            'name' => 'required',
        ]);

        $validated['email'] = 'e-' . time() . '@mail.com';
        $validated['password'] = bcrypt(time());

        $user = User::create($validated);

        $user->assignRole('father');

        return redirect()->route('admin.fathers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $father)
    {
        return view('admin.fathers.show' , ['father' => $father]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $father)
    {
        return view('admin.fathers.edit' , ['father' => $father]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $father)
    {
        $validated = $request->validate([
            'eID' => 'required|unique:users,eID,' . $father->id,
            'name' => 'required'
        ]);

        $father->update($validated);

        return redirect()->route('admin.fathers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $father)
    {
        $father->delete();
        return redirect()->route('admin.fathers.index');
    }

    public function students(User $father){
        return view('admin.fathers.students' , ['father' => $father]);
    }

    public function create_students(User $father){
        return view('admin.father-student.create-students' , ['father' => $father]);
    }

    public function store_students(Request $request , User $father){
        $request->validate([
            'eIDs' => 'required'
        ]);

        $eIDs = $request->input('eIDs');
        $eIDs_status = [];

        // check if some eIDs not exists
        foreach($eIDs as $eID){
            if(User::role('student')->where('eID' , $eID)->count() && StudentFather::where([
                'student_id' => User::role('student')->where('eID' , $eID)->first()->id ,
                'father_id' => $father->id
            ])->count() == 0){
                StudentFather::create([
                    'student_id' => User::role('student')->where('eID' , $eID)->first()->id ,
                    'father_id' => $father->id
                ]);
            }
        }

        return redirect()->route('admin.fathers.students' , ['father' => $father]);
    }
}
