<?php

namespace App\Http\Controllers;

use App\Models\Cbtquestion;
use Illuminate\Http\Request;

class CbtquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Coursedepartment::with('course')
                    ->orderBy('department')
                    ->orderBy('level')
                    ->get();

        return view('admin.addcbt', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cbtquestion $cbtquestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cbtquestion $cbtquestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cbtquestion $cbtquestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cbtquestion $cbtquestion)
    {
        //
    }
}
