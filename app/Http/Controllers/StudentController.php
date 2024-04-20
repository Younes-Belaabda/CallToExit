<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
