
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.student_attendance'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.student_attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="main-title mt_0_sm mt_0_md">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?> </h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text_sm_right text_xs_left col-sm-6">
                    <a href="<?php echo e(route('student-attendance-import')); ?>" class="primary-btn small fix-gr-bg pull-right mb-20"><span class="ti-plus pr-2"></span>Import Attendance</a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-4 col-md-4 sm_mb_20 sm2_mb_20">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('lang.select_class'); ?> *" value=""><?php echo app('translator')->get('lang.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected': ''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('class')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('class')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 col-md-4" id="select_section_div">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *" value=""><?php echo app('translator')->get('lang.select_section'); ?> *</option>
                                    </select>
                                    <?php if($errors->has('section')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('section')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 col-md-4 mt-30-md">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control<?php echo e($errors->has('attendance_date') ? ' is-invalid' : ''); ?> <?php echo e(isset($date)? 'read-only-input': ''); ?>" id="startDate" type="text"
                                                    name="attendance_date" autocomplete="off" value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                                                <label for="startDate"><?php echo app('translator')->get('lang.attendance'); ?> <?php echo app('translator')->get('lang.date'); ?>*</label>
                                                <span class="focus-border"></span>
                                                
                                                <?php if($errors->has('attendance_date')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('attendance_date')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
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
<?php if(isset($already_assigned_students)): ?>

 

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('lang.student_attendance'); ?> | <small><?php echo app('translator')->get('lang.class'); ?>: <?php echo e($search_info['class_name']); ?>, <?php echo app('translator')->get('lang.section'); ?>: <?php echo e($search_info['section_name']); ?>, <?php echo app('translator')->get('lang.date'); ?>: <?php echo e(dateConvert($search_info['date'])); ?></small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <?php if($attendance_type != "" && $attendance_type == "H"): ?>
                            <div class="alert alert-warning"><?php echo app('translator')->get('lang.attendance_already_submitted_as_holiday'); ?></div>
                            <?php elseif($attendance_type != "" && $attendance_type != "H"): ?>
                            <div class="alert alert-success"><?php echo app('translator')->get('lang.attendance_already_submitted'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-30">
                        <div class="col-lg-6  col-md-6 no-gutters text-md-left mark-holiday ">
                            <form action="<?php echo e(route('student-attendance-holiday')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                            <input type="hidden" name="purpose" value="mark">
                            <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                            <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                            <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                                <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                    <?php echo app('translator')->get('lang.mark_holiday'); ?>
                                </button>
                        </form>
                        </div>
                        <div class="col-lg-6  col-md-6 no-gutters text-md-right mark-holiday">
                            <form action="<?php echo e(route('student-attendance-holiday')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                            <input type="hidden" name="purpose" value="unmark">
                            <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                            <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                            <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                                <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                    <?php echo app('translator')->get('lang.unmark_holiday'); ?>
                                </button>
                        </form>
                        </div>
            
                    </div>

                   

                    <input type="hidden" name="date" class="attendance_date" value="<?php echo e(isset($date)? $date: ''); ?>">

                    <!-- <div class="d-flex justify-content-between mb-20"> -->
                        <!-- <button type="submit" class="primary-btn fix-gr-bg mr-20" onclick="javascript: form.action='<?php echo e(route('student-attendance-holiday')); ?>'">
                            <span class="ti-hand-point-right pr"></span>
                            mark as holiday
                        </button> -->

                        
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="default_table" class="display school-table" cellspacing="0" width="100%">
                                <thead>
                                    <?php if(session()->has('message-danger') != ""): ?>
                                    <tr>
                                        <td colspan="9">
                                            <?php if(session()->has('message-danger')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo e(session()->get('message-danger')); ?>

                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo app('translator')->get('lang.admission'); ?> <?php echo app('translator')->get('lang.no'); ?></th>
                                        <th><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                        <th><?php echo app('translator')->get('lang.roll'); ?> <?php echo app('translator')->get('lang.number'); ?></th>
                                        <th><?php echo app('translator')->get('lang.attendance'); ?></th>
                                        <th><?php echo app('translator')->get('lang.note'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $already_assigned_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $already_assigned_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($already_assigned_student->studentInfo->admission_no); ?><input type="hidden" name="id[]" value="<?php echo e($already_assigned_student->studentInfo->id); ?>"></td>
                                        <td>
                                            <?php if(!empty($already_assigned_student->studentInfo)): ?>
                                            <?php echo e($already_assigned_student->studentInfo->first_name.' '.$already_assigned_student->studentInfo->last_name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($already_assigned_student->studentInfo!=""?$already_assigned_student->studentInfo->roll_no:""); ?></td>
                                        <td>
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control note_<?php echo e($already_assigned_student->studentInfo->id); ?>" cols="0" rows="2" name="note[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id=""><?php echo e($already_assigned_student->notes); ?></textarea>
                                                <label><?php echo app('translator')->get('lang.add_note_here'); ?></label>
                                                <span class="focus-border textarea"></span>
                                                <span class="invalid-feedback">
                                                    <strong><?php echo app('translator')->get('lang.error'); ?></strong>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                         
                                                    <input type="radio" data-id="<?php echo e($already_assigned_student->studentInfo->id); ?>" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceP<?php echo e($already_assigned_student->studentInfo->id); ?>" value="P" class="common-radio attendanceP attendance_type" <?php echo e($already_assigned_student->attendance_type == "P"? 'checked':''); ?>>
                                                    <label for="attendanceP<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('lang.present'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" data-id="<?php echo e($already_assigned_student->studentInfo->id); ?>" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceL<?php echo e($already_assigned_student->studentInfo->id); ?>" value="L" class="common-radio attendance_type" <?php echo e($already_assigned_student->attendance_type == "L"? 'checked':''); ?>>
                                                    <label for="attendanceL<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('lang.late'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" data-id="<?php echo e($already_assigned_student->studentInfo->id); ?>" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceA<?php echo e($already_assigned_student->studentInfo->id); ?>" value="A" class="common-radio attendance_type" <?php echo e($already_assigned_student->attendance_type == "A"? 'checked':''); ?>>
                                                    <label for="attendanceA<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('lang.absent'); ?></label>
                                                </div>
                                                <div>
                                                    <input type="radio" data-id="<?php echo e($already_assigned_student->studentInfo->id); ?>" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceH<?php echo e($already_assigned_student->studentInfo->id); ?>" value="F" class="common-radio attendance_type" <?php echo e($already_assigned_student->attendance_type == "F"? 'checked':''); ?>>
                                                    <label for="attendanceH<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('lang.half_day'); ?></label>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $new_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($student->admission_no); ?><input type="hidden" name="id[]" value="<?php echo e($student->id); ?>"></td>
                                        <td><?php echo e($student->first_name.' '.$student->last_name); ?></td>
                                        <td><?php echo e($student->roll_no); ?></td>
                                        <td>
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control note_<?php echo e($student->id); ?>" cols="0" rows="2" name="note[<?php echo e($student->id); ?>]" id=""></textarea>
                                                <label><?php echo app('translator')->get('lang.add_note_here'); ?></label>
                                                <span class="focus-border textarea"></span>
                                                <span class="invalid-feedback">
                                                    <strong><?php echo app('translator')->get('lang.error'); ?></strong>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" data-id="<?php echo e($student->id); ?>" name="attendance[<?php echo e($student->id); ?>]" id="attendanceP<?php echo e($student->id); ?>" value="P" class="common-radio attendanceP attendance_type" >
                                                    <label for="attendanceP<?php echo e($student->id); ?>"><?php echo app('translator')->get('lang.present'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" data-id="<?php echo e($student->id); ?>" name="attendance[<?php echo e($student->id); ?>]" id="attendanceL<?php echo e($student->id); ?>" value="L" class="common-radio attendance_type">
                                                    <label for="attendanceL<?php echo e($student->id); ?>"><?php echo app('translator')->get('lang.late'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" data-id="<?php echo e($student->id); ?>" name="attendance[<?php echo e($student->id); ?>]" id="attendanceA<?php echo e($student->id); ?>" value="A" class="common-radio attendance_type">
                                                    <label for="attendanceA<?php echo e($student->id); ?>"><?php echo app('translator')->get('lang.absent'); ?></label>
                                                </div>
                                                <div>
                                                    <input type="radio" data-id="<?php echo e($student->id); ?>" name="attendance[<?php echo e($student->id); ?>]" id="attendanceH<?php echo e($student->id); ?>" value="F" class="common-radio attendance_type">
                                                    <label for="attendanceH<?php echo e($student->id); ?>"><?php echo app('translator')->get('lang.half_day'); ?></label>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
<?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('change','.attendance_type',function (){
            let student_id = $(this).data('id');
            let attendance_type ='';
            if ($(this).is(':checked'))
            {
                attendance_type = $(this).val();
            }
            let attendance_date = $('.attendance_date').val();
            let notes = $('.note_'+student_id).val();
            $.ajax({
                url : "<?php echo e(route('student-attendance-store')); ?>",
                method : "POST",
                data : {
                    student_id : student_id,
                    attendance_type : attendance_type,
                    attendance_date : attendance_date,
                    notes : notes,
                },
                success : function (result){
                    toastr.success('Attendance Has Been Saved', 'Successful', {
                        timeOut: 5000
                    })
                }
            })


        })
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/studentInformation/student_attendance.blade.php ENDPATH**/ ?>