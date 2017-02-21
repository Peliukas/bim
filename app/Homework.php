<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Homework extends Model
{
    protected $table = 'homework';

    protected $fillable = ['name', 'description', 'attachment', 'course_id', 'deadline', 'folder'];

    public static function getHomework($course)
    {
        return Homework::where('course_id', '=', $course)->get();
    }

    public static function getHomeworkPercentage($course)
    {
//        $homeworks = Homework::where('course_id', '=', $course)->count();
//
//        $done = HomeworkList::completedHomework($course, Auth::user()->id);
//
//        return ($done / $homeworks) * 100;

        return true;
    }
}
