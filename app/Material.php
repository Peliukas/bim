<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    protected $fillable = ['material_id', 'title', 'description', 'attachment', 'course_id', 'created_at', 'folder'];

    public static function getMaterial($course)
    {
        return course_material::where('course_id', '=', $course)->get();
    }


    public static function getHomeworkPercentage($course_id)
    {
        $homeworks = course_material::add('course_id', '=', $course_id)->count();

      //  $done = HomeworkList::completedHomework($course, Auth::user()->id);

       // return ($done / $homeworks) * 100;
    }
}
