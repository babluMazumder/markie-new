
<?php $__env->startSection('mainContent'); ?>
<style>
    th{
        padding: .5rem !important;
        font-size: 10px !important;
    }
    td{
        padding: .3rem !important;
        font-size: 9px !important;  
    }
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.attendance'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('student_my_attendance')); ?>"><?php echo app('translator')->get('lang.attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php
    $year=date('Y');
     
?>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php elseif(session()->has('message-danger')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                        <?php endif; ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_my_attendance', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                
                                
                                <div class="col-lg-6 mt-30-md">
                                    <select class="w-100 niceSelect bb form-control<?php echo e($errors->has('month') ? ' is-invalid' : ''); ?>" name="month">
                                        <option data-display="Select Month *" value=""><?php echo app('translator')->get('lang.select_month'); ?> *</option>
                                        <option value="01" <?php echo e(isset($month)? ( @$month == "01"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.january'); ?></option>
                                        <option value="02" <?php echo e(isset($month)? ( @$month == "02"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.february'); ?></option>
                                        <option value="03" <?php echo e(isset($month)? ( @$month == "03"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.march'); ?></option>
                                        <option value="04" <?php echo e(isset($month)? ( @$month == "04"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.april'); ?></option>
                                        <option value="05" <?php echo e(isset($month)? ( @$month == "05"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.may'); ?></option>
                                        <option value="06" <?php echo e(isset($month)? ( @$month == "06"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.june'); ?></option>
                                        <option value="07" <?php echo e(isset($month)? ( @$month == "07"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.july'); ?></option>
                                        <option value="08" <?php echo e(isset($month)? ( @$month == "08"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.august'); ?></option>
                                        <option value="09" <?php echo e(isset($month)? ( @$month == "09"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.september'); ?></option>
                                        <option value="10" <?php echo e(isset($month)? ( @$month == "10"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.october'); ?></option>
                                        <option value="11" <?php echo e(isset($month)? ( @$month == "11"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.november'); ?></option>
                                        <option value="12" <?php echo e(isset($month)? ( @$month == "12"? 'selected': ''): ''); ?>><?php echo app('translator')->get('lang.december'); ?></option>
                                    </select>
                                    <?php if($errors->has('month')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('month')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                              
                                <div class="col-lg-6 mt-30-md">
                                    <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year">
                                        <option data-display="Select Year *" value=""><?php echo app('translator')->get('lang.select_year'); ?> *</option>
                                        <?php $__currentLoopData = academicYears(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                             <option value="<?php echo e(@$academic_year->year); ?>" <?php echo e(isset($year)? (@$year == @$academic_year->year? 'selected': ''): ''); ?>><?php echo e(@$academic_year->year); ?></option>
                                             

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                    </select>
                                    <?php if($errors->has('year')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('year')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        search
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>


    </div>
</section>


<?php if(isset($attendances)): ?>

<section class="student-attendance">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-12 mb-40">
                <a href="<?php echo e(route('my-attendance/print', [@$month, @$year])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('lang.print'); ?></a>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('lang.attendance_result'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="3%">P</th>
                            <th width="3%">L</th>
                            <th width="3%">A</th>
                            <th width="3%">H</th>
                            <th width="3%">F</th>
                            <th width="2%">%</th>
                            <?php for($i = 1;  $i<=@$days; $i++): ?>
                            <th width="3%" class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                <?php echo e($i); ?> <br>
                                <?php
                                    @$date = @$year.'-'.@$month.'-'.$i;
                                    @$day = date("D", strtotime(@$date));
                                    echo @$day;
                                ?>
                            </th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php @$total_attendance = 0; ?>
                        <?php @$count_absent = 0; ?>
                        <tr>
                            <td>
                                <?php $p = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'P'): ?>
                                        <?php $p++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($p); ?>

                            </td>
                            <td>
                                <?php $l = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'L'): ?>
                                        <?php $l++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($l); ?>

                            </td>
                            <td>
                                <?php $a = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'A'): ?>
                                        <?php $a++; @$count_absent++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($a); ?>

                            </td>
                            <td>
                                <?php $h = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'H'): ?>
                                        <?php $h++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($h); ?>

                            </td>
                            <td>
                                <?php $f = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'F'): ?>
                                        <?php $f++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($f); ?>

                            </td>
                            <td>  
                               <?php
                                 @$total_present = @$total_attendance - @$count_absent;
                                 if(@$count_absent == 0){
                                     echo '100%';
                                 }else{
                                     @$percentage = @$total_present / @$total_attendance * 100;
                                     echo number_format((float)@$percentage, 2, '.', '').'%';
                                 }
                               ?>

                            </td>
                            <?php for($i = 1;  $i<=@$days; $i++): ?>
                                <?php
                                    @$date = @$year.'-'.@$month.'-'.$i;
                                ?>
                                <td width="3%" class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(strtotime(@$value->attendance_date) == strtotime(@$date)): ?>
                                            <?php echo e(@$value->attendance_type); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                               
                            <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/studentPanel/student_attendance.blade.php ENDPATH**/ ?>