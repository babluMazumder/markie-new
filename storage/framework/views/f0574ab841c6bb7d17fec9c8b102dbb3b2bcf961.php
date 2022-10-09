
<?php $__env->startSection('mainContent'); ?>
<style>
    th{
        border: 1px solid black;
        text-align: center;
    }
    td{
        text-align: center;
    }
    td.subject-name{
        text-align: left;
        padding-left: 10px !important;
    }
    table.marksheet{
        width: 100%;
        border: 1px solid #828bb2 !important;
    }
    table.marksheet th{
        border: 1px solid #828bb2 !important;
    }
    table.marksheet td{
        border: 1px solid #828bb2 !important;
    }
    table.marksheet thead tr{
        border: 1px solid #828bb2 !important;
    }
    table.marksheet tbody tr{
        border: 1px solid #828bb2 !important;
    }

    .studentInfoTable{
        width: 100%;
        padding: 0px !important;
    }

    .studentInfoTable td{
        padding: 0px !important;
        text-align: left;
    }
    h4{
        text-align: left !important;
    }
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>Student Mark Sheet Report </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('mark_sheet_student')); ?>">Student Mark Sheet Report</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?></h3>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'mark_sheet_student', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            
                            <div class="col-lg-4 mt-30-md">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('lang.select_exam'); ?> *" value=""><?php echo app('translator')->get('lang.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('exam')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
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
                            <div class="col-lg-4 mt-30-md" id="select_section_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="Select section *" value="">Select section *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
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
    $generalSetting= App\SmGeneralSettings::find(1);
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    }

