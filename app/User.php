<?php

namespace BIM;

use Illuminate\Foundation\Auth\User as Authenticatable;
use BIM\Enrollment;
use BIM\User;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'phone', 'student_id', 'dateOfBirth', 'gender', 'country', 'languages', 'study_programme', 'semester', 'erasmus', 'fulltime', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getName($id)
    {
        $user = User::find($id);

        return $user->name;
    }

    public static function getSurname($id)
    {
        $user = User::find($id);

        return $user->surname;
    }

    public static function getFullName($id)
    {
        $user = User::find($id);

        return $user->name . ' ' . $user->surname;
    }

    public static function getEmail($id)
    {
        $user = User::find($id);

        return $user->email;
    }

    public function enrollment()
    {
        $this->hasMany('BIM\Enrollment', 'student_id', 'id');
    }


}
