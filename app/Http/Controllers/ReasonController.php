<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reasons =  Reason::paginate(10);
        return view('admin.reasons.index' , ['reasons' => $reasons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Reason::create($validated);

        return redirect()->route('admin.reasons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reason $reason)
    {
        return view('admin.reasons.show' , ['reason' => $reason]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reason $reason)
    {
        return view('admin.reasons.edit' , ['reason' => $reason]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reason $reason)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $reason->update($validated);

        return redirect()->route('admin.reasons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reason $reason)
    {
        $reason->delete();
        return redirect()->route('admin.reasons.index');
    }
}
