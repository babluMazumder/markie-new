
<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    .single-report-admit table tr th {

    border: 1px solid #a2a8c5 !important;
    vertical-align: middle;
}
    .single-report-admit table tr td {
        
    border: 1px solid #a2a8c5 !important;
}

    #grade_table th{
        border: 1px solid black;
        text-align: center;
        background: #351681;
        color: white;
    }
    #grade_table td{
        color: black;
        text-align: center !important;
        border: 1px solid black;
    }

hr{
    margin:0;
}
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.progress_card_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.progress_card_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area mb-40">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success') != ""): ?>
                    <?php if(session()->has('message-success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message-success')); ?>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                 <?php if(session()->has('message-danger') != ""): ?>
                    <?php if(session()->has('message-danger')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('message-danger')); ?>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress_card_report', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-4 mt-30-md md_mb_20">
                                <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('lang.select_class'); ?> *" value=""><?php echo app('translator')->get('lang.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('class')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *" value=""><?php echo app('translator')->get('lang.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_student_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('lang.select_student'); ?> *" value=""><?php echo app('translator')->get('lang.select_student'); ?> *</option>
                                </select>
                                <?php if($errors->has('student')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('student')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search"></span>
                                    <?php echo app('translator')->get('lang.search'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
</section>

<?php if(isset($is_result_available)): ?>
<?php 
$generalSetting = generalSetting();
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
        $email =$generalSetting->email; 
?>
    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.progress_card_report'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-8 pull-right mt-0">

                        <div class="print_button pull-right">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress-card/print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student', 'target' => '_blank'])); ?>


                            <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                            <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                            <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                            
                            
                            <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"> </i> <?php echo app('translator')->get('lang.print'); ?>
                            </button>
                           <?php echo e(Form::close()); ?>

                        </div>

                    </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="single-report-admit">
                                    <div class="card">
                                            <div class="card-header">
                                                    <div class="d-flex">
                                                           
                                                            <div class="col-lg-2">
                                                            <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="">
                                                            </div>
                                                            <div class="col-lg-6 ml-30">
                                                                <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                                                                <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                                <p class="text-white mb-0">Email:  <?php echo e(isset($email)?$email:'admin@demo.com'); ?> ,   Phone:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'admin@demo.com'); ?> </p> 
                                                            </div>
                                                            <div class="offset-2">
                
                                                            </div>
                                                        </div>
                                                <div>
                                                    <img class="report-admit-img"  src="<?php echo e(file_exists(@$studentDetails->student_photo) ? asset($studentDetails->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>" width="100" height="100" alt="<?php echo e(asset($studentDetails->student_photo)); ?>">
                                                </div>
                                                
                                                
                                            </div>
                                        <div class="card-body">
                                                <div class="row">
                                                
                                                        <div class="col-lg-8 text-black"> 
                                                            <h3 style="border-bottm:1px solid #ddd; padding: 15px; text-align:center"> <?php echo app('translator')->get('lang.student_information'); ?></h3>

                                                            <h3><?php echo e($studentDetails->full_name); ?></h3>
                                                            
                                                            <div class="row">

                                                                <div class="col-lg-3">
                                                                    <p class="mb-0">
                                                                        <?php echo app('translator')->get('lang.academic_year'); ?> : <span class="primary-color fw-500"><?php echo e(generalSetting()->session_year); ?></span>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                            <?php echo app('translator')->get('lang.roll'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->roll_no); ?></span>
                                                                        </p>
                                                                    
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <p class="mb-0">
                                                                        <?php echo app('translator')->get('lang.class'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->class_name); ?></span>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                            <?php echo app('translator')->get('lang.admission'); ?> <?php echo app('translator')->get('lang.no'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->admission_no); ?></span>
                                                                        </p>
                                                                    

                                                                    
                                                                </div>

                                                                <div class="col-lg-3">
                                                                        <p class="mb-0">
                                                                                <?php echo app('translator')->get('lang.section'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->section_name); ?></span>
                                                                            </p>
                                                            
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 text-black"> 
                                                            <?php $marks_grade=DB::table('sm_marks_grades')->where('academic_id', getAcademicId())->get(); ?>
                                                                <?php if(@$marks_grade): ?>
                                                                <table class="table  table-bordered table-striped text-black" id="grade_table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th><?php echo app('translator')->get('lang.staring'); ?></th>
                                                                    <th><?php echo app('translator')->get('lang.ending'); ?></th>
                                                                    <th><?php echo app('translator')->get('lang.gpa'); ?></th>
                                                                    <th><?php echo app('translator')->get('lang.grade'); ?></th>
                                                                    <th><?php echo app('translator')->get('lang.evalution'); ?></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                            
                                                                    <?php $__currentLoopData = $marks_grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <td><?php echo e($grade_d->percent_from); ?></td>
                                                                            <td><?php echo e($grade_d->percent_upto); ?></td>
                                                                            <td><?php echo e($grade_d->gpa); ?></td>
                                                                            <td><?php echo e($grade_d->grade_name); ?></td>
                                                                            <td class="text-left"><?php echo e($grade_d->description); ?></td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php endif; ?>
                                            
                                                        </div>
        
                                                    </div>
                                            <div>
                                                    
                                            </div>


                                            <table class="w-100 mt-30 mb-20 table table-bordered">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th rowspan="2"><?php echo app('translator')->get('lang.subjects'); ?></th>
                                                        <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $exam_type = App\SmExamType::examType($assinged_exam_type);
                                                        ?>
                                                            <th colspan="2" style="text-align: center;"><?php echo e($exam_type->title); ?></th>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <th rowspan="2"><?php echo app('translator')->get('lang.total'); ?></th>
                                                        
                                                        <th rowspan="2"><?php echo app('translator')->get('lang.gpa'); ?></th>

                                                    </tr>
                                                <tr  style="text-align: center;">
                                                    <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                        <th><?php echo app('translator')->get('lang.marks'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.grade'); ?></th>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                        $total_fail = 0;
                                                        $total_marks = 0;
                                                        $gpa_with_optional_count=0;
                                                        $gpa_without_optional_count=0;
                                                    ?>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr style="text-align: center">

                                                        <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                <?php if($student_optional_subject->subject_id==$data->subject->id): ?>
                                                                <td>
                                                                    <?php echo e($data->subject !=""?$data->subject->subject_name:""); ?> (<?php echo app('translator')->get('lang.optional'); ?>) 
                                                                </td>
                                                            <?php else: ?>
                                                                <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?> </td>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                        <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?> </td>
                                                        <?php endif; ?>
                                                               

                                                        <?php
                                                            $totalSumSub= 0;
                                                            $totalSubjectFail= 0;
                                                            $TotalSum= 0;
                                                        foreach($assinged_exam_types as $assinged_exam_type){

                                                            $mark_parts     =   App\SmAssignSubject::getNumberOfPart($data->subject_id, $class_id, $section_id, $assinged_exam_type);

                                                            $result         =   App\SmResultStore::GetResultBySubjectId($class_id, $section_id, $data->subject_id,$assinged_exam_type ,$student_id);
                                                            if(!empty($result)){
                                                                $final_results = App\SmResultStore::GetFinalResultBySubjectId($class_id, $section_id, $data->subject_id,$assinged_exam_type ,$student_id);

                                                            }

                                                            if($result->count()>0){
                                                                ?>
                                                                    <td>
                                                                    <?php

                                                                        if($final_results != ""){
                                                                            echo $final_results->total_marks;
                                                                            $totalSumSub = $totalSumSub + $final_results->total_marks;
                                                                            $total_marks = $total_marks + $final_results->total_marks;

                                                                        }else{
                                                                            echo 0;
                                                                        }

                                                                    ?>
                                                                </td>
                                                                
                                                                    <td>
                                                                        <?php

                                                                            if($final_results != ""){
                                                                                if($final_results->total_gpa_grade == "F"){
                                                                                    $totalSubjectFail++;
                                                                                    $total_fail++;
                                                                                }
                                                                                echo $final_results->total_gpa_grade;
                                                                            }else{
                                                                                echo '-';
                                                                            }
                                                                            
                                                                            if ($student_optional_subject!='') {
                                                                                    if ($student_optional_subject->subject_id==$data->subject->id) {
                                                                                        $optional_subject_mark=$final_results->total_marks;
                                                                                        // echo $final_results->total_marks;
                                                                                    }
                                                                            }

                                                                        ?>
                                                                    </td>
                                                        <?php
                                                                }else{ ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                <?php

                                                                }
                                                                    }
                                                                ?>

                                                                <td><?php echo e($totalSumSub); ?></td>
                                                              
                                                                    <?php
                                                                        if($totalSubjectFail > 0){
                                                                           
                                                                        }else{
                                                                            $totalSumSub = $totalSumSub / count($assinged_exam_types);

                                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', floor($totalSumSub)], ['percent_upto', '>=', floor($totalSumSub)]])->first();


                                                                           
                                                                        }
                                                                    ?>

                                                                <td>
                                                                    
                                                                    <?php
                                                                        if($totalSubjectFail > 0){
                                                                            echo 'F';
                                                                        }else{
                                                                            if ($student_optional_subject!='') {
                                                                                if (@$student_optional_subject->subject_id==$data->subject->id) {
                                                                                $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', floor($totalSumSub)], ['percent_upto', '>=', floor($totalSumSub)]])->first();
                                                                                
                                                                                if ($mark_grade->gpa > $optional_subject_setup->gpa_above) {
                                                                                   echo "GPA Above ".$optional_subject_setup->gpa_above;
                                                                                   echo "<hr>";
                                                                                   echo $mark_grade->gpa - $optional_subject_setup->gpa_above;
                                                                                   $optional_show_gpa=$mark_grade->gpa - $optional_subject_setup->gpa_above;
                                                                                   $gpa_with_optional_count+=$optional_show_gpa;
                                                                                   $gpa_without_optional_count+=$mark_grade->gpa;

                                                                                } else {
                                                                                    echo "GPA Above ".$optional_subject_setup->gpa_above;
                                                                                    echo "<hr>";
                                                                                    echo "0";
                                                                                }
                                                                            } else {
                                                                                
                                                                                $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', floor($totalSumSub)], ['percent_upto', '>=', floor($totalSumSub)]])->first();
                                                                                echo @$mark_grade->gpa;
                                                                                $gpa_with_optional_count+=@$mark_grade->gpa;
                                                                                $gpa_without_optional_count+=@$mark_grade->gpa;
                                                                                
                                                                            }
                                                                            }else{
                                                                             
                                                                                $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', floor($totalSumSub)], ['percent_upto', '>=', floor($totalSumSub)]])->first();
                                                                                echo @$mark_grade->gpa;
                                                                                @$gpa_with_optional_count+=$mark_grade->gpa;
                                                                                @$gpa_without_optional_count+=$mark_grade->gpa;
                                                                                 
                                                                              
                                                                                
                                                                            }
                                                                         
                                                                        }
                                                                    ?>
                                                                   
                                                                   
                                                                </td>
                                                                
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                    <?php
                                                        $colspan = 4 + count($assinged_exam_types) * 2;
                                                        if ($optional_subject_setup!='') {
                                                           $col_for_result=3;
                                                        } else {
                                                            $col_for_result=2;
                                                        }
                                                        
                                                    ?>
                                                   
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>"  class="text-center"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.marks'); ?></td>
                                                    <td colspan="<?php echo e($colspan / $col_for_result + 5); ?>" class="text-center" style="padding:10px; font-weight:bold"><?php echo e($total_marks); ?> </td>
                                                    </tr>
                                                    <?php
                                                    if (isset($optional_subject_mark)) {
                                                        $total_marks_without_optional=$total_marks-$optional_subject_mark;
                                                        $op_subject_count=count($subjects)-1;
                                                    }else{
                                                        $total_marks_without_optional=$total_marks;
                                                        $op_subject_count=count($subjects);
                                                    }
                                                    
                                                       
                                                    ?>
                                                    
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" class="text-center"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.grade'); ?></td>
                                                  
                                                       
                                                        <?php if($optional_subject_setup!=''): ?>
                                                             <td colspan="4" class="text-center" style="padding:10px; font-weight:bold">
                                                                <?php
                                                                    if($total_fail != 0){

                                                                        echo 'F';
                                                                    }else{
                                                                        $average_mark = $gpa_with_optional_count / $op_subject_count;
                                                                        $average_grade = App\SmMarksGrade::where([['from', '<=', floor($average_mark)], ['up', '>=', floor($average_mark)]])->first();
                                                                        echo @$average_grade->grade_name;
                                                                    }
                                                                ?>

                                                            </td>
                                                             <td colspan="4" class="text-center" style="padding:10px; font-weight:bold">
                                                                <?php
                                                                    if($total_fail != 0){

                                                                        echo 'F';
                                                                    }else{
                                                                        $average_mark = $gpa_without_optional_count / count($subjects);
                                                                        $average_grade = App\SmMarksGrade::where([['from', '<=', floor($average_mark)], ['up', '>=', floor($average_mark)]])->first();
                                                                        echo @$average_grade->grade_name;
                                                                    }
                                                                ?>

                                                            </td>
                                                            
                                                        <?php else: ?>
                                                        <td colspan="<?php echo e($colspan / $col_for_result + 5); ?>" class="text-center" style="padding:10px; font-weight:bold">
                                                            <?php
                                                                if($total_fail != 0){

                                                                    echo 'F';
                                                                }else{
                                                                    $total_exam_subject = count($subjects) ;
                                                                    $average_mark = $gpa_without_optional_count / $total_exam_subject;
                                                                    $average_grade = App\SmMarksGrade::where([['from', '<=', floor($average_mark)], ['up', '>=', floor($average_mark)]])->first();
                                                                    echo @$average_grade->grade_name;
                                                                }
                                                            ?>

                                                        </td>
                                                        <?php endif; ?>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" class="text-center"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.gpa'); ?></td>
                                                        
                                                        <?php if($optional_subject_setup!=''): ?>
                                                        <td colspan="4" class="text-center" style="padding:10px; font-weight:bold">
                                                           <?php
                                                               if($total_fail != 0){

                                                                   echo 'F';
                                                               }else{
                                                                   $average_mark = $gpa_with_optional_count / $op_subject_count;
                                                                   $average_grade = App\SmMarksGrade::where([['from', '<=', floor($average_mark)], ['up', '>=', floor($average_mark)]])->first();
                                                                   echo number_format((float)$average_mark, 2, '.', '');
                                                               }
                                                           ?>
                                                       </td>
                                                        <td colspan="4" class="text-center" style="padding:10px; font-weight:bold">
                                                           <?php
                                                               if($total_fail != 0){

                                                                   echo 'F';
                                                               }else{
                                                                   $average_mark = $gpa_without_optional_count / count($subjects);
                                                                   $average_grade = App\SmMarksGrade::where([['from', '<=', floor($average_mark)], ['up', '>=', floor($average_mark)]])->first();
                                                                   echo round($average_mark,2);
                                                               }
                                                           ?>
                                                       </td>
                                                       
                                                   <?php else: ?>
                                                        <td colspan="<?php echo e($colspan / $col_for_result + 5); ?>" class="text-center" style="padding:10px; font-weight:bold">
                                                            <?php
                                                                if($total_fail != 0){
                                                                    echo '0.00';
                                                                }else{
                                                                    $total_exam_subject = count($subjects);
                                                                    $average_mark = $gpa_without_optional_count / $total_exam_subject;
                                                                    echo number_format((float)$average_mark, 2, '.', '');
                                                                    $average_grade = App\SmMarksGrade::where([['from', '<=', floor($average_mark)], ['up', '>=', floor($average_mark)]])->first();
                                                                }
                                                            ?>

                                                        </td>
                                                        <?php endif; ?>
                                                       
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>

                                            
                                            
                                            
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
<?php endif; ?>

            

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/reports/progress_card_report.blade.php ENDPATH**/ ?>