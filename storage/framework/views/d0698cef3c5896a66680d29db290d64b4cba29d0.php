

<?php $__env->startSection('mainContent'); ?>

<link rel="stylesheet" href="<?php echo e(asset('/')); ?>public/backEnd/css/custom_result/style.css">
<style>
    tr{
        border: 1px solid #351681;

    }
    table.meritList{
        width: 100%;
        border: 1px solid #351681;
    }
    table.meritList th{
        padding: 2px;
        text-transform: capitalize !important;
        font-size: 11px !important;  
        text-align: center !important;
        border: 1px solid #351681;
        text-align: center; 

    }
    table.meritList td{
        padding: 2px;
        font-size: 11px !important;
        border: 1px solid #351681;
        text-align: center !important;
    } 
 .single-report-admit table tr td { 
    padding: 5px 5px !important;

        border: 1px solid #351681;
} 
.single-report-admit table tr th { 
    padding: 5px 5px !important;
    vertical-align: middle;
        border: 1px solid #351681;
}
.main-wrapper {
     display: block !important ;  
}
#main-content {
    width: auto !important;
}
hr{
    margin: 0px;
}
.gradeChart tbody td{
        padding: 0;
        border: 1px solid #351681;
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


    #grade_table th{
        border: 1px solid black;
        text-align: center;
        background: #351681;
        color: white;
    }
    #grade_table td{
        color: black;
        text-align: center;
        border: 1px solid black;
    }
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>Custom <?php echo app('translator')->get('lang.progress_card_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.reports'); ?></a>
                <a href="#">Custom <?php echo app('translator')->get('lang.progress_card_report'); ?></a>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'custom-progress-card', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
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
                                    <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *" value=""><?php echo app('translator')->get('lang.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md" id="select_student_div">
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

<?php if(isset($assigned_exam)): ?>
 <?php if($assigned_exam->count()==3): ?>
     
 
<?php 
    $generalSetting= App\SmGeneralSettings::find(1);
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
        $email =$generalSetting->email; 
    }

