
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.examinations'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.examinations'); ?></a>
                <a href="<?php echo e(route('exam_attendance')); ?>"><?php echo app('translator')->get('lang.exam_attendance'); ?></a>
                <a href="<?php echo e(route('exam_attendance_create')); ?>"><?php echo app('translator')->get('lang.attendance_create'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?> </h3>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_attendance_create', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('lang.select_exam'); ?> *" value=""><?php echo app('translator')->get('lang.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e(@$exam->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('exam')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('lang.select_class'); ?> *" value=""><?php echo app('translator')->get('lang.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('class')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_section_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *" value=""><?php echo app('translator')->get('lang.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_subject_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="select_subject" name="subject">
                                    <option data-display="<?php echo app('translator')->get('lang.select_subjects'); ?> *" value=""><?php echo app('translator')->get('lang.select_subjects'); ?> *</option>
                                </select>
                                <?php if($errors->has('subject')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('subject')); ?></strong>
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
<?php if(isset($students)): ?>

 <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('lang.exam_attendance'); ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="primary-btn fix-gr-bg mb-20" onclick="javascript: form.action='<?php echo e(route('exam-attendance-store')); ?>'">
                        <span class="ti-save pr"></span>
                            <?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.attendance'); ?>
                    </button>
                    </div>
                </div>             

                <input type="hidden" name="exam_id" value="<?php echo e(@$exam_id); ?>">
                <input type="hidden" name="subject_id" value="<?php echo e(@$subject_id); ?>">
                <input type="hidden" name="class_id" value="<?php echo e(@$class_id); ?>">
                <input type="hidden" name="section_id" value="<?php echo e(@$section_id); ?>">

                <div class="row">
                    <div class="col-lg-12">
                        <table id="table_id_table_2" class="display school-table " cellspacing="0" width="100%">
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
                                    <th width="25%"><?php echo app('translator')->get('lang.admission'); ?> <?php echo app('translator')->get('lang.no'); ?></th>
                                    <th width="25%"><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                    <th width="25%"><?php echo app('translator')->get('lang.student'); ?> <?php echo app('translator')->get('lang.number'); ?></th>
                                    <th width="25%"><?php echo app('translator')->get('lang.attendance'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(count($exam_attendance_childs) == 0): ?>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$student->admission_no); ?><input type="hidden" name="id[]" value="<?php echo e(@$student->id); ?>"></td>
                                        <td><?php echo e(@$student->first_name.' '.@$student->last_name); ?></td>
                                        <td><?php echo e(@$student->roll_no); ?></td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[<?php echo e(@$student->id); ?>]" id="attendanceP<?php echo e(@$student->id); ?>" value="P" class="common-radio attd" <?php echo e(in_array($student->id, $exam_attendance_childs)? 'checked':''); ?>>
                                                    <label for="attendanceP<?php echo e($student->id); ?>"><?php echo app('translator')->get('lang.present'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[<?php echo e(@$student->id); ?>]" id="attendanceL<?php echo e(@$student->id); ?>" value="A" class="common-radio"  <?php echo e(!in_array($student->id, $exam_attendance_childs)? 'checked':''); ?>>
                                                    <label for="attendanceL<?php echo e($student->id); ?>"><?php echo app('translator')->get('lang.absent'); ?></label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = $exam_attendance_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->admission_no:""); ?><input type="hidden" name="id[]" value="<?php echo e(@$student->student_id); ?>"></td>
                                        <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->first_name.' '.@$student->studentInfo->last_name:""); ?></td>
                                        <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->roll_no:""); ?></td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[<?php echo e(@$student->student_id); ?>]" id="attendanceP<?php echo e(@$student->id); ?>" value="P" class="common-radio" <?php echo e(@$student->attendance_type == 'P'? 'checked': ''); ?>>
                                                    <label for="attendanceP<?php echo e(@$student->id); ?>"><?php echo app('translator')->get('lang.present'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[<?php echo e(@$student->student_id); ?>]" id="attendanceL<?php echo e(@$student->id); ?>" value="A" class="common-radio" <?php echo e(@$student->attendance_type == 'A'? 'checked': ''); ?>>
                                                    <label for="attendanceL<?php echo e(@$student->id); ?>"><?php echo app('translator')->get('lang.absent'); ?></label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
<?php endif; ?>

    </div>
</section>


            


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/examination/exam_attendance_create.blade.php ENDPATH**/ ?>