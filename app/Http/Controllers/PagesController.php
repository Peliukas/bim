<?php

namespace BIM\Http\Controllers;

use BIM\Courses;
use BIM\CoursesList;
use BIM\Homework;
use BIM\HomeworkList;
use BIM\Schedule;
use BIM\Enrollment;
use BIM\News;
use BIM\User;
use BIM\Material;
use BIM\HomeworkFolders;
use BIM\MaterialFolders;
use Illuminate\Http\Request;
use BIM\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Calendar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PagesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function index()
    {
        if(Auth::user()->status == 0)
        {
            return view('waiting');
        }
        else
        {
            $data['announcements'] = News::all();

            $user = Auth::user()->id;

            $enrollment = Enrollment::where('student_id', '=', $user)->get();

            $user = Auth::user()->id;

            $enrollment = \BIM\Enrollment::where('student_id', '=', $user)->get();

            $revit =  false;
            $inventor = false;

            $missingRevit = false;
            $missingInventor = false;

            foreach($enrollment as $e)
            {
                if($e->course_id == 2)
                {
                    $revit = true;
                }
                if($e->course_id == 3)
                {
                    $inventor = true;
                }
            }

            foreach ($enrollment as $e) {
                $path = public_path('profile/' . $user .'/' . Courses::getSlug($e->course_id) . '-info.json');

                if(!file_exists($path))
                {
                    ($e->course_id == 4) ? $data['missingAutoCAD'] = true : false;
                    ($e->course_id == 5) ? $data['missingFusion360'] = true : false;
                    ($e->course_id == 6) ? $data['missingBIMFocus'] = true : false;
                    ($e->course_id == 7) ? $data['missingRobot'] = true : false;
                }
            }

            if($revit)
            {
                $path = public_path('profile/' . $user .'/revit-course-info.json');

                if(file_exists($path))
                {
                    $file = file_get_contents($path, true);

                    $array = json_decode($file, true);

                    if(!isset($array['which-days']))
                    {
                        $missingRevit = true;
                    }
                }
                else
                {
                    $data['missingRevitApplication'] = true;
                }
            }

            if($inventor)
            {
                $path = public_path('profile/' . $user .'/inventor-course-info.json');

                if(file_exists($path))
                {
                    $file = file_get_contents($path, true);

                    $array = json_decode($file, true);

                    if(!isset($array['course-level']))
                    {
                        $missingInventor = true;
                    }
                }
                else
                {
                    $data['missingInventorApplication'] = true;
                }
            }

            ($missingInventor) ? $data['missingInventor'] = true : $data['missingInventor'] = false;
            ($missingRevit) ? $data['missingRevit'] = true : $data['missingRevit'] = false;


            return view('home', $data);
        }
    }

    public function waiting()
    {
        if(Auth::user()->status == 0)
        {
            return view('waiting');
        }
        else
        {
            return redirect('/');
        }
    }

    public function myCourses()
    {

        $data['courses'] = Enrollment::where('student_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $data['courses_to_apply'] = Courses::all();

        return view('user.courses', $data);

    }

    public function schedule()
    {
        $events = array();
        $test = array();

        $enrollments = Enrollment::where('student_id', '=', Auth::user()->id)->where('status', '=', 1)->get();

        $data['enrollments'] = $enrollments;

        $groupNo = '';


        if(count($enrollments) > 1)
        {
            foreach($enrollments as $en)
            {
                $list[] = $en->course_id;

                if($en->groupNo == 1)
                {
                    $groupNo = 1;
                }
                if($en->groupNo == 2)
                {
                    $groupNo = 2;
                }
            }

            $scheduleDates = Schedule::whereIn('course_id', $list)->where('groupNo', '=', $groupNo)->get();
        }
        else
        {
            foreach($enrollments as $en)
            {
                $list[] = $en->course_id;
            }

            $scheduleDates = Schedule::whereIn('course_id', $list)->where('groupNo', '=', $enrollments[0]->groupNo)->get();
            
        }


        $data['schedule'] = $scheduleDates;

        if(count($scheduleDates) > 0)
        {
            foreach($scheduleDates as $date)
            {
                $events[] = str_replace('-', '/', $date->when);
                $test[] = substr($date->whenTime,0,5) . ' - ' . $date->place;
            }
        }

        if(count($events) > 0)
        {
            $data['calendar'] = Calendar::generate('', '', $events, $test);
        }

        return view('user.schedule', $data);
    }

    public function material()
    {
        return view('user.material');
    }

    public function extra()
    {
        return view('user.extra');
    }

    public function settings()
    {
        $data['user'] = Auth::user();

        return view('user.settings', $data);
    }

    public function course($id)
    {
        $data['course'] = Courses::find($id);
        $data['schedule'] = $data['course']->schedule()->get();
        $data['homework'] = $data['course']->homework()->where('folder', '=', NULL)->get();
        $data['materials'] = $data['course']->material()->where('folder', '=', NULL)->get();
        $data['allNews'] = $data['course']->news()->get();
        if($id == 2)
        {
            $enr = Enrollment::where('student_id', '=', Auth::user()->id)->where('course_id', '=', $id)->first();

            $data['homeworkFolders'] = HomeworkFolders::where('course_id', '=', $id)->where('groupNo', '=', $enr->groupNo)->get();
            $data['materialFolders'] = MaterialFolders::where('course_id', '=', $id)->where('groupNo', '=', $enr->groupNo)->get();
        }
        else if($id == 3)
        {
            $enr = Enrollment::where('student_id', '=', Auth::user()->id)->where('course_id', '=', $id)->first();

            $data['homeworkFolders'] = HomeworkFolders::where('course_id', '=', $id)->where('groupNo', '=', $enr->groupNo)->get();
            $data['materialFolders'] = MaterialFolders::where('course_id', '=', $id)->where('groupNo', '=', $enr->groupNo)->get();
        }
        else
        {
            $data['homeworkFolders'] = HomeworkFolders::where('course_id', '=', $id)->get();
            $data['materialFolders'] = MaterialFolders::where('course_id', '=', $id)->get();
        }
        $list = Enrollment::where('course_id', '=', $data['course']->id)->where('status', '=', 1)->get();

        foreach($list as $l)
        {
            $students[] = $l->student_id;
        }
        if($id == 2 || $id == 3)
        {
            $slug = Courses::find($id)->slug;

            $path = public_path('profile/' . Auth::user()->id .'/' . $slug . '-info.json');

            $file = file_get_contents($path, true);

            $array = json_decode($file, true);

            $data['choices'] = $array;

            $data['id'] = $id;
        }

        $data['students'] = User::whereIn('id', $students)->get();

        return view('user.course', $data);
    }

    public function applyForCourse(){
        $data['courses'] = Courses::all();

        return view('user.applyForCourse', $data);
    }

    public function singleHomework($id)
    {
        $data['homework'] = Homework::find($id);

        return view('user.singleHomework', $data);
    }

    public function homework()
    {
        $data['courseList'] = Enrollment::where('student_id', '=', Auth::user()->id)->where('status', '=', 1)->get();

        return view('user.homework', $data);
    }

    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'password' => 'required|confirmed',
            'existing' => 'required',
            'password_confirmation' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if (Hash::check($data['existing'], Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($data['password']);
            $user->save();
            return redirect()->back()->with('status', 'You changed your password!');
        }
        else
        {
            return redirect()->back()->with('status', 'Existing password incorrect!');
        }


    }
}
