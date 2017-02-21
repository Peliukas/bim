<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';

    public function courses()
    {
        $this->hasMany('BIM\Courses', 'id', 'course_id');
    }
}
