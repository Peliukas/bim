<?php

namespace BIM\Http\Controllers;



use BIM\Http\Requests;
use BIM\Courses;
use BIM\Teachers;
use BIM\Schedule;
use BIM\Homework;
use BIM\Material;
use BIM\CourseNews;
use BIM\User;
use BIM\Enrollment;
use BIM\HomeworkList;
use BIM\HomeworkFolders;
use BIM\MaterialFolders;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon;
use Mail;

use Illuminate\Support\Facades\Validator;


class TeachersController extends Controller
{
    public function courses()
    {
        $list = Teachers::where('user_id', '=', Auth::user()->id)->select('course_id')->get();
        $data['courses'] = Courses::whereIn('id', $list)->get();

        return view('teacher.courses', $data);
    }

    public function course($id)
    {
        $data['course'] = Courses::find($id);
        $data['schedule'] = $data['course']->schedule()->get();
        $data['homework'] = $data['course']->homework()->where('folder', '=', NULL)->get();
        $data['materials'] = $data['course']->material()->where('folder', '=', NULL)->get();
        $data['enrolled'] = $data['course']->enrolled()->get();
        $data['allNews'] = $data['course']->news()->get();

        $enrolledStudentList =  array();
        $waitingStudentList = array();


        foreach($data['enrolled'] as $studentEnrollment)
        {
            $student = User::find($studentEnrollment->student_id);

            if($studentEnrollment->status == 1)
            {
                array_push($enrolledStudentList, $student);
            }
            else
            {
                array_push($waitingStudentList, $student);
            }
        }

        $data['users_enrolled'] = $enrolledStudentList;

        foreach($data['users_enrolled'] as $user)
        {
            if($id == 2)
            {
                $path = public_path('profile/' . $user->id .'/revit-course-info.json');

                if(file_exists($path))
                {
                    $file = file_get_contents($path, true);

                    $array = json_decode($file, true);
                }

                if(isset($array['which-days']))
                {
                    if($array['which-days'] == 'mon-we')
                    {
                        $data['mon_we'][] = $user;
                    }
                    else
                    {
                        $data['tue_thur'][] = $user;
                    }
                }
                else
                {
                    $data['unsigned'][] = $user;
                }

                $data['revit'] = true;
            }

            if($id == 3)
            {
                $path = public_path('profile/' . $user->id .'/inventor-course-info.json');
                if(file_exists($path))
                {
                    $file = file_get_contents($path, true);

                    $array = json_decode($file, true);
                }

                if(isset($array['course-level']))
                {
                    if($array['course-level'] == 'level-beginner')
                    {
                        $data['beginners'][] = $user;
                    }
                    else
                    {
                        $data['advanced'][] = $user;
                    }
                }
                else
                {
                    $data['unsigned'][] = $user;
                }
                $data['inventor'] = true;
            }

            if($id != 2 && $id != 3)
            {
                $data['else'] = true;
            }
        }

        $data['users_waiting'] = $data['course']->enrolled()->where('course_id', '=', $id)->where('status', '=', 0)->get();

        return view('teacher.course', $data);
    }

    public function addHomework(Request $r)
    {
        $data = $r->all();

        $val = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            'course' => 'required',
            'deadline' => 'required',
        ]);

        if(isset($data['folderHomework']))
        {
            ($data['folderHomework'] == 'NULL') ? $data['folderHomework'] = NULL : false;
        }

        if($val->fails())
        {
            return redirect()->back()->withErrors($val);
        }
        else
        {
            if($r->file('attachment') != '')
            {
                $uniqueFileName = uniqid() . $r->file('attachment')->getClientOriginalName();
                $path = public_path('/adm-homework/'.$data['course'].'/');
                $r->file('attachment')->move($path, $uniqueFileName);

                Homework::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'attachment' => '/adm-homework/'.$data['course'].'/'.$uniqueFileName,
                    'course_id' => $data['course'],
                    'folder' => $data['folderHomework'],
                    'deadline' => $data['deadline'],
                ]);
            }
            else{
                Homework::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'attachment' => 'no attachment',
                    'course_id' => $data['course'],
                    'folder' => $data['folderHomework'],
                    'deadline' => $data['deadline'],
                ]);
            }

            $students = Courses::find($data['course'])->enrolled()->where('status', '=', 1)->get();

