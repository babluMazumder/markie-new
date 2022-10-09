<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['XSS']], function () {


    // student panel
    Route::group(['middleware' => ['StudentMiddleware']], function () {

        // student panel marksheet view
        Route::get('mark-sheet-student', ['as' => 'mark_sheet_student', 'uses' => 'Student\ResultController@markSheetStudent']);

        Route::post('mark-sheet-student', ['as' => 'mark_sheet_student', 'uses' => 'Student\ResultController@markSheetStudentSearch']);

        Route::post('mark-sheet-student/print', 'Student\ResultController@markSheetStudentPrint');


        //Route::get('delete-document/{id}', ['as' => 'delete_document', 'uses' => 'SmStudentAdmissionController@deleteDocument']);
        Route::get('delete-document/{id}', ['as' => 'delete_document', 'uses' => 'SmStudentAdmissionController@deleteDocument']);
        Route::post('student_upload_document', ['as' => 'student_upload_document', 'uses' => 'SmStudentAdmissionController@studentUploadDocument']);

        Route::get('student-download-document/{file_name}', 'Student\SmStudentPanelController@DownlodStudentDocument')->name('student-download-document')->middleware('userRolePermission:17');


        Route::post('student-logout', 'Auth\LoginController@logout')->name('student-logout');

        Route::get('student-profile',  'Student\SmStudentPanelController@studentDashboard')->name('student-profile')->middleware('userRolePermission:11');

        // modified by rashed 18th august 2020
        Route::get('update-my-profile/{id}',  'Student\SmStudentPanelController@studentProfileUpdate')->name('update-my-profile')->middleware('userRolePermission:11');
        Route::post('update-my-profile',  'Student\SmStudentPanelController@studentUpdate')->name('my-profile-update');

        // Route::post('student-update-photo/{id}', ['as' => 'student_update_pic', 'uses' => 'SmStudentAdmissionController@studentUpdatePic']);

        Route::get('student-dashboard',  'Student\SmStudentPanelController@studentProfile')->name('student-dashboard')->middleware('userRolePermission:1');

        Route::get('download-timeline-doc/{file_name}',  'Student\SmStudentPanelController@DownlodTimeline')->name('download-timeline-doc');



        // fees

        Route::get('student-fees', ['as' => 'student_fees', 'uses' => 'Student\SmFeesController@studentFees'])->middleware('userRolePermission:20');

        // Route::get('fees-payment-stripe/{fees_type}/{student_id}/{amount}', 'Student\SmFeesController@feesPaymentStripe');
        // Route::post('fees-payment-stripe-store', 'Student\SmFeesController@feesPaymentStripeStore');

        // online exam
        Route::get('student-online-exam', ['as' => 'student_online_exam', 'uses' => 'Student\SmOnlineExamController@studentOnlineExam'])->middleware('userRolePermission:46');
        Route::get('take-online-exam/{id}', ['as' => 'take_online_exam', 'uses' => 'Student\SmOnlineExamController@takeOnlineExam']);
        Route::post('student-online-exam-submit', ['as' => 'student_online_exam_submit', 'uses' => 'Student\SmOnlineExamController@studentOnlineExamSubmit']);

        Route::get('student_view_result', ['as' => 'student_view_result', 'uses' => 'Student\SmOnlineExamController@studentViewResult'])->middleware('userRolePermission:47');

        Route::get('student-answer-script/{exam_id}/{s_id}', ['as' => 'student_answer_script', 'uses' => 'Student\SmOnlineExamController@studentAnswerScript']);

        //class timetable
        Route::get('student-class-routine', ['as' => 'student_class_routine', 'uses' => 'Student\SmStudentPanelController@classRoutine'])->middleware('userRolePermission:22');


        //Student attendance
        Route::get('student-my-attendance', ['as' => 'student_my_attendance', 'uses' => 'Student\SmStudentPanelController@studentMyAttendance'])->middleware('userRolePermission:35');
        Route::post('student-my-attendance', ['as' => 'student_my_attendance', 'uses' => 'Student\SmStudentPanelController@studentMyAttendanceSearch']);

        Route::get('my-attendance/print/{month}/{year}/', 'Student\SmStudentPanelController@studentMyAttendancePrint')->name('my-attendance/print');


        //student Result
        Route::get('student-result', ['as' => 'student_result', 'uses' => 'Student\SmStudentPanelController@studentResult'])->middleware('userRolePermission:37');

        //student Exam Schedule
        Route::get('student-exam-schedule', ['as' => 'student_exam_schedule', 'uses' => 'Student\SmStudentPanelController@studentExamSchedule'])->middleware('userRolePermission:38');
        Route::any('student-exam-schedule-search', ['as' => 'student_exam_schedule_search', 'uses' => 'Student\SmStudentPanelController@studentExamScheduleSearch']);
        Route::any('student-exam-schedule/print', ['as' => 'exam_schedule_print', 'uses' => 'SmExamRoutineController@examSchedulePrint']);

        //student Homework
        Route::get('student-homework', ['as' => 'student_homework', 'uses' => 'Student\SmStudentPanelController@studentHomework'])->middleware('userRolePermission:23');

        Route::get('student-homework-view/{class_id}/{section_id}/{homework}', ['as' => 'student_homework_view', 'uses' => 'Student\SmStudentPanelController@studentHomeworkView']);

        Route::get('add-homework-content/{homework}', 'Student\SmStudentPanelController@addHomeworkContent')->name('add-homework-content');
        Route::post('upload-homework-content', 'Student\SmStudentPanelController@uploadHomeworkContent')->name('upload-homework-content');
        Route::get('deleteview-homework-content/{homework}', 'Student\SmStudentPanelController@deleteViewHomeworkContent')->name('deleteview-homework-content');
        Route::get('delete-homework-content/{homework}', 'Student\SmStudentPanelController@deleteHomeworkContent')->name('delete-homework-content');




        Route::get('evaluation-document/{file_name}', 'Student\SmStudentPanelController@DownlodDocument')->name('evaluation-document');


        // download center
        Route::get('student-assignment', ['as' => 'student_assignment', 'uses' => 'Student\SmStudentPanelController@studentAssignment'])->middleware('userRolePermission:27');

        Route::get('student-study-material', ['as' => 'student_study_material', 'uses' => 'Student\SmStudentPanelController@studentStudyMaterial'])->middleware('userRolePermission:29');

        Route::get('student-syllabus', ['as' => 'student_syllabus', 'uses' => 'Student\SmStudentPanelController@studentSyllabus'])->middleware('userRolePermission:31');
        Route::get('student-others-download', ['as' => 'student_others_download', 'uses' => 'Student\SmStudentPanelController@othersDownload'])->middleware('userRolePermission:33');
        Route::get('upload-content-student-view/{id}', 'Student\SmStudentPanelController@uploadContentView')->name('upload-content-student-view');

        Route::get('download-content-document/{file_name}', 'Student\SmStudentPanelController@DownlodContent')->name('download-content-document')->middleware('userRolePermission:28');


        //student Subject
        Route::get('student-subject', ['as' => 'student_subject', 'uses' => 'Student\SmStudentPanelController@studentSubject'])->middleware('userRolePermission:49');


        // online exam
        Route::get('student-answer-script/{exam_id}/{s_id}', ['as' => 'student_answer_script', 'uses' => 'Student\SmOnlineExamController@studentAnswerScript']);

        // transport route
        Route::get('student-transport', ['as' => 'student_transport', 'uses' => 'Student\SmStudentPanelController@studentTransport'])->middleware('userRolePermission:54');
        Route::get('student-transport-view-modal/{r_id}/{v_id}', ['as' => 'student_transport_view_modal', 'uses' => 'Student\SmStudentPanelController@studentTransportViewModal']);

        // Dormitory Rooms
        Route::get('student-dormitory', ['as' => 'student_dormitory', 'uses' => 'Student\SmStudentPanelController@studentDormitory'])->middleware('userRolePermission:55');
        // Student Library Book list
        Route::get('student-library', ['as' => 'student_library', 'uses' => 'Student\SmStudentPanelController@studentBookList'])->middleware('userRolePermission:52');
        // Student Library Book Issue
        Route::get('student-book-issue', ['as' => 'student_book_issue', 'uses' => 'Student\SmStudentPanelController@studentBookIssue'])->middleware('userRolePermission:53');
        // Student Noticeboard
        Route::get('student-noticeboard', ['as' => 'student_noticeboard', 'uses' => 'Student\SmStudentPanelController@studentNoticeboard'])->middleware('userRolePermission:48');
        // Student Teacher
        Route::get('student-teacher', ['as' => 'student_teacher', 'uses' => 'Student\SmStudentPanelController@studentTeacher'])->middleware('userRolePermission:50');
    });


    // Student leave

    Route::group(['middleware' => ['auth'], 'namespace' => 'Student'], function () {
        Route::get('student-apply-leave', 'SmStudentPanelController@leaveApply')->name('student-apply-leave')->middleware('userRolePermission:40');
        Route::post('student-leave-store', 'SmStudentPanelController@leaveStore')->name('student-leave-store')->middleware('userRolePermission:41');
        Route::get('student-leave-edit/{id}', 'SmStudentPanelController@studentLeaveEdit')->name('student-leave-edit')->middleware('userRolePermission:42');
        Route::get('student-pending-leave', 'SmStudentPanelController@pendingLeave')->name('student-pending-leave')->middleware('userRolePermission:44');
        Route::put('student-leave-update/{id}', 'SmStudentPanelController@update')->name('student-leave-update')->middleware('userRolePermission:42');
    });
});
Route::get('download-uploaded-content/{id}', 'Student\SmStudentPanelController@downloadHomeWorkContent')->name('download-uploaded-content');
Route::get('download-uploaded-content/{file_name}', function ($file_name = null) {

    $file = public_path() . '/uploads/homeworkcontent/' . $file_name;
    if (file_exists($file)) {
        return Response::download($file);
    }
});


Route::get('fees-payment-stripe/{fees_type}/{student_id}/{amount}', 'Student\SmFeesController@feesPaymentStripe')->name('fees-payment-stripe');
Route::post('fees-payment-stripe-store', 'Student\SmFeesController@feesPaymentStripeStore')->name('fees-payment-stripe-store');


// student bank cheque payment 
Route::get('fees-generate-modal-child/{amount}/{student_id}/{type}', 'Student\SmFeesController@feesGenerateModalChild')->name('fees-generate-modal-child');
Route::post('child-bank-slip-store', 'Student\SmFeesController@childBankSlipStore')->name('child-bank-slip-store');
Route::get('fees-generate-modal-child-view/{id}/{type_id}', 'Student\SmFeesController@feesGenerateModalBankView')->name('fees-generate-modal-child-view');
Route::post('child-bank-slip-delete', 'Student\SmFeesController@childBankSlipDelete');