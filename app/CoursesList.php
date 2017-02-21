<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;

class CoursesList extends Model
{
    protected $table = 'coursesList';

    protected $fillable = ['course_id', 'user_id'];

    public static function totalStudents($id)
    {
        return CoursesList::where('course_id', '=', $id)->count();
    }
}