//            foreach($students as $student)
//            {
//                $user = User::find($student->student_id);
//
//                Mail::send('email.homework', ['user' => $user], function ($m) use ($user) {
//                    $m->from('register@bimtrainingstudio.com', 'BIM Training Studio');
//
//                    $m->to($user->email, $user->name)->subject('Homework uploaded!');
//                });
//            }

            return redirect()->back()->with('status', 'You have successfully added homework!');
        }
    }

    public function addMaterial(Request $r){
        $data = $r->all();

        if(isset($data['folderHomework']))
        {
            ($data['folderHomework'] == 'NULL') ? $data['folderHomework'] = NULL : false;
        }

        $val = Validator::make($data, [
            'materialDescription' => 'required',
            'materialAttachment' => 'required',
        ]);

        if($val->fails())
        {
            return redirect()->back()->withErrors($val);
        }
        else
        {
            $uniqueFileName = uniqid() . $r->file('materialAttachment')->getClientOriginalName();
            $path = public_path('/adm-material/'.$data['course'].'/');
            $r->file('materialAttachment')->move($path, $uniqueFileName);

            Material::create([
                'title' => $data['materialTitle'],
                'description' => $data['materialDescription'],
                'attachment' => '/adm-material/'.$data['course'].'/'.$uniqueFileName,
                'course_id' => $data['course'],
                'folder' => $data['folderHomework'],

            ]);

            return redirect()->back()->with('status', 'You have successfully added course material!');
        }
    }

    public function addSchedule(Request $r)
    {
        $data = $r->all();

        $val = Validator::make($data,[
            'name' => 'required',
            'place' => 'required',
            'course' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        if($val->fails())
        {
            return redirect()->back()->withErrors($val);
        }
        else
        {
            $group = 0;
            if(isset($data['group']))
            {
                switch($data['group'])
                {
                    case 'mon-we':
                        $group =  1;
                        break;
                    case 'tue-thur':
                        $group = 2;
                        break;
                    case 'beginner':
                        $group = 1;
                        break;
                    case 'advanced':
                        $group = 2;
                        break;
                    default:
                        $group = 0;
                }
            }

            Schedule::create([
                'name' => $data['name'],
                'place' => $data['place'],
                'course_id' => $data['course'],
                'when' => $data['date'],
                'whenTime' => $data['time'],
                'groupNo' => $group,
            ]);

            return redirect()->back()->with('status', 'You have successfully added into schedule!');
        }
    }

    public function deleteSchedule($id)
    {
        $schedule = Schedule::find($id);
        $name = $schedule->name;
        $schedule->delete();

        return redirect()->back()->with('status', 'You have successfully deleted the schedule from course: ' . $name);
    }
    public function deleteHomework($homework_id, $course_id)
    {
        $courseName = Courses::find($course_id)->name;
        Homework::find($homework_id)->delete();

        return redirect()->back()->with('status', 'You have successfully deleted the homework from course ', $courseName);
    }
    public function deleteMaterial($id)
    {
        $material = Material::find($id);
        $courseName = Courses::find($material->course_id);
        $material->delete();

        return redirect()->back()->with('status', 'You have successfully deleted material from course: ', $courseName);
    }

    public function approveToCourse($id)
    {
        $application = Enrollment::find($id);
        $application->status = 1;
        $application->save();

        $user = User::find($application->student_id);

        Mail::send('email.enrollment', ['user' => $user, 'course' => Courses::find($application->course_id)], function ($m) use ($user) {
            $m->from('register@bimtrainingstudio.com', 'BIM Training Studio');

            $m->to($user->email, $user->name)->subject('Registration to BIM Training Studio');
        });

        return redirect()->back()->with('approved', 'You have successfully approved student to course!');
    }

    public function reject($id)
    {
        $application = Enrollment::find($id);
        $application->delete();

        return redirect()->back()->with('deleted', 'Student application was rejected!');
    }


    public function viewStudent($id){

        $student = User::find($id);
        $data = array();
        $data['id'] = $student->id;
        $data['name'] = $student->name;
        $data['surname'] = $student->surname;
        $data['email'] = $student->email;
        $data['phone'] = $student->phone;
        $data['student_id'] = $student->student_id;
        $data['birthday'] = $student->dateOfBirth;
        $data['gender'] = $student->gender;
        $data['languages'] = $student->languages;
        $data['country'] = $student->country;
        $data['study_programm'] = $student->study_programme;
        $data['semester'] = $student->semester;
        $data['status'] = $student->status;
        $data['fulltime'] = $student->fulltime;
        $data['created_at'] = $student->created_at;

        $data['enrollments'] = Enrollment::where('student_id', '=', $id)->get();

        return view('teacher.singleStudent', $data);
    }

    public function viewStudentCourseInfo($id)
    {
        $enrollment = Enrollment::find($id);

        $user = $enrollment->student_id;

        $course = Courses::find($enrollment->course_id);

        $path = public_path('profile/' . $user .'/' . $course->slug . '-info.json');

        $file = file_get_contents($path, true);

        $array = json_decode($file, true);

        $data['values'] = $array;

        switch($enrollment->course_id)
        {
            case 2:
                return view('admin.courses.revit', $data);
                break;
            case 3:
                return view('admin.courses.inventor', $data);
                break;
            case 4:
                return view('admin.courses.autoCad', $data);
                break;
            case 5:
                return view('admin.courses.fusion360', $data);
                break;
            case 6:
                return view('admin.courses.bimFocus', $data);
                break;
            case 7:
                return view('admin.courses.robot', $data);
                break;
            default:
                return redirect('/');
                break;
        }
    }

    public function postNews(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data, [
            'newsTitle' => 'required',
            'newsText' => 'required',
            'course_id' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $news = New CourseNews();
        $news->course_id = $data['course_id'];
        $news->user_id = Auth::user()->id;
        $news->title = $data['newsTitle'];
        $news->description = $data['newsText'];
        $news->save();

        return redirect()->back()->with('status', 'You successfully added announcement: ' . $news->title);
    }

    public function removeCourseNews($id)
    {
        $news = CourseNews::find($id);
        $news->delete();

        return redirect()->back()->with('status', 'You deleted announcement: ' . $news->title);
    }

    public function postEmailCourse(Request $r)
    {
        $data = $r->all();

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

        if(isset($data['group']))
        {
            switch($data['group'])
            {
                case 'mon-we':
                    $enrolled = Enrollment::where('course_id', '=', $data['enrollment'])->where('status', '=', 1)->where('groupNo', '=', 1)->get();
                    break;
                case 'tue-thur':
                    $enrolled = Enrollment::where('course_id', '=', $data['enrollment'])->where('status', '=', 1)->where('groupNo', '=', 2)->get();
                    break;
                case 'beginner':
                    $enrolled = Enrollment::where('course_id', '=', $data['enrollment'])->where('status', '=', 1)->where('groupNo', '=', 1)->get();
                    break;
                case 'advanced':
                    $enrolled = Enrollment::where('course_id', '=', $data['enrollment'])->where('status', '=', 1)->where('groupNo', '=', 2)->get();
                    break;
                default:
                    $enrolled = Enrollment::where('course_id', '=', $data['enrollment'])->where('status', '=', 1)->get();
            }
        }

        if(isset($enrolled))
        {
            foreach($enrolled as $list)
            {
                $user = User::find($list->student_id);

                Mail::send('email.adminEmail', $data, function ($message) use($user, $data, $attachment, $mime, $name) {

                    $message->from('info@bimtrainingstudio.com', '');

                    $message->to($user->email)->subject($data['aboutWhat']);

                    if($attachment)
                    {
                        $message->attach($attachment, array('mime' => $mime, 'as' => $name));
                    }
                });
            }
        }

        return redirect()->back()->with('success', 'You have send email to students!');

    }

    public function sendStudentEmail(Request $r)
    {
        $data = $r->all();

        $user = User::find($data['user']);

        Mail::send('email.adminEmail', $data, function ($message) use($user, $data) {

            $message->from('info@bimtrainingstudio.com', '');

            $message->to($user->email)->subject($data['aboutWhat']);

        });

        return redirect()->back()->with('status', 'Message was sent!');
    }

    public function showSingleHomework($id)
    {
        $homework = HomeworkList::find($id);

        return view('admin.singleHomework', $$homework);
    }

    public function createFolderHomework(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back();
        }

        $hwf = new HomeworkFolders();
        $hwf->course_id = $data['course'];
        if($data['course'] == 2)
        {
            ($data['group'] == 'mon-we') ? $group = 1 : $group = 2;
        }
        else if($data['course'] == 3)
        {
            ($data['group'] == 'beginner') ? $group = 1 : $group = 2;
        }
        else
        {
            $group = 0;
        }
        $hwf->groupNo = $group;
        $hwf->name = $data['name'];
        $hwf->save();

        return redirect()->back();

    }

    public function createFolderMaterial(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back();
        }

        $mf = new MaterialFolders();
        $mf->course_id = $data['course'];
        if($data['course'] == 2)
        {
            ($data['group'] == 'mon-we') ? $group = 1 : $group = 2;
        }
        else if($data['course'] == 3)
        {
            ($data['group'] == 'beginner') ? $group = 1 : $group = 2;
        }
        else
        {
            $group = 0;
        }
        $mf->groupNo = $group;
        $mf->name = $data['name'];
        $mf->save();

        return redirect()->back();

    }

    public function homeworkFolder($id)
    {
        $data['folder'] = HomeworkFolders::find($id);
        $data['homework'] = Homework::where('folder', '=', $id)->get();
        $data['course'] = Courses::find($data['folder']->course_id);

        return view('teacher.homeworkFolder', $data);
    }

    public function materialFolder($id)
    {
        $data['folder'] = MaterialFolders::find($id);
        $data['material'] = Material::where('folder', '=', $id)->get();
        $data['course'] = Courses::find($data['folder']->course_id);

        return view('teacher.materialFolder', $data);
    }

    public function removeMaterialFolder($id)
    {
        $folder = MaterialFolders::find($id);
        $folder->delete();

        $material = Material::where('folder', '=', $id)->get();

        foreach($material as $m)
        {
            $mat = Material::find($m->id);
            $mat->delete();
        }

        return 'You have deleted materials folder with all items inside!';
    }

    public function removeHomeworkFolder($id)
    {
        $folder = HomeworkFolders::find($id);
        $folder->delete();

        $homework = Homework::where('folder', '=', $id)->get();

        foreach($homework as $hom)
        {
            $hom = Homework::find($hom->id);
            $hom->delete();
        }

        return 'You have deleted materials folder with all items inside!';
    }

    public function deleteHW($id)
    {
        $hw = Homework::find($id);
        $hw->delete();

        return redirect()->back()->with('status', 'You have successfully deleted the homework!');
    }
}
