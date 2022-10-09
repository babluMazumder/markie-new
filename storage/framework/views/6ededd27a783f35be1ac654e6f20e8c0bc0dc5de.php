
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.student_dormitory_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.dormitory'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.student_dormitory_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
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
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_dormitory_report', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-4 mt-30-md">
                                    <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('lang.select_class'); ?>" value=""><?php echo app('translator')->get('lang.select_class'); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mt-30-md" id="select_section_div">
                                    <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('lang.select_section'); ?>" value=""><?php echo app('translator')->get('lang.select_section'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mt-30-md">
                                    <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('dormitory') ? ' is-invalid' : ''); ?>" name="dormitory">
                                        <option data-display="<?php echo app('translator')->get('lang.select_dormitory'); ?>" value=""><?php echo app('translator')->get('lang.select_dormitory'); ?></option>
                                        <?php $__currentLoopData = $dormitories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$dormitory->id); ?>"  <?php echo e(isset($dormitory_id)? ($dormitory_id == $dormitory->id? 'selected':''):''); ?>><?php echo e(@$dormitory->dormitory_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
       
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"> <?php echo app('translator')->get('lang.student_dormitory_report'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">
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
                                        <th> <?php echo app('translator')->get('lang.class_Sec'); ?></th>
                                        <th> <?php echo app('translator')->get('lang.admission'); ?>  <?php echo app('translator')->get('lang.no'); ?></th>
                                        <th> <?php echo app('translator')->get('lang.student'); ?>  <?php echo app('translator')->get('lang.name'); ?></th>
                                        <th> <?php echo app('translator')->get('lang.mobile'); ?></th>
                                        <th><?php echo app('translator')->get('lang.guardian_phone'); ?></th>
                                        <th><?php echo app('translator')->get('lang.dormitory'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                        <th><?php echo app('translator')->get('lang.room_number'); ?></th>
                                        <th><?php echo app('translator')->get('lang.room_type'); ?></th>
                                        <th><?php echo app('translator')->get('lang.cost_per_bed'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$student->className != ""? @$student->className->class_name:""); ?> (<?php echo e(@$student->section->section_name); ?>)<input type="hidden" name="id[]" value="<?php echo e(@$student->student_id); ?>"></td>
                                        <td><?php echo e(@$student->admission_no); ?></td>
                                        <td><?php echo e(@$student->full_name); ?></td>
                                        <td><?php echo e(@$student->mobile); ?></td>
                                        <td><?php echo e(@$student->parents->guardians_mobile); ?></td>
                                        <td><?php echo e(@$student->dormitory != ""? @$student->dormitory->dormitory_name: ''); ?></td>
                                        <td><?php echo e(@$student->room != ""? @$student->room->name: ''); ?></td>
                                        <td><?php echo e(@$student->room != ""? @$student->room->roomType->type: ''); ?></td>
                                        <td><?php echo e(@$student->room != ""? number_format( (float) @$student->room->cost_per_bed, 2, '.', ''): ''); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/dormitory/student_dormitory_report.blade.php ENDPATH**/ ?>