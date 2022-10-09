
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
            <h1><?php echo app('translator')->get('lang.custom'); ?> <?php echo app('translator')->get('lang.merit_list_report'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.merit_list_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'custom-merit-list', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                           
                            <div class="col-lg-6 mt-30-md">
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
                            <div class="col-lg-6 mt-30-md" id="select_section_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *" value=""><?php echo app('translator')->get('lang.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('lang.search'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
</section>

<?php if(isset($customresult)): ?>
    

<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-30 mt-0"><?php echo app('translator')->get('lang.custom'); ?> <?php echo app('translator')->get('lang.merit_list_report'); ?></h3>
                </div>
            </div>
            <div class="col-lg-8 pull-right">
                <a href="<?php echo e(route('custom-merit-list-print', [$InputClassId, $InputSectionId])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> Print</a>

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
                                            <img class="logo-img" src="<?php echo e(@generalSetting()->logo); ?>" alt="">
                                            </div>
                                            <div class="col-lg-6 ml-30">
                                                <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                                                <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                <p class="text-white mb-0"> <?php echo app('translator')->get('lang.email'); ?>  <?php echo e(isset($email)?$email:'admin@demo.com'); ?> ,  <?php echo app('translator')->get('lang.phone'); ?>  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'admin@demo.com'); ?> </p> 
                                            </div>
                                            <div class="offset-2">

                                                </div>
                                        </div>
                                    </div>



                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                
                                                <div class="col-lg-8"> 
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <h3><?php echo app('translator')->get('lang.order_of_merit_list'); ?></h3> 
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('lang.academic_year'); ?> : <span class="primary-color fw-500"><?php echo e(@generalSetting()->academic_Year->year ?? ''); ?></span>
                                                            </p>
                                                            
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('lang.class'); ?> : <span class="primary-color fw-500"><?php echo e(@$class_name); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('lang.section'); ?> : <span class="primary-color fw-500"><?php echo e(@$section->section_name); ?></span>
                                                            </p>  
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3><?php echo app('translator')->get('lang.subjects'); ?></h3> 
                                                                <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <p class="mb-0">
                                                                        <span class="primary-color fw-500"><?php echo e(@$subject->subject->subject_name); ?></span>
                                                                    </p>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                        </div>

                                                    </div>

                                                </div>
                                                

                                                <style>
                                                    #grade_table td {
                                                    color: #4E5B9C;
                                                    text-align: center;
                                                    border: 1px solid #351681;
                                                }
                                                </style>

                                                
                                                <div class="col-lg-4 text-black"> 
                                                    <?php $marks_grade=DB::table('sm_marks_grades')->where('academic_id', getAcademicId())->get(); ?>
                                                    <?php if(@$marks_grade): ?>
                                                        <table class="table  table-bordered table-striped " id="grade_table">
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
                                        </div>
                                        <h3 class="primary-color fw-500 text-center">Custom Merit List</h3>
                                        <hr>

                                        <div class="table-responsive">
                                            
                                                <div class="student_marks_table">
                                                        <table class="w-100 mt-30 mb-20 table table-bordered meritList">
                                                          <thead>
                                                            <tr>
                                                              <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.sl'); ?></th>
                                                              <th colspan="" class="full_width" >Ad.no</th>
                                                              <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.student'); ?></th>
                                                            <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.first_term'); ?> (<?php echo e($custom_result_setup->percentage1); ?>%)</th>
                                                              <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.second_term'); ?> (<?php echo e($custom_result_setup->percentage2); ?>%)</th>
                                                              <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.third_term'); ?> (<?php echo e($custom_result_setup->percentage3); ?>%)</th>
                                                              <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.final_result'); ?></th>
                                                              <th colspan="" class="full_width" ><?php echo app('translator')->get('lang.grade'); ?></th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                              <?php $count=1; ?>
                                                              <?php $__currentLoopData = $customresult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                             <td ><?php echo e($count++); ?></td>
                                                            <td ><?php echo e(@$row->admission_no); ?></td>
                                                            <td ><?php echo e(@$row->full_name); ?></td>
                                                            <td ><?php echo e(@$row->gpa1); ?></td>
                                                            <td ><?php echo e(@$row->gpa2); ?></td>
                                                            <td ><?php echo e(@$row->gpa3); ?></td>
                                                            <td ><?php echo e(@$row->final_result); ?></td>
                                                            <td ><?php echo e(@$row->final_grade); ?></td> 
                                                            </tr>
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
    </div>
</section>
<?php endif; ?>       

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/reports/custom_merit_list_report.blade.php ENDPATH**/ ?>