?>
<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-30 mt-30"><?php echo app('translator')->get('lang.mark_sheet_report'); ?></h3>
                </div>
            </div>
            <div class="col-lg-8 pull-right">
                <div class="main-title">
                     <div class="print_button pull-right mt-30">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'mark-sheet-student/print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'mark_sheet_report', 'target' => '_blank'])); ?>

                          <input type="hidden" name="exam" value="<?php echo e($input['exam_id']); ?>">
                          <input type="hidden" name="class" value="<?php echo e($input['class_id']); ?>">
                          <input type="hidden" name="section" value="<?php echo e($input['section_id']); ?>"> 
                          <input type="hidden" name="student" value="<?php echo e($input['student_id']); ?>"> 
                          <button type="submit" class="primary-btn small fix-gr-bg">  <i class="ti-printer"> </i> Print </button> 
                       
                    </div>  
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
                                            <div>
                                                <img class="logo-img" src="<?php echo e(url($generalSetting->logo)); ?>" alt=""> 
                                            </div>
                                            <div class="ml-30">
                                                <h3 class="text-white"> <?php echo e(isset($school_name)?$school_name:'Infix School Management ERP'); ?> </h3>
                                                <p class="text-white mb-0"> <?php echo e(isset($address)?$address:'Infix School Adress'); ?> </p>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <img class="report-admit-img" src="<?php echo e(asset($studentDetails->student_photo)); ?>" width="100" height="100" alt="<?php echo e(asset($studentDetails->student_photo)); ?>">
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="offset-1 col-md-10">

                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <h4>Student Info</h4>
                                                                <table class="studentInfoTable">
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Name of Student :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($student_detail->full_name); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Father's Name :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($student_detail->parents->fathers_name); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Mother's Name :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($student_detail->parents->mothers_name); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Roll Number :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($student_detail->roll_no); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Admission Number :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($student_detail->admission_no); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Date of birth :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($student_detail->date_of_birth != "" && $student_detail->date_of_birth != "1970-01-01"? App\SmGeneralSettings::DateConvater($student_detail->date_of_birth):''); ?>

                                                                        </td>
                                                                    </tr>


                                                                </table>
                                                            </td>
                                                            <td>
                                                                <h4>Exam Info</h4>
                                                                <table class="studentInfoTable">
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Exam Title :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($exam_details->title); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Academic Class :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($class_name->class_name); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Academic Section :
                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($section->section_name); ?>

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                             <td>
                                                                <h4>Class Result</h4>
                                                                <table class="studentInfoTable">
                                                                     <tr>
                                                                        <td class="font-weight-bold">
                                                                            Class Average :
                                                                        </td>
                                                                        <td>
                                                                            <?php if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2"): ?>
                                                                            <?php echo e(number_format($total_marks_by_student/9, 2)); ?>


                                                                            <?php elseif($class_name->class_name == "SS 1"): ?>
                                                                            <?php echo e(number_format($total_marks_by_student/13, 2)); ?>


                                                                            <?php else: ?>

                                                                           <?php echo e(number_format($total_marks_by_student/count($subjects), 2)); ?>


                                                                           <?php endif; ?>
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                           Class Position :
                                                                        </td>
                                                                        <td>

                                                                            <?php
                                                                            arsort($student_final_marks);

                                                                            $student_average = $total_marks_by_student/count($subjects);

                                                                            $final_position_array = [];
                                                                            foreach($student_final_marks as $student_final_mark){
                                                                                $final_position_array[] = $student_final_mark/count($subjects);
                                                                            }


                                                                            echo array_search($student_average,$final_position_array) + 1;

                                                                            ?>


                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                           Total Marks :
                                                                        </td>
                                                                        <td>

                                                                            <?php echo e($total_marks_by_student); ?>


                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                           Student Rating :
                                                                        </td>
                                                                        <td>



                                                                             <?php
                                                                                 if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2"){

                                                                                    $per_subject = $total_marks_by_student/9;

                                                                                 }elseif($class_name->class_name == "SS 1"){

                                                                                    $per_subject = $total_marks_by_student/13;

                                                                                 }else{

                                                                                    $per_subject = $total_marks_by_student/count($subjects);

                                                                                 }


                                                                                $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', round($per_subject)], ['percent_upto', '>=', round($per_subject)]])->first();

                                                                               echo $mark_grade->description;

                                                                            ?>



                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                            </div>
                                        </div>
                                        <table class="w-100 mt-30 mb-20 table   table-bordered marksheet">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">SL</th>
                                                    <th rowspan="2">Subjects</th>


                                                    <th colspan="3">Marks Obtained</th>

                                                    <th rowspan="2">Letter Grade</th>
                                                    <th rowspan="2">Grade Point</th>
                                                    <th rowspan="2">GPA</th>
                                                </tr>
                                                <tr>

                                                <?php $__currentLoopData = $distributed_marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distributed_mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <th><?php echo e($distributed_mark->exam_title); ?>(<?php echo e($distributed_mark->exam_mark); ?>%) </th>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <th>Total(100%)</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                            <?php $sum_gpa= 0;  $resultCount=1; $subject_count=1; $tota_grade_point=0; $this_student_failed=0; ?>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <tr>
                                                    <td><?php echo e($subject_count++); ?></td>
                                                    <td class="subject-name"><?php echo e($data->subject->subject_name); ?> </td>

                                                    <?php

                                                    $distribute_marks = \App\SmMarkStore::where('exam_term_id', $input['exam_id'])->where('class_id', $input['class_id'])->where('section_id', $input['section_id'])->where('subject_id', $data->subject_id)->where('student_id', $input['student_id'])->get();

                                                    ?>
                                                    
                                                    <?php $__currentLoopData = $distribute_marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distribute_mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td><?php echo e($distribute_mark->total_marks); ?></td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                    <td>
                                                             <?php echo e($tola_mark_by_subject=App\SmAssignSubject::getSumMark($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id)); ?>

                                                    </td>
                                                    <td>

                                                        <?php
                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();

                                                        ?>
                                                        <?php echo e($mark_grade->grade_name); ?>

                                                    </td>
                                                    <td>

                                                        <?php
                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();

                                                            $tota_grade_point = $tota_grade_point + $mark_grade->gpa ;
                                                            if($mark_grade->gpa<1){
                                                                $this_student_failed =1;
                                                            }
                                                        ?>

                                                        <?php echo e($mark_grade->gpa); ?>

                                                    </td>
                                                    <?php if($subject_count==2): ?>


                                                        <td rowspan="<?php echo e(count($subjects)); ?>" style="vertical-align: middle">

                                                            <?php

                                                            if($class_name->class_name == "SS 3" || $class_name->class_name == "SS 2"){

                                                                $get_avarage = $total_marks_by_student/9;

                                                             }elseif($class_name->class_name == "SS 1"){

                                                                $get_avarage = $total_marks_by_student/13;

                                                             }else{

                                                                $get_avarage = $total_marks_by_student/count($subjects);

                                                             }

                                                            $final_gpa = App\SmMarksGrade::where([['percent_from', '<=', round($get_avarage)], ['percent_upto', '>=', round($get_avarage)]])->first();


                                                            echo @$final_gpa->gpa;

                                                            ?>

                                                        </td>
                                                    <?php endif; ?>

                                                </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="row mt-35">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">


                                                            <?php
                                                            $teacher_comment = "";
                                                            $principle_comment = "";

                                                                if($final_gpa->grade_name == "A1"){

                                                                    $teacher_comment = "An academic genius";
                                                                    $principle_comment = "An excellent result, keep it up!";

                                                                }elseif($final_gpa->grade_name == "B2"){

                                                                    $teacher_comment = "A smart boy!";
                                                                    $principle_comment = "An excellent result, keep it up!";

                                                                }elseif($final_gpa->grade_name == "B3"){

                                                                    $teacher_comment = "A bundle of potentials!";
                                                                    $principle_comment = "A very good result!";

                                                                }elseif($final_gpa->grade_name == "C4"){

                                                                    $teacher_comment = "A studious student!";
                                                                    $principle_comment = "A very good result!";

                                                                }elseif($final_gpa->grade_name == "C5"){

                                                                    $teacher_comment = "A hard-working student!";
                                                                    $principle_comment = "A very good result!";

                                                                }elseif($final_gpa->grade_name == "C6"){

                                                                    $teacher_comment = "A reliable student!";
                                                                    $principle_comment = "A good result!";

                                                                }elseif($final_gpa->grade_name == "D7"){

                                                                    $teacher_comment = "A positive-minded student!";
                                                                    $principle_comment = "A fair result!";

                                                                }elseif($final_gpa->grade_name == "E8"){

                                                                    $teacher_comment = "A confident student!";
                                                                    $principle_comment = "A fair result!";

                                                                }elseif($final_gpa->grade_name == "F+"){

                                                                    $teacher_comment = "A prudent student!";
                                                                    $principle_comment = "Sit up and work harder!";

                                                                }elseif($final_gpa->grade_name == "F-"){

                                                                    $teacher_comment = "A promising student!";
                                                                    $principle_comment = "Sit up and work harder!";

                                                                }

                                                            ?>
                                                            <input
                                                                    class="primary-input form-control"
                                                                    type="text" name="teacher_comment" autocomplete="off" value="<?php echo e(@$teacher_comment); ?>" readonly>
                                                            <label>Teacher's Comment</label>
                                                            <span class="focus-border"></span>
                                                        </div>

                                                    </div>
                                                </div> 
                                            </div> 

                                            <div class="col-lg-12">

                                                <div class="row mt-35">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">
                                                            <input
                                                                    class="primary-input form-control"
                                                                    type="text" name="principal_comment" autocomplete="off"  value="<?php echo e(@$principle_comment); ?>" readonly>
                                                            <label>Principal's Comment</label>
                                                            <span class="focus-border"></span>
                                                        </div>

                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 

                                        <div class="row mt-20">
                                            <div class="col-lg-12">
                                                <p class="result-date">
                                                    <?php
                                                     $data = App\SmMarkStore::select('created_at')->where([
                                                        ['student_id',$student_detail->id],
                                                        ['class_id',$class_id],
                                                        ['section_id',$section_id],
                                                        ['exam_term_id',$exam_type_id],
                                                    ])->first();

                                                    ?>
                                                    Date of Publication of Result : <b> <?php echo e(date_format(date_create($data->created_at),"F j, Y, g:i a")); ?></b>
                                                </p>
                                            </div>
                                        </div>

                                         </form> 


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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xamppSF\htdocs\laravel\markie\markie_new\resources\views/backEnd/studentPanel/mark_sheet_report_student.blade.php ENDPATH**/ ?>