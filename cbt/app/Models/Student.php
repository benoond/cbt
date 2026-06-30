<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'department',
        'course_name',
        'award_in_view',
        'matric_no',
        'level',
        'academic_session',
        'name_of_applicant',
        'state',
        'lga',
        'gender',
    ];
}
