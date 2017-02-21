<?php

namespace BIM;

use BIM\Enrollment;
use Illuminate\Database\Eloquent\Model;


class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected $fillable = [
        'student_id', 'course_id', 'enrolled_from', 'status'
    ];

    public function course(){

        return $this->hasMany('App\Courses', 'foreign');

    }

    public function user(){

        return $this->hasMany('App\Courses', 'foreign');
    }

    public static function totalStudents($id)
    {
        return Enrollment::where('course_id', '=', $id)->count();
    }

    public static function inCourse($user, $course)
    {
        $check = Enrollment::where('student_id', '=', $user)->where('course_id', '=', $course)->count();

        return $check;
    }

    protected function isEnrolled($user)
    {
        $check = \BIM\Enrollment::where('student_id', '=', $user)->where('status', '=', 1)->count();

        if($check > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function students($id)
    {
        $enrollment = Enrollment::where('course_id', '=', $id)->where('status', '=', 1)->get();

        return $enrollment;
    }


}
