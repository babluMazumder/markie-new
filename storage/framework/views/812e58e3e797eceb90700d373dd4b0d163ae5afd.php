<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabulation Sheet </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/print/bootstrap.min.css"/>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap.min.js"></script>
</head>
<style>
    table.tabluationsheet {
        width: 100%;
    }

    .tabluationsheet th, .tabluationsheet td {
        border: 1px solid #ddd;
        font-size: 11px;
        padding: 5px;
    }



    .tabluationsheet td {
        text-align: center;
    }

    body {
        padding: 0;
        font-family: "Poppins", sans-serif; 

        margin-top: 35px;
    }

    html {
        padding: 0px;
        margin: 0px;
        font-family: "Poppins", sans-serif; 


    }

    .container-fluid {
        padding-bottom: 50px;
    }

    h1, h2, h3, h4 {

        font-family: "Poppins", sans-serif;
        font-weight: 400;
        margin-bottom: 15px;
    }

    .gradeChart tbody td{
        padding: 0;
        border-collapse: 1px solid #ddd;
    }
    table.gradeChart{
        padding: 0px;
        margin: 0px;
        width: 60%;
        text-align: right; 
    }
    table.gradeChart thead th{
        border: 1px solid #000000;
        border-collapse: collapse;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
        font-size: 9px;
    }
    table.gradeChart tbody td{
        border: 1px solid #000000;
        border-collapse: collapse;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
        font-size: 9px;
    }
    hr{
        margin: 0px;
    }
    .tabulation th{
        vertical-align: middle;
        text-align: center;
        font-size: 9px;
    }
    .tabulation td{
        font-size: 9px;
        padding: 0px !important;
        text-align: center
    }
</style>
<body>


<?php
    $generalSetting= App\SmGeneralSettings::find(1);
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    }


?>

