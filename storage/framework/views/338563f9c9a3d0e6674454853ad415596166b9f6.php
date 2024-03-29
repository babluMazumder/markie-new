
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.assignment'); ?> <?php echo app('translator')->get('lang.list'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.study_material'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.assignment'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('lang.assignment'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
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
                            <td colspan="6">
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
                            <th><?php echo app('translator')->get('lang.content_title'); ?></th>
                            <th><?php echo app('translator')->get('lang.date'); ?></th>
                            <th><?php echo app('translator')->get('lang.available_for'); ?></th>
                            
                            <th style="max-width:30%"><?php echo app('translator')->get('lang.description'); ?></th>
                            <th><?php echo app('translator')->get('lang.action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($uploadContents)): ?>
                        <?php $__currentLoopData = $uploadContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e(@$value->content_title); ?></td>
                            <td  data-sort="<?php echo e(strtotime(@$value->upload_date)); ?>" >
                                <?php echo e(@$value->upload_date != ""? dateConvert(@$value->upload_date):''); ?>


                            </td>
                            <td>

                                <?php if(@$value->available_for_admin == 1): ?>
                                    <?php echo app('translator')->get('lang.all_admins'); ?><br>
                                <?php endif; ?>
                                <?php if(@$value->available_for_all_classes == 1): ?>
                                    <?php echo app('translator')->get('lang.all_classes_student'); ?>
                                <?php endif; ?>

                                <?php if(@$value->classes != "" && $value->sections != ""): ?>
                                    <?php echo app('translator')->get('lang.all_students_of'); ?> (<?php echo e(@$value->classes->class_name.'->'.@$value->sections->section_name); ?>)
                                <?php endif; ?>
                            </td>
                            
                             <td>

                            <?php echo e(@$value->description); ?>



                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('lang.select'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">

                                     <a data-modal-size="modal-lg" title="View Content Details" class="dropdown-item modalLink" href="<?php echo e(route('upload-content-student-view', $value->id)); ?>"><?php echo app('translator')->get('lang.view'); ?></a>

                                        <?php if(@$value->upload_file != ""): ?>
                                            <?php if(userPermission(28)): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('download-content-document',getFilePath3(@$value->upload_file))); ?>">
                                                <?php echo app('translator')->get('lang.download'); ?> <span class="pl ti-download"></span></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/studentPanel/assignmentList.blade.php ENDPATH**/ ?>