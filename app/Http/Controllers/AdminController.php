<?php

namespace BIM\Http\Controllers;

use BIM\Courses;
use BIM\CoursesList;
use BIM\Homework;
use BIM\HomeworkList;
use BIM\Schedule;
use BIM\Material;
use BIM\Enrollment;
use BIM\News;
use BIM\CourseNews;
use BIM\Teachers;
use BIM\MaterialFolders;
use BIM\HomeworkFolders;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon;
use Mail;

use BIM\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function waitingStudents()
    {
        $data['students'] = User::where('status' ,'=', 0)->paginate(20);

        return view('admin.waitingStudents', $data);
    }

    public function waitingForCourse()
    {
        $data['list'] = Enrollment::where('status', '=', 0)->get();


        //$data['students'] = User::whereIn('id', $list)->paginate(20);

        return view('admin.waitingForCourse', $data);
    }

    public function deleteStudent($id)
    {
        $user = User::find($id);
        $username = $user->name;
        Enrollment::where('student_id', '=', $user->id)->delete();
        $user->delete();

        return redirect()->back()->with('deleted', 'You have successfully deleted: ' . $username);
    }

    public function approveStudent($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $username = $user->name;
        $user->save();

        Mail::send('email.confirmation', ['user' => $user], function ($m) use ($user) {
            $m->from('register@bimtrainingstudio.com', 'BIM Training Studio');

            $m->to($user->email, $user->name)->subject('Registration to BIM Training Studio');
        });

        return redirect()->back()->with('approved', 'You have successfully approved student: ' .$username);
    }
    public function listOfStudents(Request $r)
    {
        $data['students'] = User::where('status', '=', 1)->paginate(20);

        if($r->input('search') != '')
        {
            $data['students'] = User::where('status', '=', 1)->where('name', 'LIKE', '%' . $r->input('search') . '%')->paginate(50);
        }

        return view('admin.listOfStudents', $data);
    }

    public function courses()
    {
        $data['courses'] = Courses::paginate(20);

        return view('admin.courses', $data);
    }

    public function addNewCourse()
    {
        return view('admin.addCourse');
    }

    public function addCourse(Request $r)
    {
        $data = $r->all();

        $val = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|',
        ]);

        if($val->fails())
        {
            return redirect()->back()->withErrors($val)->withInput();
        }
        else {
            Courses::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'slug' => Courses::slug($data['name']),
            ]);

            return redirect('/admin/courses')->with('status', 'You have successfully added new course: ' . $data['name']);
        }
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

        return view('admin.course', $data);
    }

    public function showSingleHomework($id)
    {
        $homework = HomeworkList::find($id);

        return view('admin.singleHomework', $$homework);
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
                    'deadline' => $data['deadline'],
                    'folder' => $data['folderHomework'],
                ]);
            }
            else{
                Homework::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'attachment' => 'no attachment',
                    'course_id' => $data['course'],
                    'deadline' => $data['deadline'],
                    'folder' => $data['folderHomework'],
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
        $val = Validator::make($data, [
            'materialDescription' => 'required',
            'materialAttachment' => 'required',
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


    public function deleteCourse($id)
    {
        $courseName = Courses::find($id)->name;

        Courses::find($id)->delete();
        Homework::where('course_id', '=', $id)->delete();
        HomeworkList::where('course_id', '=', $id)->delete();
        CoursesList::where('course_id', '=', $id)->delete();

        return redirect()->back()->with('status', 'You have successfully deleted    course: ', $courseName);
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

    public function deleteHW($id)
    {
        $hw = Homework::find($id);
        $hw->delete();

        return redirect()->back()->with('status', 'You have successfully deleted the homework!');
    }

    public function deleteMaterial($id)
    {
        $material = Material::find($id);
        $courseName = Courses::find($material->course_id);
        $material->delete();

        return redirect()->back()->with('status', 'You have successfully deleted the schedule from course: ', $courseName);
    }

    public function removeStudentFromCourse($user, $course)
    {
        $enrollment = Enrollment::where('student_id', '=', $user)->where('course_id', '=', $course)->first();
        $student = User::find($user);
        $enrollment->delete();

        return redirect()->back()->with('status', 'You have successfully removed student from course: ', $student->name  . ' ' . $student->surname);
    }

    public function announcement()
    {
        $data['announcements'] = News::all();

        return view('admin.announcement', $data);
    }

    public function postAnnouncement(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data, [
                'title' => 'required',
                'text' => 'required'
            ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $news = new News();
        $news->title = $data['title'];
        $news->text = $data['text'];
        $news->save();

        return redirect()->back()->with('message', 'You succsesfully add announcement!');
    }

    public function deleteAnnouncement($id)
    {
        $announcement = News::find($id);
        $announcement->delete();

        return redirect()->back()->with('message', 'You just deleted announcement!');
    }

    public function viewAnnouncement($id)
    {
        $data['announcement'] = News::find($id);

        return view('admin.viewAnnouncement', $data);
    }

    public function editAnnouncement(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'text' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $news = News::find($data['id']);
        $news->title = $data['title'];
        $news->text = $data['text'];
        $news->save();

        return redirect('/admin/announcements')->with('message', 'You succsesfully changed announcement!');
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

        return view('admin.singleStudent', $data);
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

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        return redirect()->back()->with('message', $user->name . ' status updated to Administrator!');
    }

    public function removeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        return redirect()->back()->with('message', $user->name . ' status updated to student!');
    }

    public function sendEmail()
    {
//        $data['students'] = Enrollment::orderBy('course_id', 'asc')->where('status', '=', 1)->get();
//
//        return view('admin.sendEmail', $data);

        $data['courses'] = Courses::all();

        return view('admin.sendEmail2', $data);
    }

    public function sendEmail2()
    {
        $data['courses'] = Courses::all();

        return view('admin.sendEmail2', $data);
    }

    public function postEmail(Request $r)
    {
        $data = $r->all();

//        $uniqueFileName = uniqid() . $r->file('attachment')->getClientOriginalName();
//        $pathToUpload = '/email';
//        $path = public_path($pathToUpload);
//        $r->file('attachment')->move($path, $uniqueFileName);

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

        foreach($data['uz'] as $list)
        {
            $user = User::find($list);

            Mail::send('email.adminEmail', $data, function ($message) use($user, $data, $attachment, $mime, $name) {

                $message->from('info@bimtrainingstudio.com', '');

                $message->to($user->email)->subject($data['aboutWhat']);

                if($attachment)
                {
                    $message->attach($attachment, array('mime' => $mime, 'as' => $name));
                }
            });
        }
        return redirect()->back()->with('success', 'You have send email to students!');
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

    public function teacherApplications()
    {
        $data['teachers'] = User::where('teacher', '=', 1)->where('status', '=', 0)->get();

        return view('admin.teacherApplications', $data);
    }

    public function approveTeacher($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('status', 'You have approved new teacher: ' . $user->name);
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

        return view('admin.homeworkFolder', $data);
    }

    public function materialFolder($id)
    {
        $data['folder'] = MaterialFolders::find($id);
        $data['material'] = Material::where('folder', '=', $id)->get();
        $data['course'] = Courses::find($data['folder']->course_id);

        return view('admin.materialFolder', $data);
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

    public function courseInfo($id)
    {
        $data['course'] = Courses::find($id);

        return view('admin.course-update', $data);
    }

    public function updateCourse(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'course' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $course = Courses::find($data['course']);
        $course->name = $data['name'];
        $course->description = $data['description'];
        $course->course_length = $data['course_length'];
        $course->save();

        return 'Course information updated!';

    }

}
