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

    protected $level;
    public function __construct($level)
    {
        $this->level = $level;
    }

    public function model(array $row)
    {
        //dd($row);
        // Skip rows where the the required is empty
        if (empty(trim($row['department'] ?? ''))) {
            return null;
        }
        if (empty(trim($row['course_name'] ?? ''))) {
            return null;
        }
        if (empty(trim($row['award_in_view'] ?? ''))) {
            return null;
        }
        if (empty(trim($row['academic_session'] ?? ''))) {
            return null;
        }
        if (empty(trim($row['name_of_applicant'] ?? ''))) {
            return null;
        }

        return new Student([
            'department'=>$row['department'],
            'course_name'=>$row['course_name'],
            'award_in_view'=>$row['award_in_view'],
            'matric_no'=>$row['matric_no'],
            'academic_session'=>$row['academic_session'],
            'name_of_applicant'=>$row['name_of_applicant'],
            'state'=>$row['state'],
            'lga'=>$row['lga'],
            'gender'=>$row['gender'],
            'level'      => $this->level, // Same value for every imported row
        ]);
    }
}
