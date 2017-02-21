<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['uses' => 'PagesController@welcome', 'middleware' => 'checkStatus']);

Route::get('/waiting', 'PagesController@waiting');

Route::auth();

Route::get('/teacher/register', 'UserController@registerTeacher');
Route::post('/teacher/register', 'UserController@postRegisterTeacher');

Route::group(['middleware' => ['auth', 'status']], function(){
    //get
    Route::get('/home', 'PagesController@index');
    Route::get('/schedule', 'PagesController@schedule');
    Route::get('/homework', 'PagesController@homework');
    Route::get('/material', 'PagesController@material');
    Route::get('/extra', 'PagesController@extra');
    Route::get('/my-courses', 'PagesController@myCourses');
    Route::get('/homework-{id}', 'PagesController@singleHomework');
    Route::get('/settings', 'PagesController@settings');
    Route::get('/password', 'PagesController@password');
    Route::get('/hw-percentage-{id}', 'UserController@homeworkPercentage');
    Route::get('/apply-for-course', 'PagesController@applyForCourse');
    Route::get('/apply-for-course/{id}', 'UserController@applyForCourse');
    Route::get('/course/homework-folder/{id}', 'UserController@homeworkFolder');
    Route::get('/course/material-folder/{id}', 'UserController@materialFolder');

    Route::get('/review/homework/{id}', 'UserController@reviewHomework');

    //post
    Route::post('/homework-upload', 'UserController@homeworkUpload');
    Route::post('/update-profile', 'UserController@updateProfile');
    Route::post('/apply-for-course/{id}', 'UserController@applyForCoursePost');
    Route::post('/missing-course/{id}', 'UserController@updateMissingCourseApplication');
    Route::post('/update-inventor', 'UserController@updateInventor');
    Route::post('/update-revit', 'UserController@updateRevit');
    Route::post('/update-revit-info', 'UserController@updateRevitInfo');
    Route::post('/update-inventor-info', 'UserController@updateInventorInfo');
    Route::post('/update-password', 'PagesController@updatePassword');
    Route::post('/report-bug', 'UserController@reportBug');
});

Route::group(['middleware' => ['auth', 'status', 'course']], function(){
    Route::get('/course-{id}', 'PagesController@course');
});

Route::get('/teacher/courses', 'TeachersController@courses');
Route::get('/teacher/course-{id}', 'TeachersController@course');
Route::get('/teacher/view-student/{id}', 'TeachersController@viewStudent');
Route::get('/teacher/approve-to-course/{id}', 'TeachersController@approveToCourse');
Route::get('/teacher/reject/{id}', 'TeachersController@reject');
Route::get('/teacher/view-student-course-info/{id}', 'TeachersController@viewStudentCourseInfo');
Route::post('/teacher/send-student-email', 'TeachersController@sendStudentEmail');
Route::post('/teacher/add-news', 'TeachersController@postNews');
Route::post('/teacher/add-schedule', 'TeachersController@addSchedule');
Route::post('/teacher/add-homework', 'TeachersController@addHomework');
Route::post('/teacher/add-material', 'TeachersController@addMaterial');
Route::get('/teacher/remove-course-news/{id}', 'TeachersController@removeCourseNews');
Route::get('/teacher/remove-student-{id}/{course}', 'TeachersController@removeStudentFromCourse');
Route::get('/teacher/delete-schedule/{id}', 'TeachersController@deleteSchedule');
Route::get('/teacher/delete-material/{id}', 'TeachersController@deleteMaterial');
Route::get('/teacher/delete-homework-{homework_id}-from-{course_id}', 'TeachersController@deleteHomework');
Route::post('/teacher/send-student-email', 'TeachersController@sendStudentEmail');
Route::post('/teacher/send-email-course', 'TeachersController@postEmailCourse');
Route::get('/teacher/homework-{id}', 'PagesController@singleHomework');
Route::post('/teacher/create-folder-homework', 'TeachersController@createFolderHomework');
Route::post('/teacher/create-folder-material', 'TeachersController@createFolderMaterial');
Route::get('/teacher/homework-folder/{id}', 'TeachersController@homeworkFolder');
Route::get('/teacher/material-folder/{id}', 'TeachersController@materialFolder');
Route::get('/teacher/remove-homework-folder/{id}', 'TeachersController@removeHomeworkFolder');
Route::get('/teacher/remove-material-folder/{id}', 'TeachersController@removeMaterialFolder');
Route::get('/teacher/delete-homework/{id}', 'TeachersController@deleteHW');

