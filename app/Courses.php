<?php

namespace BIM;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'name', 'description', 'slug'
    ];

    public function material()
    {
        return $this->hasMany('BIM\Material', 'course_id', 'id');
    }

    public function schedule()
    {
        return $this->hasMany('BIM\Schedule', 'course_id', 'id');
    }

    public function homework()
    {
        return $this->hasMany('BIM\Homework', 'course_id', 'id');
    }

    public function news()
    {
        return $this->hasMany('BIM\CourseNews', 'course_id', 'id');
    }

    public function enrolled()
    {
        return $this->hasMany('BIM\Enrollment', 'course_id', 'id');
    }

    public static function slug($data)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $data);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function getCourseName($id)
    {
        return Courses::find($id)->name;
    }

    public static function getCourseDescription($id)
    {
        return Courses::find($id)->description;
    }

    public static function getCourseID($name)
    {
        $course = Courses::where('name', 'LIKE', '%'.$name.'%')->first();
        return $course->id;

    }

    public static function getSlug($id)
    {
        $course = Courses::find($id);

        return $course->slug;
    }
}
