<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Mark Sheet </title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head> 
<style>
    th{
        border: 2px solid black;
        text-align: center;
        padding: 5px !important;
        font-size: 10px;
        font-weight:300;
    }
    td{
        text-align: center;
        padding: 5px !important;
        font-size: 10px;
    }
    td.subject-name{
        text-align: left;
        padding-left: 10px !important;
    }
  

    .studentInfoTable{
        width: 100%;
        padding: 0px !important;
        font-weight:400;
    }

    .studentInfoTable td{
        padding: 0px !important;
        text-align: left;
    }
    h4{
        text-align: center !important;
    }
    h5{
        font-family: none !important;
    }
    .schoolname{
        font-family: none !important;
    }
    .table-bordered{
        border:1px solid #000 !important;
    }
    .table-bordered td{
        border:1px solid #000 !important;
    }
    .table-bordered th{
        border:1px solid #000 !important;
        font-weight:bold;
    }
    body{
        border:1px solid #000 !important;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
    }
    .pass_fail{
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
    }
</style>
 <body>

 
@php 
    $generalSetting= App\SmGeneralSettings::find(1);
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    }

@endphp

<div class="container-fluid"> 
    <table  style="width: 100%; border: 0px;"> 
            <tr > 
                <td style="width: 15%">
                    <img class="logo-img" src="{{ url('/')}}/{{$generalSetting->logo }}" alt="" width="65" style="margin-top: 5px">
                </td>
                <td style="text-align: center; width: 70%"> 
                    <span class="text-white schoolname" style="font-size: 18px;"> {{isset($school_name)?$school_name:'Infix School Management ERP'}} </span> 
                    <p class="text-white mb-0"> {{isset($address)?$address:'Infix School Address'}} </p>
                </td> 
                <td style="width: 15%">
                    @if(file_exists($student_detail->student_photo))
                    <img class="logo-img" src="{{ url('/')}}/{{$student_detail->student_photo }}" alt="" width="80" height="80"> 
                    @endif
                </td>
            </tr> 
    </table>
    <div class="container-fluid p-0"> 
        <div class="row">
            <div class="col-lg-12"> 
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="single-report-admit">
                            <div class="card"> 
                               
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-1 col-md-10">

                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <table class="studentInfoTable">
                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Name of Student :
                                                                    </td>
                                                                    <td>
                                                                        {{$student_detail->full_name}}
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                        <td class="font-weight-bold">
                                                                            Date of birth :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->date_of_birth != "" && $student_detail->date_of_birth != "1970-01-01"? App\SmGeneralSettings::DateConvater($student_detail->date_of_birth):''}}
                                                                        </td>
                                                                    </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Roll Number :
                                                                    </td>
                                                                    <td>
                                                                        {{$student_detail->roll_no}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Admission Number :
                                                                    </td>
                                                                    <td>
                                                                        {{$student_detail->admission_no}}
                                                                    </td>
                                                                </tr>


                                                            </table>
                                                        </td>
                                                        <td>
                                                            <table class="studentInfoTable">

                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Academic Session :
                                                                    </td>
                                                                    <td>
                                                                        {{@$student_detail->session->session}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Exam Title :
                                                                    </td>
                                                                    <td>
                                                                        {{$exam_details->title}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Academic Class :
                                                                    </td>
                                                                    <td>
                                                                        {{$class_name->class_name}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">
                                                                        Class Section :
                                                                    </td>
                                                                    <td>
                                                                        {{$section->section_name}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <table class="studentInfoTable">
                                                                <tr>
                                                                        <td class="font-weight-bold">
                                                                           Total Marks :
                                                                        </td>
                                                                        <td>

                                                                            {{$total_marks_by_student}}

                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Class Average :
                                                                        </td>
                                                                        <td>
                                                                           @if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2")
                                                                            {{number_format($total_marks_by_student/9, 2)}}

                                                                            @elseif($class_name->class_name == "SS 1")
                                                                            {{number_format($total_marks_by_student/13, 2)}}

                                                                            @else

                                                                           {{number_format($total_marks_by_student/count($subjects), 2)}}

                                                                           @endif

                                                                        </td>
                                                                    </tr> 
                                                                    
                                                                    
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                           Student Rating :
                                                                        </td>
                                                                        <td>



                                                                             @php
                                                                             if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2"){

                                                                                $per_subject = $total_marks_by_student/9;

                                                                             }elseif($class_name->class_name == "SS 1"){

                                                                                $per_subject = $total_marks_by_student/13;

                                                                             }else{

                                                                                $per_subject = $total_marks_by_student/count($subjects);

                                                                             }

                                                                                $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', round($per_subject)], ['percent_upto', '>=', round($per_subject)]])->first();

                                                                              

                                                                               echo $mark_grade->description;


                                                                            @endphp



                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                           Class Position :
                                                                        </td>
                                                                        <td>

                                                                            @php
                                                                            arsort($student_final_marks);

                                                                            $student_average = $total_marks_by_student/count($subjects);

                                                                            $final_position_array = [];
                                                                            foreach($student_final_marks as $student_final_mark){
                                                                                $final_position_array[] = $student_final_mark/count($subjects);
                                                                            }


                                                                            echo array_search($student_average,$final_position_array) + 1;

                                                                            @endphp


                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                        </div>
                                    </div>
                                    <h5 style="text-align: center; font-weight:bold">Marks Sheet of {{$exam_details->title}}</h5>

                                    <table class="w-100 mt-10 mb-10 table   table-bordered marksheet">


                                        <tr>
                                            <td width="70%" style="padding: 0px !important">

                                                <table class="w-100 table   table-bordered marksheet">

                                                    <thead>
                                                        <tr>
                                                           
                                                            <th rowspan="2" width="40%">Subjects</th>


                                                            <th colspan="3">Marks Obtained</th>

                                                            <th rowspan="2">Letter Grade</th>
                                                            <th rowspan="2">Grade Point</th>
                                                            <th rowspan="2">GPA</th>
                                                        </tr>
                                                        <tr>

                                                        @foreach($distributed_marks as $distributed_mark)
                                                                <th>{{$distributed_mark->exam_title}}<br>({{$distributed_mark->exam_mark}}%) </th>
                                                            @endforeach
                                                            <th>Total<br>(100%)</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                    @php $sum_gpa= 0;  $resultCount=1; $subject_count=1; $tota_grade_point=0; $this_student_failed=0; @endphp
                                                    @foreach($subjects as $data)
                                                        
                                                        <tr>
                                                            <td class="subject-name" width="40%">{{$data->subject->subject_name}} </td>
                                                            @php

                                                            $subject_count++;

                                                                $distribute_marks = \App\SmMarkStore::where('exam_term_id', $input['exam_id'])->where('class_id', $input['class_id'])->where('section_id', $input['section_id'])->where('subject_id', $data->subject_id)->where('student_id', $input['student_id'])->get();

                                                                @endphp
                                                                
                                                                @foreach($distribute_marks as $distribute_mark)
                                                                    <td>{{$distribute_mark->total_marks}}</td>
                                                                @endforeach

                                                            <td>
                                                                     {{$tola_mark_by_subject=App\SmAssignSubject::getSumMark($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id)}}
                                                            </td>
                                                            <td>

                                                                @php
                                                                    $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();

                                                                @endphp
                                                                {{$mark_grade->grade_name }}
                                                            </td>
                                                            <td>

                                                                @php
                                                                    $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();
                                                                    $tota_grade_point = $tota_grade_point + $mark_grade->gpa ;
                                                                    if($mark_grade->gpa<1){
                                                                        $this_student_failed =1;
                                                                    }
                                                                @endphp

                                                                {{$mark_grade->gpa }}
                                                            </td>
                                                            @if($subject_count==2)
                                                                <td rowspan="{{count($subjects)}}" style="vertical-align: middle">
                                                                    @php

                                                                        if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2"){

                                                                            $get_avarage = $total_marks_by_student/9;

                                                                         }elseif($class_name->class_name == "SS 1"){

                                                                            $get_avarage = $total_marks_by_student/13;

                                                                         }else{

                                                                            $get_avarage = $total_marks_by_student/count($subjects);

                                                                         }

                                                                        $final_gpa = App\SmMarksGrade::where([['percent_from', '<=', round($get_avarage)], ['percent_upto', '>=', round($get_avarage)]])->first();


                                                                        echo @$final_gpa->gpa;

                                                                        @endphp
                                                                </td>
                                                            @endif

                                                        </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                
                                            </td>
                                            <td width="30%" style="padding: 0px !important; margin: 0px !important; border: none !important; border-right: none !important;">

                                                <table class="w-100 table   table-bordered marksheet principal-signature" style="padding: 0px !important; margin: 0px !important; border-bottom: none !important; border-left: none !important;">
                                                    <tr>
                                                        <th colspan="4">GRADING SYSTEM</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Letter Grade</th>
                                                        <th>GPA</th>
                                                        <th>Score Range</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                    @foreach($marks_grades as $marks_grade)
                                                    <tr>
                                                        <td>{{$marks_grade->grade_name}}</td>
                                                        <td>{{$marks_grade->gpa}}</td>
                                                        <td>{{$marks_grade->percent_from .'-'. $marks_grade->percent_upto}}</td>
                                                        <td>{{$marks_grade->description}}</td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                    <tr>
                                                        <td colspan="4">DECISION</td>
                                                    </tr> 

                                                    <tr>
                                                        <td colspan="4" height="40" style="margin: 0px !important; border-bottom: none !important; border-right: none !important; font-size: 30px; ">
                                                            @php

                                                            if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2"){
                                                                $average_mark = $total_marks_by_student/9;
                                                             }elseif($class_name->class_name == "SS 1"){
                                                                $average_mark = $total_marks_by_student/13;
                                                             }else{
                                                                $average_mark = $total_marks_by_student/count($subjects);
                                                             }

                                                            @endphp

                                                            @if($general_setting->exam_pass_mark <= $average_mark)

                                                            <span class="pass_fail"><strong>PASS</strong></span>
                                                            @else
                                                            <span class="pass_fail"><strong>FAIL</strong></span>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                </table>



                                                
                                            </td>
                                        </tr>


                                    </table>
                                    <table class="w-100 mt-40 mb-20 table   table-bordered marksheet">
                                        <tr>
                                            <th width="20%">Teacher's Comment :</th>
                                            <td width="80%" style="text-align: left"> {{$teacher_comment}}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Principal's Comment :</th>
                                            <td width="80%" style="text-align: left">{{$principal_comment}}</td>
                                        </tr>
                                    </table>
                                    
                                    <table class="w-100 mt-40 mb-20 table   table-bordered marksheet">
                                       <tr>
                                            <td></td>
                                            <td></td>
                                            <td>PRINCIPAL’S SIGNATURE/STAMP</td>
                                       </tr>
                                        <tr>
                                            <td width="20%">
                                                @if(file_exists($student_detail->student_photo))
                                                <img class="logo-img" src="{{ url('/')}}/{{$student_detail->student_photo }}" alt="" width="90" height="90"> 
                                                @endif
                                            </td>
                                            <td width="50%">
                                                
                                            </td>
                                            <td width="30%" >
                                                <img class="logo-img" src="{{ asset('public/backEnd/output-onlinepngtools (1).png') }}" alt="" width="80" height="80">
                                                <img class="logo-img" src="{{ asset('public/backEnd/output-onlinepngtools.png') }}" alt="" width="90" height="90" style="padding-top: 10px;">
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <!-- <div class="row">
                                        <div class="col-lg-12">
                                            <p class="footer-p">Teacher's Comment : {{$teacher_comment}}</p>
                                            
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="footer-p">Principal's Comment : {{$principal_comment}}</p>
                                            
                                        </div>
                                    </div>  -->

               


                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
 
</div>
 
           
</section>
</body>
</html>
