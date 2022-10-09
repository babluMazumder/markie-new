<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use DB;
use PDF;
use Validator;
use App\SmExam;
use App\SmClass;
use App\SmSection;
use App\SmStudent;
use App\SmSubject;
use App\SmExamType;
use App\SmSeatPlan;
use App\SmCLassRoom;
use App\SmClassTime;
use App\SmExamSetup;
use App\SmMarkStore;
use App\SmMarksGrade;
use App\ApiBaseMethod;
use App\SmResultStore;
use App\SmExamSchedule;
use App\SmAssignSubject;
use App\SmMarksRegister;
use App\SmSeatPlanChild;
use App\SmExamAttendance;
use Illuminate\Http\Request;
use App\SmMarksRegisterChild;
use App\SmTemporaryMeritlist;
use App\SmExamAttendanceChild;
use App\SmExamScheduleSubject;
use Brian2694\Toastr\Facades\Toastr;
use App\SmGeneralSettings;
use Auth;

class ResultController extends Controller
{
    public function markSheetStudent(Request $request)
    {
        $exams = SmExamType::where('active_status', 1)->get();
        $classes = SmClass::where('active_status', 1)->get();

        
        return view('backEnd.studentPanel.mark_sheet_report_student', compact('exams', 'classes'));
    }
    
    public function markSheetStudentSearch(Request $request)
    {

        $request->validate([
            'exam' => 'required',
            'class' => 'required',
            'section' => 'required'
        ]);

        $input['exam_id'] = $request->exam;
        $input['class_id'] = $request->class;
        $input['section_id'] = $request->section;
        $input['student_id'] = Auth::user()->student->id;


   

        $exams = SmExamType::where('active_status', 1)->get();
        $classes        =   SmClass::where('active_status', 1)->get();
        $exam_types     =   SmExamType::where('active_status', 1)->get();

        $subjects = SmAssignSubject::where([['class_id', $request->class], ['section_id', $request->section]])->get();
        $student_detail =   $studentDetails = SmStudent::find($input['student_id']);
        $section        =   SmSection::where('active_status', 1)->where('id',$request->section)->first();
        $section_id     =   $request->section;
        $class_id       =   $request->class;
        $class_name     =   SmClass::find($class_id);
        $exam_type_id   =   $request->exam;
        $student_id     =   $request->student;
        $exam_details     =   SmExamType::where('active_status', 1)->find($exam_type_id);








        $is_result_available = SmResultStore::where([['class_id', $request->class], ['exam_type_id', $request->exam], ['section_id', $request->section], ['student_id', $input['student_id']]])->get();

        $students = SmStudent::where('class_id', $request->class)->where('section_id', $request->section)->get();


        $sub_id_for_distribute = "";

        foreach ($subjects as $subject) {

            $sub_id_for_distribute = $subject->subject_id;


            // $mark_sheet = SmResultStore::where([['class_id', $request->class], ['exam_type_id', $request->exam], ['section_id', $request->section], ['student_id', $request->student]])->where('subject_id', $subject->subject_id)->first();
            
            // if ($mark_sheet == "") {
            //     Toastr::error('Ops! Your result is not found! Please check mark register', 'Failed');
            //     return redirect('mark-sheet-report-student');
            // }

        }




        $student_final_marks = [];

        foreach($students as $student){

            $subject_mark = SmResultStore::where('class_id', $request->class)->where('section_id', $request->section)->where('exam_type_id', $request->exam)->where('student_id', $student->id)->sum('total_marks');

            $student_final_marks[] = $subject_mark;

        }



        $total_marks_by_student = SmResultStore::where('class_id', $request->class)->where('section_id', $request->section)->where('exam_type_id', $request->exam)->where('student_id', $input['student_id'])->sum('total_marks');


        $distributed_marks = SmExamSetup::where('exam_term_id', $request->exam)->where('class_id', $request->class)->where('section_id', $request->section)->where('subject_id', $sub_id_for_distribute)->get();


        if ($is_result_available->count() > 0) {



            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['exam_types'] = $exam_types->toArray();
                $data['classes'] = $classes->toArray();
                $data['studentDetails'] = $studentDetails;
                $data['exams'] = $exams->toArray(); 
                $data['subjects'] = $subjects->toArray(); 
                $data['section'] = $section; 
                $data['class_id'] = $class_id;
                $data['student_detail'] = $student_detail;
                $data['is_result_available'] = $is_result_available;
                $data['exam_type_id'] = $exam_type_id;
                $data['section_id'] = $section_id;
                $data['student_id'] = $student_id;
                $data['exam_details'] = $exam_details;
                $data['class_name'] = $class_name;
                return ApiBaseMethod::sendResponse($data, null);
            }
        $student = $student_id;
            return view('backEnd.studentPanel.mark_sheet_report_student', compact('exam_types', 'classes', 'studentDetails', 'exams', 'classes', 'subjects', 'section', 'class_id', 'student_detail', 'is_result_available', 'exam_type_id', 'section_id', 'student_id', 'exam_details', 'class_name','input', 'distributed_marks', 'student_final_marks', 'total_marks_by_student'));
        } else {

            Toastr::error('Ops! Your result is not found! Please check mark register', 'Failed');
            return redirect('mark-sheet-report-student');
        }


