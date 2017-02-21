<?php

namespace BIM\Http\Controllers\Auth;

use BIM\Courses;
use BIM\CoursesList;
use BIM\User;
use Faker\Provider\Image;
use Validator;
use BIM\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'studentID' => 'required|min:6',
            'birthday' => 'required|date',
            'gender' => 'required',
            'country' => 'required',
            'languages' => 'required',
            'studyProgram' => 'required',
            'semester' => 'required',
            'typeOfStudies' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $erasmus = 0;
        $fulltime = 0;

        ($data['typeOfStudies'] == 'erasmus') ? $erasmus = 1 : $fulltime = 1;

        $us = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'surname' => $data['surname'],
            'student_id' => $data['studentID'],
            'dateOfBirth' => $data['birthday'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'languages' => $data['languages'],
            'study_programme' => $data['studyProgram'],
            'semester' => $data['semester'],
            'fulltime' => $fulltime,
            'erasmus' => $erasmus,
            'status' => 1
        ]);

//
//        Mail::send('email.registration', ['user' => $us], function ($m) use ($us) {
//            $m->from('register@bimtrainingstudio.com', 'BIM Training Studio');
//
//            $m->to($us->email, $us->name)->subject('Registration to BIM Training Studio');
//        });

        return $us;

    }
}
