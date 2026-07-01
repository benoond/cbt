<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Student;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Student::select('department')
            ->distinct()
            ->orderBy('department')
            ->pluck('department');
    
        $courses = Student::select('course_name')
            ->distinct()
            ->orderBy('course_name')
            ->pluck('course_name');
    
        $awards = Student::select('award_in_view')
            ->distinct()
            ->orderBy('award_in_view')
            ->pluck('award_in_view');
    
        $levels = Student::select('level')
            ->distinct()
            ->orderBy('level')
            ->pluck('level');
    
        return view('admin.addexam', compact(
            'departments',
            'courses',
            'awards',
            'levels'
        ));

        
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
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
