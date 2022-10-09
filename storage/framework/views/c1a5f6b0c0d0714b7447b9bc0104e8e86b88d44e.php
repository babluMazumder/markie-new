
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('lang.exam_routine'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('lang.examinations'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('lang.exam_routine'); ?> </a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_exam_schedule_search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 mt-30-md">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                        name="exam">
                                    <option data-display="Select Exam *" value=""><?php echo app('translator')->get('lang.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$exam->id); ?>" <?php echo e(isset($exam_id)? (@$exam->id == @$exam_id? 'selected':''):''); ?>><?php echo e(@$exam->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('exam')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mt-20 text-right">
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
    <?php if(isset($assign_subjects)): ?>

        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="row mt-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.exam_routine'); ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-6 pull-right">
                        <div class="main-title">
                            <div class="print_button pull-right mb-30">
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_schedule_print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                                <input type="hidden" name="exam_id" value="<?php echo e(@$exam_id); ?>">
                                <input type="hidden" name="class_id" value="<?php echo e(@$class_id); ?>">
                                <input type="hidden" name="section_id" value="<?php echo e(@$section_id); ?>">
                                <button type="submit" class="primary-btn small fix-gr-bg"><i
                                            class="ti-printer"> </i> <?php echo app('translator')->get('lang.print'); ?> </button>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <table id="default_table" class="display school-table" cellspacing="0" width="100%">
                            <thead>
                            <?php if(session()->has('success') != "" || session()->has('danger') != ""): ?>
                                <tr>
                                    <td colspan="20">
                                        <?php if(session()->has('success') != ""): ?>

                                            <div class="alert alert-success">
                                                <?php echo e(session()->get('success')); ?>

                                            </div>

                                        <?php else: ?>

                                            <div class="alert alert-success">
                                                <?php echo e(session()->get('danger')); ?>

                                            </div>

                                    </td>

                                    <?php endif; ?>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th width="10%">Subject</th>
                                <?php $__currentLoopData = $exam_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e(@$exam_period->period); ?>

                                        <br><?php echo e(date('h:i A', strtotime(@$exam_period->start_time)).'-'.date('h:i A', strtotime($exam_period->end_time))); ?>

                                    </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$assign_subject->subject!=""?@$assign_subject->subject->subject_name:""); ?></td>
                                    <?php $__currentLoopData = $exam_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $assignedRoutine =  $assign_subject->examSchedule->where('exam_term_id', $exam_id)->where('exam_period_id', $exam_period->id)->first();
                                        ?>
                                        <td>
                                            <?php if(@$assignedRoutine): ?>


                                                <div class="col-lg-6">
                                                    <span class=""><?php echo e(@$assignedRoutine->classRoom->room_no); ?></span>
                                                    <br>
                                                    <span class="">
                                           
                                    <?php echo e((@$assignedRoutine->date) != ""? dateConvert(@$assignedRoutine->date):''); ?>


                                                    </span></div>

                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/studentPanel/exam_schedule.blade.php ENDPATH**/ ?>