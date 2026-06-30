<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class AddstdController extends Controller
{
    public function savestudents(Request $request) {
        $request->validate([
            'uploadstudent'=>'required',
            'level' => 'required',
        ]);

        //Excel::import(new StudentsImport, $request->file('uploadstudent'));
        Excel::import(
            new StudentsImport($request->level),
            $request->file('uploadstudent')
        );
        dd('done');
    }
}
