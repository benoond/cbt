<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;

class AddstdController extends Controller
{
    public function savestudents(Request $request) {
        $request->validate([
            'uploadstudent'=>'required|file|mimes:xlsx,xls,csv',
            'level' => 'required',
        ]);

        try {
            //Excel::import(new StudentsImport, $request->file('uploadstudent'));
            Excel::import(
                new StudentsImport($request->level),
                $request->file('uploadstudent')
            );
            //dd('done');
            return back()->with('success', 'Students imported successfully.');
        } catch (Exception $e) {
            Log::error('Excel Import Error: ' . $e->getMessage());
            return back()->with('error', 'Import failed. Please check your file and try again.');
        }
    }



    //all students
    public function index()
    {
        $students = Student::orderBy('department', 'asc')
        ->orderBy('name_of_applicant', 'asc')
        ->paginate(10);

        return view('admin.allstudents', compact('students'));
    } 




    public function search(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search, function ($query) use ($search) {
            $query->where('name_of_applicant', 'like', "%$search%")
                ->orWhere('level', 'like', "%$search%")
                ->orWhere('department', 'like', "%$search%")
                ->orWhere('course_name', 'like', "%$search%")
                ->orWhere('award_in_view', 'like', "%$search%")
                ->orWhere('matric_no', 'like', "%$search%")
                ->orWhere('academic_session', 'like', "%$search%");
        })
        ->latest()
        ->paginate(10);

        return view('admin.studentscategory', compact('students'));
    }




    public function addone()
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
    
        return view('admin.addonestudents', compact(
            'departments',
            'courses',
            'awards',
            'levels'
        ));
    }



}
