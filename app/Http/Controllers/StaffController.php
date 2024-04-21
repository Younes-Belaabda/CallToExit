<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = User::role('staff')->get();
        return view('admin.staffs.index' , ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        $user->assignRole('staff');

        return redirect()->route('admin.staffs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $staff)
    {
        return view('admin.staffs.show' , ['staff' => $staff]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staff)
    {
        return view('admin.staffs.edit' , ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($admin->password != $validated['password'])
            $validated['password'] = bcrypt($validated['password']);

        $admin->update($validated);

        return redirect()->route('admin.staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.staffs.index');
    }
}
