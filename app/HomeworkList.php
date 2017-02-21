<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;

class HomeworkList extends Model
{
    protected $table = 'homeworkList';

    protected $fillable = ['course_id', 'user_id', 'homework_id', 'attachment'];

    public static function checkHomework($homework, $user)
    {
        return HomeworkList::where('user_id', '=', $user)->where('homework_id', '=', $homework)->exists();
    }

    public static function getHomework($homework, $user)
    {
        return HomeworkList::where('user_id', '=', $user)->where('homework_id', '=', $homework)->first();
    }

    public static function completedHomework($course, $user)
    {
        return HomeworkList::where('user_id', '=', $user)->where('course_id', '=', $course)->count();
    }
    
}
