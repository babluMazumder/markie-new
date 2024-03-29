
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.leave_define'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.leave'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.leave_define'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($leave_define)): ?>
         <?php if(userPermission(200)): ?>
               
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('leave-define')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
           

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($leave_define)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.leave_define'); ?>
                            </h3>
                        </div>
                <?php if(isset($leave_define)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('leave-define-update',$leave_define->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                <?php else: ?>
                 <?php if(userPermission(200)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'leave-define',
                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <?php endif; ?>
                <?php endif; ?>
                <input type="hidden" name="id" value="<?php echo e(isset($leave_define)? $leave_define->id:''); ?>">
                <div class="white-box">
                    <div class="add-visitor">
                        <div class="row mt-25">
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
                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>" name="role">
                                    <option data-display="<?php echo app('translator')->get('lang.role'); ?> *" value=""><?php echo app('translator')->get('lang.role'); ?> *</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php echo e(isset($leave_define)? ($leave_define->role_id == $role->id? 'selected':''):''); ?>><?php echo e($role->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('role')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-lg-12">
                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('leave_type') ? ' is-invalid' : ''); ?>" name="leave_type">
                                    <option data-display="<?php echo app('translator')->get('lang.leave_type'); ?>  *" value=""><?php echo app('translator')->get('lang.leave_type'); ?> *</option>
                                    <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($leave_type->id); ?>" <?php echo e(isset($leave_define)? ($leave_define->type_id == $leave_type->id? 'selected':''):''); ?>><?php echo e($leave_type->type); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('leave_type')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('leave_type')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('days') ? ' is-invalid' : ''); ?>"
                                    type="text" name="days" autocomplete="off" value="<?php echo e(isset($leave_define)? $leave_define->days:''); ?>">
                                    <label><?php echo app('translator')->get('lang.days'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('days')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('days')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                                 <?php 
                                  $tooltip = "";
                                  if(userPermission(200)){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                 <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                    <span class="ti-check"></span>
                                    <?php if(isset($leave_define)): ?>
                                        <?php echo app('translator')->get('lang.update'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('lang.save'); ?>
                                    <?php endif; ?>
                                    <?php echo app('translator')->get('lang.leave_define'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
            </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.leave_define'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
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
                                <td colspan="4">
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
                                <th><?php echo app('translator')->get('lang.role'); ?></th>
                                <th><?php echo app('translator')->get('lang.leave_type'); ?></th>
                                <th><?php echo app('translator')->get('lang.days'); ?></th>
                                <th><?php echo app('translator')->get('lang.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $leave_defines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_define): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($leave_define->role !=""?$leave_define->role->name:""); ?></td>
                                <td><?php echo e($leave_define->leaveType !=""?$leave_define->leaveType->type:""); ?></td>
                                <td><?php echo e($leave_define->days); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <?php echo app('translator')->get('lang.select'); ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <?php if(userPermission(201)): ?>

                                            <a class="dropdown-item" href="<?php echo e(route('leave-define-edit', [@$leave_define->id
                                                ])); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                <?php endif; ?>
                                                <?php if(userPermission(202)): ?>

                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteLeaveDefineModal<?php echo e($leave_define->id); ?>"
                                                    href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteLeaveDefineModal<?php echo e($leave_define->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.leave_define'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                        <?php echo e(Form::open(['route' => array('leave-define-delete',@$leave_define->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/humanResource/leave_define.blade.php ENDPATH**/ ?>