<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coursedepartment extends Model
{
    protected $fillable = [
        'course_id',
        'department',
        'course_name',
        'award_in_view',
        'level',
    ];

    /**
     * Get the course this assignment belongs to.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