<div class="container-fluid">
    <table class="table" style="width: 100%; table-layout: fixed">
        <thead>
        <tr>

            <th class="" style="vertical-align: middle; ">
                <img class="logo-img" src="<?php echo e(url('/')); ?>/<?php echo e(generalSetting()->logo); ?>" alt="">
            </th>
            <th class="text-left">

                <h3 class="exam_title text-left text-capitalize"><?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                <h4 class="exam_title text-left text-capitalize"><?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Adress'); ?> </h4>
                <h4 class="exam_title text-left text-uppercase"> tabulation sheet
                    of <?php echo e($tabulation_details['exam_term']); ?> in <?php echo e(date('Y')); ?></h4>
            </th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>


                            <?php if(@$tabulation_details['student_name']): ?>
                                <?php if(@$tabulation_details['student_name']): ?>
                                    <p class="student_name">
                                        <b><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.name'); ?> </b> <?php echo e($tabulation_details['student_name']); ?>

                                    </p>
                                <?php endif; ?>
                                <?php if(@$tabulation_details['student_roll']): ?>
                                    <p class="student_name">
                                        <b><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.roll'); ?> </b> <?php echo e($tabulation_details['student_roll']); ?>

                                    </p>
                                <?php endif; ?>
                                <?php if(@$tabulation_details['student_admission_no']): ?>
                                    <p class="student_name">
                                        <b><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.admission'); ?> </b> <?php echo e($tabulation_details['student_admission_no']); ?>

                                    </p>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php $__currentLoopData = $tabulation_details['subject_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="subject-list"><?php echo e($d); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>
                        </td>
                        <td>

                            <?php if(@$tabulation_details['student_class']): ?>
                                <p class="student_name">
                                    <b><?php echo app('translator')->get('lang.class'); ?>  </b> <?php echo e($tabulation_details['student_class']); ?>

                                </p>
                            <?php endif; ?>
                            <?php if(@$tabulation_details['student_section']): ?>
                                <p class="student_name">
                                    <b><?php echo app('translator')->get('lang.section'); ?> </b> <?php echo e($tabulation_details['student_section']); ?>

                                </p>
                            <?php endif; ?>
                            <?php if(@$tabulation_details['student_admission_no']): ?>
                                <p class="student_name">
                                    <b> <?php echo app('translator')->get('lang.exam'); ?> </b> <?php echo e($tabulation_details['exam_term']); ?>

                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <?php if(@$tabulation_details): ?>
                    <table class="table gradeChart table-bordered" id="grade_table">
                        <thead>
                        <tr>
                            <th>Staring</th>
                            <th>Ending</th>
                            <th>GPA</th>
                            <th>Grade</th>
                            <th>Evalution</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $tabulation_details['grade_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($d['start']); ?></td>
                                <td><?php echo e($d['end']); ?></td>
                                <td><?php echo e($d['gpa']); ?></td>
                                <td><?php echo e($d['grade_name']); ?></td>
                                <td class="text-left"><?php echo e($d['description']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>

            </td>
        </tr>
        </tbody>
    </table>


    <h3 style="width: 100%; text-align: center; border-bottom: 1px solid #ddd; padding: 10px;">Tabulation Sheet</h3>

    <table class="mt-30 mb-20 table table-striped table-bordered tabulation"  style="width: 100%; table-layout: fixed">
        <thead>
        <tr>
            <th rowspan="2"><?php echo app('translator')->get('lang.sl'); ?></th>
            <th rowspan="2"><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
            <th rowspan="2">Ad.  <?php echo app('translator')->get('lang.no'); ?></th>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $subject_ID     = $subject->subject_id;
                    $subject_Name   = $subject->subject->subject_name;
                    $mark_parts      = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                ?>
                <th colspan="<?php echo e(count($mark_parts)+2); ?>" class="subject-list"> <?php echo e($subject_Name); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <th rowspan="2"><?php echo app('translator')->get('lang.total_mark'); ?></th>
           
            <?php if($optional_subject_setup!=''): ?>
            <th ><?php echo app('translator')->get('lang.gpa'); ?></th>
            <th rowspan="2" ><?php echo app('translator')->get('lang.gpa'); ?></th>
            <th rowspan="2"><?php echo app('translator')->get('lang.result'); ?></th>
            <?php else: ?>
            <th ><?php echo app('translator')->get('lang.gpa'); ?></th>
            <th rowspan="2"><?php echo app('translator')->get('lang.result'); ?></th>
            <?php endif; ?>
           
       
        </tr>
        <tr>

            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $subject_ID     = $subject->subject_id;
                    $subject_Name   = $subject->subject->subject_name;
                    $mark_parts     = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                ?>

                <?php $__currentLoopData = $mark_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sigle_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($sigle_part->exam_title); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo app('translator')->get('lang.total'); ?></th>
                <th><?php echo app('translator')->get('lang.gpa'); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($optional_subject_setup!=''): ?>

            <th> <small>Without Additional</small> </th>
           

            <?php endif; ?>
            
            
        </tr>
        </thead>
        <tbody>
        <?php  $count=1;  ?>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $this_student_failed=0; $tota_grade_point= 0; $tota_grade_point_main= 0; $marks_by_students = 0; ?>
                <?php
                    $optional_subject=App\SmOptionalSubjectAssign::where('student_id','=',$student->id)->where('session_id','=',$student->session_id)->first();
                ?>
            <tr>
                <td><?php echo e($count++); ?></td>
                <td width='10%'> <?php echo e($student->full_name); ?></td>
                <td> <?php echo e($student->admission_no); ?></td>

                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                            $subject_ID     = $subject->subject_id;
                            $subject_Name   = $subject->subject->subject_name;
                            $mark_parts     = App\SmAssignSubject::getMarksOfPart($student->id, $subject_ID, $class_id, $section_id, $exam_term_id);
                          
                            $optional_subject_marks=DB::table('sm_optional_subject_assigns')
                            ->join('sm_mark_stores','sm_mark_stores.subject_id','=','sm_optional_subject_assigns.subject_id')
                            ->where('sm_optional_subject_assigns.student_id','=',$student->id)
                            ->first();

                    ?>
                    
                    <?php $__currentLoopData = $mark_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sigle_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="total"><?php echo e($sigle_part->total_marks); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td class="total">
                        <?php
                            $tola_mark_by_subject = App\SmAssignSubject::getSumMark($student->id, $subject_ID, $class_id, $section_id, $exam_term_id);
                            $marks_by_students  = $marks_by_students + $tola_mark_by_subject;
                        ?>
                        <?php echo e($tola_mark_by_subject); ?>

                    </td>
                    <td>
                        <?php
                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();
                            
                            $mark_grade_gpa=0;
                            $optional_setup_gpa=0;
                            if (@$optional_subject->subject_id==$subject_ID) {
                                $optional_setup_gpa=$optional_subject_setup->gpa_above;
                                if ($mark_grade->gpa >$optional_setup_gpa) {
                                    $mark_grade_gpa = $mark_grade->gpa-$optional_setup_gpa;
                                    $tota_grade_point = $tota_grade_point + $mark_grade_gpa;

                                    $tota_grade_point_main = $tota_grade_point_main + $mark_grade->gpa;
                                   
                                } else {
                                    $tota_grade_point = $tota_grade_point + $mark_grade_gpa;
                                    $tota_grade_point_main = $tota_grade_point_main + $mark_grade->gpa;
                                }
                            } else {
                                $tota_grade_point = $tota_grade_point + $mark_grade->gpa ;
                                if($mark_grade->gpa<1){
                                    $this_student_failed =1;
                                }
                                $tota_grade_point_main = $tota_grade_point_main + $mark_grade->gpa;
                            }



                        ?>



                            <?php if(@$optional_subject->subject_id==$subject_ID): ?>
                                
                               
                                    
                                    <?php echo e(@$mark_grade_gpa); ?>

                                    <hr>
                                    (GPA above <?php echo e($optional_setup_gpa); ?>)
                                <?php else: ?>
                                    <?php echo e(@$mark_grade->gpa); ?>

                                <?php endif; ?>
                    </td>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($marks_by_students); ?>

                    <?php $marks_by_students = 0; ?>
                </td>
                
                <?php if($optional_subject_setup!=''): ?>
                     
                
                    

                     



                    <td>
                        
                            <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                0.00
                            <?php else: ?>
                            
                            <?php
                            $subject_count=0;
                            if (@$optional_subject!='') {
                                $subject_count=count($subjects);
                                    if(!empty($tota_grade_point_main)){
                                        $number = number_format($tota_grade_point_main/ $subject_count, 2, '.', '');
                                    }else{
                                        $number = 0;
                                    }
                            } else{
                                $subject_count=count($subjects);
                                    if(!empty($tota_grade_point_main)){
                                        $number = number_format($tota_grade_point_main/ $subject_count, 2, '.', '');
                                    }else{
                                        $number = 0;
                                    }
                            }
                            // ===========
                              
                            ?> 
                            
                                <?php echo e($number==0?'0.00':$number); ?> 
                                <?php 
                                    $tota_grade_point_main= 0; 
                                ?>
                            <?php endif; ?>
                           
                        </td>
                        <td>
                    
                            <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                0.00
                            <?php else: ?>
                            
                            <?php
                            $subject_count=0;
                            if (@$optional_subject!='') {
                                $subject_count=count($subjects)-1;
                                    if(!empty($tota_grade_point)){
                                        $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                    }else{
                                        $number = 0;
                                    }
                            } else{
                                $subject_count=count($subjects);
                                    if(!empty($tota_grade_point)){
                                        $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                    }else{
                                        $number = 0;
                                    }
                            }
                            // ===========
                               
                            ?>    
                           

                                <?php echo e($number==0?'0.00':$number); ?> <?php $tota_grade_point= 0; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                <span class="text-warning font-weight-bold">F</span>
                            <?php else: ?>
                                <?php
                                $mark_grade = App\SmMarksGrade::where([['from', '<=', $number], ['up', '>=', $number]])->first();
                                ?>
                                <?php echo e(@$mark_grade->grade_name); ?>

                             <?php endif; ?>
                        </td>
                <?php else: ?>
                <td>
                    
                        <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                            0.00
                        <?php else: ?>
                        
                        <?php
                        $subject_count=0;
                        if (@$optional_subject!='') {
                            $subject_count=count($subjects)-1;
                                if(!empty($tota_grade_point)){
                                    $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                }else{
                                    $number = 0;
                                }
                        } else{
                            $subject_count=count($subjects);
                                if(!empty($tota_grade_point)){
                                    $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                }else{
                                    $number = 0;
                                }
                        }
                        // ===========
                           
                        ?>    
                       

                            <?php echo e($number==0?'0.00':$number); ?> <?php $tota_grade_point= 0; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                            <span class="text-warning font-weight-bold">F</span>
                        <?php else: ?>
                            <?php
                            $mark_grade = App\SmMarksGrade::where([['from', '<=', $number], ['up', '>=', $number]])->first();
                            ?>
                            <?php echo e(@$mark_grade->grade_name); ?>

                         <?php endif; ?>


                    </td>

                <?php endif; ?>
               
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <table style="width:100%">
            <tr> 
                <td> 
                    <p style="padding-top:10px; text-align:right; float:right; border-top:1px solid #ddd; display:inline-block; margin-top:50px;">( Exam Controller )</p> 
                </td>
            </tr>

        </table>
       
               
</div>
</body>
</html><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/reports/tabulation_sheet_report_print.blade.php ENDPATH**/ ?>