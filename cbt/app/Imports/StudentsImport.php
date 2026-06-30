<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new Student([
            'department'=>$row['department'],
            'course_name'=>$row['course_name'],
            'award_in_view'=>$row['award_in_view'],
            'matric_no'=>$row['matric_no'],
            'level'=>$row['level'],
            'academic_session'=>$row['academic_session'],
            'name_of_applicant'=>$row['name_of_applicant'],
            'state'=>$row['state'],
            'lga'=>$row['lga'],
            'gender'=>$row['gender'],
        ]);
    }
}
