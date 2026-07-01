<?php

namespace App\Http\Controllers;

use App\Models\Coursedepartment;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class CoursedepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // All courses
        $courses = Course::orderBy('coursetitle')->get();

        // Distinct departments
        $departments = Student::select('department')
            ->distinct()
            ->orderBy('department')
            ->get();

        // Distinct course names
        $courseNames = Student::select('course_name')
            ->distinct()
            ->orderBy('course_name')
            ->get();

        // Distinct awards/classes
        $awards = Student::select('award_in_view')
            ->distinct()
            ->orderBy('award_in_view')
            ->get();

        // Distinct levels
        $levels = Student::select('level')
            ->distinct()
            ->orderBy('level')
            ->get();

        return view('admin.coursedepartment', compact(
            'courses',
            'departments',
            'courseNames',
            'awards',
            'levels'
        ));
                //return view('admin.coursedepartment');
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
        $request->validate([
            'course_id'       => 'required|exists:courses,id',
    
            'department'      => 'required|array',
            'department.*'    => 'required|string',
    
            'course_name'     => 'required|array',
            'course_name.*'   => 'required|string',
    
            'award_in_view'   => 'required|array',
            'award_in_view.*' => 'required|string',
    
            'level'           => 'required|array',
            'level.*'         => 'required|string',
        ]);
    
        try {
    
            DB::beginTransaction();
    
            foreach ($request->department as $key => $department) {
    
                Coursedepartment::create([
                    'course_id'     => $request->course_id,
                    'department'    => $department,
                    'course_name'   => $request->course_name[$key],
                    'award_in_view' => $request->award_in_view[$key],
                    'level'         => $request->level[$key],
                ]);
            }
    
            DB::commit();
    
            return back()->with('success', 'Course assignments saved successfully.');
    
            } catch (\Exception $e) {
        
                DB::rollBack();
        
                return back()
                    ->withInput()
                    ->with('error', $e->getMessage());
            }

        //return redirect()->back()->with('success', 'Course assignments saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coursedepartment $coursedepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coursedepartment $coursedepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coursedepartment $coursedepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coursedepartment $coursedepartment)
    {
        //
    }
}
