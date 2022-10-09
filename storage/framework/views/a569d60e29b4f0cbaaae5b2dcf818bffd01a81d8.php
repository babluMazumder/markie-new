
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.pending_leave_request'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.student'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.pending_leave_request'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">

        

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo app('translator')->get('lang.pending_leave_request'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                        <thead>
                            <?php if(session()->has('message-success-delete') != "" ||
                            session()->get('message-danger-delete') != ""): ?>
                            <tr>
                                <td colspan="7">
                                    <?php if(session()->has('message-success-delete')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session()->get('message-success-delete')); ?>

                                    </div>
                                    <?php elseif(session()->has('message-danger-delete')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session()->get('message-danger-delete')); ?>

                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th><?php echo app('translator')->get('lang.name'); ?></th>
                                <th><?php echo app('translator')->get('lang.type'); ?></th>
                                <th><?php echo app('translator')->get('lang.from'); ?></th>
                                <th><?php echo app('translator')->get('lang.to'); ?></th>
                                <th><?php echo app('translator')->get('lang.apply_date'); ?></th>
                                <th><?php echo app('translator')->get('lang.Status'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $apply_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apply_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(isset($apply_leave->student)? $apply_leave->student->full_name:''); ?></td>
                                <td>
                                    <?php if($apply_leave->leaveDefine !="" && $apply_leave->leaveDefine->leaveType !=""): ?>
                                    <?php echo e($apply_leave->leaveDefine->leaveType->type); ?>

                                    <?php endif; ?>
                                </td>
                                <td  data-sort="<?php echo e(strtotime($apply_leave->leave_from)); ?>" >
                                    <?php echo e($apply_leave->leave_from != ""? dateConvert($apply_leave->leave_from):''); ?>


                                </td>
                                <td  data-sort="<?php echo e(strtotime($apply_leave->leave_to)); ?>" >
                                   <?php echo e($apply_leave->leave_to != ""? dateConvert($apply_leave->leave_to):''); ?>


                                </td>
                                <td  data-sort="<?php echo e(strtotime($apply_leave->apply_date)); ?>" >
                                   <?php echo e($apply_leave->apply_date != ""? dateConvert($apply_leave->apply_date):''); ?>


                                </td>
                                <td>

                                    <?php if($apply_leave->approve_status == 'P'): ?>
                                    <button class="primary-btn small tr-bg"><?php echo app('translator')->get('lang.pending'); ?></button><?php endif; ?>

                                    <?php if($apply_leave->approve_status == 'A'): ?>
                                    <button class="primary-btn small tr-bg"><?php echo app('translator')->get('lang.approved'); ?></button>
                                    <?php endif; ?>

                                    <?php if($apply_leave->approve_status == 'C'): ?>
                                    <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('lang.cancelled'); ?></button>
                                    <?php endif; ?>

                                </td>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/student_leave/pending_leave.blade.php ENDPATH**/ ?>