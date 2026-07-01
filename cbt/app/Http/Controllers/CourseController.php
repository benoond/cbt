<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
    
        $courses = Course::when($search, function ($query) use ($search) {
            $query->where('coursecode', 'like', "%{$search}%")
                  ->orWhere('coursetitle', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);
    
        return view('admin.allcourses', ['courses' => $courses]);
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
        $validated = $request->validate([
            'coursecode' => 'required|string|max:20|unique:courses,coursecode',
            'coursetitle' => 'required|string|max:255',
        ]);
    
        Course::create($validated);
    
        return redirect()->back()->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