?>
    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-30">Custom <?php echo app('translator')->get('lang.progress_card_report'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-8 pull-right mt-0">

                        <div class="print_button pull-right">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'custom-progress-card-print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student', 'target' => '_blank'])); ?>


                            <input type="hidden" name="class" value="<?php echo e($input_class); ?>">
                            <input type="hidden" name="section" value="<?php echo e($input_section); ?>">
                            <input type="hidden" name="student" value="<?php echo e($input_student); ?>">
                            
                            
                            <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"> </i> Print
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

                                                        <div class="offset-2 col-lg-2">
                                                            <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>"
                                                                 alt="">
                                                        </div>
                                                        <div class="col-lg-6 ml-30">
                                                            <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                                            <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                            <p class="text-white mb-0">
                                                                Email: <?php echo e(isset($email)?$email:'admin@demo.com'); ?> ,
                                                                Phone: <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'admin@demo.com'); ?> </p>
                                                        </div>
                                                        <div class="offset-2">

                                                        </div>
                                                <div>
                                                    <img class="report-admit-img"  src="<?php echo e(file_exists(@$studentDetails->student_photo) ? asset($studentDetails->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>" width="100" height="100" alt="<?php echo e(asset($studentDetails->student_photo)); ?>">
                                                </div>
                                                
                                                
                                            </div>
                                        <div class="card-body">
                                                <div class="row">
                                                
                                                        <div class="col-lg-7 text-black"> 
                                                            <h3 style="border-bottm:1px solid #ddd; padding: 15px; text-align:center">Student Information</h3>

                                                            <h3><?php echo e($studentDetails->full_name); ?></h3>
                                                            
                                                            <div class="row">

                                                                <div class="col-lg-3">
                                                                    <p class="mb-0 d-flex">
                                                                        <?php echo app('translator')->get('lang.academic_year'); ?>: <span
                                                                                class="primary-color fw-500"><?php echo e(generalSetting()->session_year); ?></span>
                                                                    </p>
                                                                    <p class="mb-0 d-flex">
                                                                            <?php echo app('translator')->get('lang.roll'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->roll_no); ?></span>
                                                                    </p>
                                                                    <p class="mb-0"> <?php echo app('translator')->get('lang.admission'); ?> <?php echo app('translator')->get('lang.no'); ?>:<span class="primary-color fw-500"> <?php echo e($studentDetails->admission_no); ?></span> </p>
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <p class="mb-0">
                                                                        <?php echo app('translator')->get('lang.class'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->class_name); ?></span>
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
                                                                            <th><?php echo app('translator')->get('lang.starting'); ?></th>
                                                                            <th><?php echo app('translator')->get('Ending'); ?></th>
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


                                           


                                            <h3 class="primary-color fw-500 text-center">Progress Card</h3>
                                            

                                            
                                            <div class="table-responsive">

                                            
                                            <div class="student_marks_table">
                                                    <table class="custom_table">
                                                      <thead>
                                                        <tr>

                                                            <?php $__currentLoopData = $assigned_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php
                                                                  $percentage=0;
                                                              ?>
                                                                <?php if($key==0): ?>
                                                                    <?php
                                                                        $percentage=$custom_result_setup->percentage1;
                                                                    ?>
                                                                <?php endif; ?>
                                                                <?php if($key==1): ?>
                                                                    <?php
                                                                    $percentage=$custom_result_setup->percentage2;
                                                                    ?>
                                                                <?php endif; ?>
                                                                <?php if($key==2): ?>
                                                                    <?php
                                                                    $percentage=$custom_result_setup->percentage3;
                                                                    ?>
                                                                <?php endif; ?>
                                                                 <th colspan=<?php echo e($assign_subjects->count()*2+1); ?>width" ><?php echo e($item->title); ?> <?php echo e($percentage); ?>% </th>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <th colspan="<?php echo e($assign_subjects->count()*2+1); ?>" class="full_width" >result</th>

                                                        </tr>
                                                        <tr>
                                                            <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <td colspan="2"><?php echo e($subject->subject_name); ?> </td>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         

                                                          <td rowspan="2" > GPA </td>

                                                          <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <td colspan="2"><?php echo e($subject->subject_name); ?> </td>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                          <td rowspan="2" > GPA </td>

                                                          <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <td colspan="2"><?php echo e($subject->subject_name); ?> </td>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                          <td rowspan="2" > GPA </td>

                                                          <td rowspan="4" > GPA </td>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                              $final_result=0;
                                                          ?>
                                                        <tr>
                                                           <?php $__currentLoopData = $assigned_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <td >Mark</td>
                                                                <td >GPA</td>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                       <td rowspan="2" >
                                                            <?php
                                                                  $percentage=0;
                                                              ?>
                                                                <?php if($key==0): ?>
                                                                    <?php
                                                                        $percentage='percentage1';
                                                                    ?>
                                                                <?php endif; ?>
                                                                <?php if($key==1): ?>
                                                                    <?php
                                                                    $percentage='percentage2';
                                                                    ?>
                                                                <?php endif; ?>
                                                                <?php if($key==2): ?>
                                                                    <?php
                                                                    $percentage='percentage3';
                                                                    ?>
                                                                <?php endif; ?>
                                                            <?php
                                                                $term_gpa=App\CustomResultSetting::termResult($exam->exam_type_id,$input_class,$input_section,$input_student,$assign_subjects->count());
                                                                echo number_format((float)$term_gpa, 2, '.', '');
                                                                $term_final_gpa=App\CustomResultSetting::getFinalResult($exam->exam_type_id,$input_class,$input_section,$input_student,$percentage);
                                                                $final_result= $final_result+ $term_final_gpa;
                                                            ?>
                                                       </td>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                          


                                                    <td rowspan="2" ><?php echo e(number_format((float)$final_result, 2, '.', '')); ?></td>
                                                        </tr>
                                                        <?php $__currentLoopData = $assigned_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <td >
                                                                    <?php
                                                                        $gpa=App\CustomResultSetting::getSubjectGpa($exam->exam_type_id,$input_class,$input_section,$input_student,$subject->subject_id);
                                                                        $subject_mark=$gpa[$subject->subject_id][0];
                                                                        $subject_gpa=$gpa[$subject->subject_id][1];
                                                                        echo $subject_mark;
                                                                    ?>
                                                                </td>
                                                                <td >
                                                                    <?php
                                                                        $grade=App\CustomResultSetting::getDrade($subject_mark);
                                                                        echo $grade;
                                                                    ?>
                                                                </td>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                               
                                                       
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
            </div>
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>

            

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/reports/custom_progress_card_report.blade.php ENDPATH**/ ?>