Route::group(['middleware' => 'admin'], function(){

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::post('/admin/create-folder-homework', 'AdminController@createFolderHomework');
    Route::post('/admin/create-folder-material', 'AdminController@createFolderMaterial');
    Route::get('/admin/homework-folder/{id}', 'AdminController@homeworkFolder');
    Route::get('/admin/material-folder/{id}', 'AdminController@materialFolder');
    Route::get('/admin/remove-homework-folder/{id}', 'AdminController@removeHomeworkFolder');
    Route::get('/admin/remove-material-folder/{id}', 'AdminController@removeMaterialFolder');
    Route::get('/admin/delete-homework/{id}', 'AdminController@deleteHW');
    Route::get('/admin/course-info/{id}', 'AdminController@courseInfo');


    //get
    Route::get('/admin/waiting-students', 'AdminController@waitingStudents');
    Route::get('/admin/approve-student-{id}', 'AdminController@approveStudent');
    Route::get('/admin/course-applications', 'AdminController@waitingForCourse');
    Route::get('/admin/list-of-students', 'AdminController@listOfStudents');
    Route::get('/admin/courses', 'AdminController@courses');
    Route::get('/admin/course-{id}', 'AdminController@course');
    Route::get('/admin/schedule', 'AdminController@schedule');
    Route::get('/admin/homework-{id}', 'PagesController@singleHomework');
    Route::get('/material-{attachment}', 'DownloadsController@getMaterial');
    Route::get('/admin/announcements', 'AdminController@announcement');
    Route::get('/admin/view-student/{id}', 'AdminController@viewStudent');
    Route::get('/admin/approve-to-course/{id}', 'AdminController@approveToCourse');
    Route::get('/admin/reject/{id}', 'AdminController@reject');
    Route::get('/admin/announcement/{id}', 'AdminController@viewAnnouncement');
    Route::get('/admin/view-student-course-info/{id}', 'AdminController@viewStudentCourseInfo');
    Route::get('/admin/teacher-applications', 'AdminController@teacherApplications');

    //post
    Route::post('/admin/add-course', 'AdminController@addCourse');
    Route::post('/admin/add-schedule', 'AdminController@addSchedule');
    Route::post('/admin/add-homework', 'AdminController@addHomework');
    Route::post('/admin/add-material', 'AdminController@addMaterial');
    Route::post('/admin/post-announcement', 'AdminController@postAnnouncement');
    Route::post('/admin/edit-announcement', 'AdminController@editAnnouncement');
    Route::get('/admin/make-admin/{id}', 'AdminController@makeAdmin');
    Route::post('/admin/send-student-email', 'AdminController@sendStudentEmail');
    Route::post('/admin/add-news', 'AdminController@postNews');
    Route::post('/admin/course/update', 'AdminController@updateCourse');
    //add
    Route::get('/admin/add-new-course', 'AdminController@addNewCourse');
    Route::get('/admin/approve-teacher/{id}', 'AdminController@approveTeacher');
    Route::get('/admin/reject-teacher/{id}', 'AdminController@rejectTeacher');
    //delete
    Route::get('/admin/delete-course-{id}', 'AdminController@deleteCourse');
    Route::get('/admin/delete-student-{id}', 'AdminController@deleteStudent');
    Route::get('/admin/delete-announcement/{id}', 'AdminController@deleteAnnouncement');
    Route::get('/admin/delete-material/{id}', 'AdminController@deleteMaterial');
    Route::get('/admin/remove-student-{id}/{course}', 'AdminController@removeStudentFromCourse');
    Route::get('/admin/delete-schedule/{id}', 'AdminController@deleteSchedule');
    Route::get('/admin/remove-admin/{id}', 'AdminController@removeAdmin');
    Route::get('/admin/remove-course-news/{id}', 'AdminController@removeCourseNews');
    //Emails
    Route::get('/admin/send-email', 'AdminController@sendEmail');
    Route::get('/admin/send-email2', 'AdminController@sendEmail2');
    Route::post('/admin/send-email', 'AdminController@postEmail');
    Route::post('/admin/send-email-course', 'AdminController@postEmailCourse');
    Route::get('/admin/delete-homework-{homework_id}-from-{course_id}', 'AdminController@deleteHomework');

    Route::get('/admin/update-groups-inventor', function(){
        $students = BIM\Enrollment::where('course_id', '=', 3)->get();

        foreach($students as $student)
        {
            $path = public_path('profile/' . $student->student_id .'/inventor-course-info.json');
            if(file_exists($path))
            {
                $file = file_get_contents($path, true);

                $array = json_decode($file, true);
            }

            if(isset($array['course-level']))
            {
                if($array['course-level'] == 'level-beginner')
                {
                    $en = BIM\Enrollment::find($student->id);
                    $en->groupNo = 1;
                    $en->save();
                }
                else
                {
                    $en = BIM\Enrollment::find($student->id);
                    $en->groupNo = 2;
                    $en->save();
                }
            }
            else
            {
                $en = BIM\Enrollment::find($student->id);
                $en->groupNo = 0;
                $en->save();
            }
        }
    });

    Route::get('/admin/update-groups-revit', function(){
        $students = BIM\Enrollment::where('course_id', '=', 2)->get();

        foreach($students as $student)
        {
            $path = public_path('profile/' . $student->student_id .'/revit-course-info.json');

            if(file_exists($path))
            {
                $file = file_get_contents($path, true);

                $array = json_decode($file, true);
            }

            if(isset($array['which-days']))
            {
                if($array['which-days'] == 'mon-we')
                {
                    $en = BIM\Enrollment::find($student->id);
                    $en->groupNo = 1;
                    $en->save();
                }
                else
                {
                    $en = BIM\Enrollment::find($student->id);
                    $en->groupNo = 2;
                    $en->save();
                }
            }
            else
            {
                $en = BIM\Enrollment::find($student->id);
                $en->groupNo = 0;
                $en->save();
            }
        }
    });

//    Route::get('/admin/delete-material-{material_id}-from-{course_id}', 'AdminController@deleteMaterial');
//    Route::get('/admin/delete-homework-{homework_id}-from-{course_id}', 'AdminController@deleteHomework');
//    Route::get('/admin/delete-schedule-{schedule_id}-from-{course_id}', 'AdminController@deleteSchedule');
});
