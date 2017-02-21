<?php

namespace BIM\Http\Controllers;

use BIM\Homework;
use BIM\HomeworkList;
use BIM\Courses;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use BIM\Enrollment;
use BIM\Teachers;
use BIM\HomeworkFolders;
use BIM\MaterialFolders;
use BIM\Material;

use Mail;
use BIM\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function homeworkUpload(Request $r)
    {
        $data = $r->all();

        $val = Validator::make($data, [
            'attachment' => 'required',
            'homework' => 'required',
            'course' => 'required',
        ]);

        if($val->fails())
        {
            return redirect()->back()->withErrors($val);
        }

        $user = Auth::user()->id;

        $uniqueFileName = uniqid() . str_slug($r->file('attachment')->getClientOriginalName()) . '.' . $r->file('attachment')->getClientOriginalExtension();
        $pathToUpload = '/profile/' . $user .'/homework/';
        $path = public_path($pathToUpload);
        $r->file('attachment')->move($path, $uniqueFileName);

        HomeworkList::create([
            'user_id' => $user,
            'course_id' => $data['course'],
            'homework_id' => $data['homework'],
            'attachment' => $pathToUpload . $uniqueFileName,
        ]);

        return redirect()->back()->with('status', 'You have successfully uploaded your homework!');
    }

    public function updateProfile(Request $r)
    {
        $data = $r->all();

        $val = Validator::make($data,[
            'name' => 'required',
            'surname' => 'required',
            'studentID' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'languages' => 'required',
            'studyProgram' => 'required',
            'semester' => 'required',
            'typeOfStudies' => 'required'
        ]);

        if($val->fails())
        {
            return redirect()->back()->withErrors($val);
        }
        else
        {
            $user = User::find(Auth::user()->id);
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            $user->student_id = $data['studentID'];
            $user->dateOfBirth = $data['birthday'];
            $user->gender = $data['gender'];
            $user->country = $data['country'];
            $user->languages = $data['languages'];
            $user->study_programme = $data['studyProgram'];
            $user->semester = $data['semester'];
            ($data['typeOfStudies'] == 'erasmus') ? ($user->erasmus = 1) && ($user->fulltime = 0) : ($user->fulltime = 1) && ($user->erasmus = 0);
            $user->save();

            return redirect()->back()->with('status', 'You have successfully updated your profile!');
        }
    }

    public function applyForCourse($id){
        switch($id)
        {
            case 2:
                $data['course'] = Courses::find(2);
                return view('applyCourse.revit', $data);
                break;
            case 3:
                $data['course'] = Courses::find(3);
                return view('applyCourse.inventor', $data);
                break;
            case 4:
                $data['course'] = Courses::find(4);
                return view('applyCourse.autoCad', $data);
                break;
            case 5:
                $data['course'] = Courses::find(5);
                return view('applyCourse.fusion360', $data);
                break;
            case 6:
                $data['course'] = Courses::find(6);
                return view('applyCourse.bimFocus', $data);
                break;
            case 7:
                $data['course'] = Courses::find(7);
                return view('applyCourse.robot', $data);
                break;
            default:
                return redirect('/');
                break;
        }
    }

    public function applyForCoursePost(Request $r, $id)
    {
        $data =  $r->all();

        $user = Auth::user()->id;
        $course = Courses::find($id);

        $keys = array_keys($data);

        if(!(file_exists(public_path('profile/' . $user .'/')))){
            mkdir(public_path('profile/' . $user .'/'), 0777, true);
        }
        $path = public_path('profile/' . $user .'/' . $course->slug . '-info.json');

        $file = fopen($path, 'w');
        fwrite($file, json_encode($data));
        fclose($file);

        $enrollment = new Enrollment();
        $enrollment->student_id = $user;
        $enrollment->course_id = $id;
        $enrollment->status = 0;
        $enrollment->save();

        return 'Your application will be reviewed!';

    }

    public function updateMissingCourseApplication(Request $r, $id)
    {
        $data =  $r->all();

        $user = Auth::user()->id;
        $course = Courses::find($id);

        $keys = array_keys($data);

        if(!(file_exists(public_path('profile/' . $user .'/')))){
            mkdir(public_path('profile/' . $user .'/'), 0777, true);
        }
        $path = public_path('profile/' . $user .'/' . $course->slug . '-info.json');

        $file = fopen($path, 'w');
        fwrite($file, json_encode($data));
        fclose($file);

        $enrollment = new Enrollment();
        $enrollment->student_id = $user;
        $enrollment->course_id = $id;
        $enrollment->status = 0;
        $enrollment->save();

        return redirect()->back();

    }

    public function homeworkPercentage($course)
    {
        return json_encode(Homework::getHomeworkPercentage($course));
    }

    public function updateInventor(Request $r)
    {
        $data = $r->all();

        $user = Auth::user()->id;

        $path = public_path('profile/' . $user .'/inventor-course-info.json');

        $file = file_get_contents($path, true);

        $array = json_decode($file, true);

        $array['course-level'] = $data['course-level'];

        $file = fopen($path, "w") or die("Unable to open file!");
        fwrite($file, json_encode($array));
        fclose($file);

        return redirect()->back();
    }

    public function updateRevit(Request $r)
    {
        $data = $r->all();

        $user = Auth::user()->id;

        $path = public_path('profile/' . $user .'/revit-course-info.json');

        $file = file_get_contents($path, true);

        $array = json_decode($file, true);

        $array['which-days'] = $data['which-days'];

        $file = fopen($path, "w") or die("Unable to open file!");
        fwrite($file, json_encode($array));
        fclose($file);

        return redirect()->back();
    }

    public function updateRevitInfo(Request $r)
    {
        $data = $r->all();

        $user = Auth::user()->id;

        $path = public_path('profile/' . $user .'/revit-course-info.json');

        $file = file_get_contents($path, true);

        $array = json_decode($file, true);

        $array['which-days'] = $data['which-days'];

        $enr = Enrollment::where('student_id', '=', $user)->where('course_id', '=', 2)->first();
        ($data['which-days'] == 'mon-we') ? $enr->groupNo = 1 : $enr->groupNo = 2;
        $enr->save();

        $file = fopen($path, "w") or die("Unable to open file!");
        fwrite($file, json_encode($array));
        fclose($file);

        return redirect()->back();
    }

    public function updateInventorInfo(Request $r)
    {
        $data = $r->all();

        $user = Auth::user()->id;

        $path = public_path('profile/' . $user .'/inventor-course-info.json');

        $file = file_get_contents($path, true);

        $array = json_decode($file, true);

        $array['course-level'] = $data['course-level'];

        $enr = Enrollment::where('student_id', '=', $user)->where('course_id', '=', 3)->first();
        ($data['course-level'] == 'level-beginner') ? $enr->groupNo = 1 : $enr->groupNo = 2;
        $enr->save();

        $file = fopen($path, "w") or die("Unable to open file!");
        fwrite($file, json_encode($array));
        fclose($file);

        return redirect()->back();
    }

    public function registerTeacher()
    {
        $data['courses'] = Courses::all();

        return view('auth.registerTeacher', $data);
    }

    public function postRegisterTeacher(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'birthday' => 'required|date',
            'gender' => 'required',
            'course' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User();
        $user->name= $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->dateOfBirth = $data['birthday'];
        $user->gender = $data['gender'];
        $user->status = 0;
        $user->teacher = 1;
        $user->save();

        $teacher = new Teachers();
        $teacher->user_id = $user->id;
        $teacher->course_id = $data['course'];
        $teacher->save();

        Auth::loginUsingId($user->id);

        return redirect('home');
    }

    public function homeworkFolder($id)
    {
        $data['folder'] = HomeworkFolders::find($id);
        $data['homework'] = Homework::where('folder', '=', $id)->get();
        $data['course'] = Courses::find($data['folder']->course_id);

        return view('user.homeworkFolder', $data);
    }

    public function materialFolder($id)
    {
        $data['folder'] = MaterialFolders::find($id);
        $data['material'] = Material::where('folder', '=', $id)->get();
        $data['course'] = Courses::find($data['folder']->course_id);

        return view('user.materialFolder', $data);
    }

    public function reviewHomework($id)
    {
        $data['homework'] = Homework::find($id);
        $data['students'] = HomeworkList::where('homework_id', '=', $id)->get();

        return view('hwStatus', $data);
    }

    public function reportBug(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data, [
            'description' => 'required|min:5'
        ]);

        if($validator->fails())
        {
            return redirect()->back();
        }

        if($r->file('attachment'))
        {
            $attachment = $r->file('attachment');
            $mime = $r->file('attachment')->getMimeType();

            $name = $r->attachment->getClientOriginalName();
        }
        else
        {
            $attachment = '';
            $mime = '';
            $name = '';
        }

        Mail::send('email.report', $data, function ($message) use($data, $attachment, $mime, $name) {

            $message->from('info@bimtrainingstudio.com', '');

            $message->to('info@depamatic.com')->subject('BUG REPORT');

            if($attachment)
            {
                $message->attach($attachment, array('mime' => $mime, 'as' => $name));
            }
        });

        return redirect()->back();
    }
}
