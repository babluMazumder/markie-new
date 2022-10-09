
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.student_attendance'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.student_attendance'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.student_attendance'); ?> <?php echo app('translator')->get('lang.import'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-title">
                        <h3><?php echo app('translator')->get('lang.select_criteria'); ?></h3>
                    </div>
                </div>

                <div class="offset-lg-3 col-lg-3 text-right mb-20">
                    <a href="<?php echo e(url('/public/backEnd/bulkxl/student_attendance.xlsx')); ?>">
                        <button class="primary-btn tr-bg text-uppercase bord-rad">
                            <?php echo app('translator')->get('lang.download_sample_file'); ?>
                            <span class="pl ti-download"></span>
                        </button>
                    </a>
                </div>
            </div>
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-attendance-bulk-store',
                            'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_form'])); ?>

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
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <div class="box-body">


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="row mb-40 mt-30">
                                <div class="col-lg-6 col-md-6 col-sm-12 sm_mb_20 sm2_mb_20">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                            id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('lang.select_class'); ?> *"
                                                value=""><?php echo app('translator')->get('lang.select_class'); ?> *
                                        </option>
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
                                <div class="col-lg-6 col-md-6 col-sm-12" id="select_section_div">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                            id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *"
                                                value=""><?php echo app('translator')->get('lang.select_section'); ?> *
                                        </option>
                                    </select>
                                    <?php if($errors->has('section')): ?>
                                        <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('section')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-40 mt-30">

                                <div class="col-lg-6 mt-30-md">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control read-only-input has-content"
                                                       id="startDate" type="text" name="attendance_date"
                                                       autocomplete="off" value="<?php echo e(date('m/d/Y')); ?>">
                                                <label for="startDate">Attendance Date *</label>
                                                <span class="focus-border"></span>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input form-control <?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>"
                                                       type="text" id="placeholderPhoto"
                                                       placeholder="Excel file (xlsx, csv) *"
                                                       readonly>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('file')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('file')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                       for="photo"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                <input type="file" class="d-none" name="file" id="photo">
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('lang.import'); ?> <?php echo app('translator')->get('lang.attendance'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/studentInformation/student_attendance_import.blade.php ENDPATH**/ ?>