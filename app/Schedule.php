<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = ['name', 'place', 'course_id', 'when', 'whenTime', 'groupNo'];

    public $timestamps = false;

    public static function getSchedule($id)
    {
        return Schedule::where('course_id', '=', $id)->orderBy('when', 'ASC')->get();
    }
}