            dd('cxd');



        $marks_register = SmMarksRegister::where('exam_id', $request->exam)->where('student_id', $input['student_id'])->first();


        $student_detail = SmStudent::where('id', $input['student_id'])->first();
        $subjects = SmAssignSubject::where('class_id', $request->class)->where('section_id', $request->section)->get();
        $exams = SmExamType::where('active_status', 1)->get();
        $classes = SmClass::where('active_status', 1)->get();
        $grades = SmMarksGrade::where('active_status', 1)->get();
        $class = SmClass::find($request->class);
        $section = SmSection::find($request->section);
        $exam_detail = SmExam::find($request->exam);
        $exam_id = $request->exam;
        $class_id = $request->class; 
         
        return view('backEnd.studentPanel.mark_sheet_report_student', compact('exam_types', 'classes', 'studentDetails', 'exams', 'classes', 'marks_register', 'subjects', 'class', 'section', 'exam_detail', 'grades', 'exam_id', 'class_id', 'student_detail','input', 'distributed_marks'), 'student_final_marks', 'total_marks_by_student');
    }

    public function markSheetStudentPrint(Request $request)
    {

        $input['exam_id'] = $request->exam;
        $input['class_id'] = $request->class;
        $input['section_id'] = $request->section;
        $input['student_id'] = $request->student;
 


        $exams = SmExamType::where('active_status', 1)->get();
        $classes        =   SmClass::where('active_status', 1)->get();
        $exam_types     =   SmExamType::where('active_status', 1)->get();

        $subjects = SmAssignSubject::where([['class_id', $request->class], ['section_id', $request->section]])->get();
        $student_detail =   $studentDetails = SmStudent::find($request->student);
        $section        =   SmSection::where('active_status', 1)->where('id',$request->section)->first();
        $section_id     =   $request->section;
        $class_id       =   $request->class;
        $class_name     =   SmClass::find($class_id);
        $exam_type_id   =   $request->exam;
        $student_id     =   $request->student;
        $exam_details     =   SmExamType::where('active_status', 1)->find($exam_type_id);
        $marks_grades     =   SmMarksGrade::where('active_status', 1)->orderBy('gpa', 'desc')->get();



        $is_result_available = SmResultStore::where([['class_id', $request->class], ['exam_type_id', $request->exam], ['section_id', $request->section], ['student_id', $request->student]])->get();


        $students = SmStudent::where('class_id', $request->class)->where('section_id', $request->section)->get();


        $sub_id_for_distribute = "";

        foreach ($subjects as $subject) {

            $sub_id_for_distribute = $subject->subject_id;

        }


        $general_setting = SmGeneralSettings::find(1);
   


        $student_final_marks = [];

        foreach($students as $student){

            $subject_mark = SmResultStore::where('class_id', $request->class)->where('section_id', $request->section)->where('exam_type_id', $request->exam)->where('student_id', $student->id)->sum('total_marks');

            $student_final_marks[] = $subject_mark;

        }

        $total_marks_by_student = SmResultStore::where('class_id', $request->class)->where('section_id', $request->section)->where('exam_type_id', $request->exam)->where('student_id', $request->student)->sum('total_marks');

        $distributed_marks = SmExamSetup::where('exam_term_id', $request->exam)->where('class_id', $request->class)->where('section_id', $request->section)->where('subject_id', $sub_id_for_distribute)->get();




        if ($is_result_available->count() > 0) {  

            // ->setPaper($customPaper,'portrait');
            // ->setPaper($customPaper, 'landscape');
        $customPaper = array(0,0,700.00,1000.80);
        $pdf = PDF::loadView('backEnd.studentPanel.mark_sheet_report_print', 
            [
                'exam_types' => $exam_types, 
                'classes' => $classes,    
                'subjects' => $subjects, 
                'class' => $class_id, 
                'class_name' => $class_name,
                'section' => $section, 
                'exams' => $exams,  
                'section_id' => $section_id, 
                'exam_type_id' => $exam_type_id, 
                'is_result_available' => $is_result_available, 
                'student_detail' => $student_detail, 
                'class_id' => $class_id, 
                'studentDetails' => $studentDetails,
                'student_id' => $student_id,
                'exam_details' => $exam_details,
                'total_marks_by_student' => $total_marks_by_student,
                'student_final_marks' => $student_final_marks,
                'distributed_marks' => $distributed_marks,
                'input' => $input,
                'marks_grades' => $marks_grades,
                'marks_grades' => $marks_grades,
                'teacher_comment' => $request->teacher_comment,
                'principal_comment' => $request->principal_comment,
                'general_setting' => $general_setting

            ])->setPaper('A4','portrait');
        return $pdf->stream('marks-sheet-of-'.$student_detail->full_name.'.pdf');

        }  


 
    }
}
