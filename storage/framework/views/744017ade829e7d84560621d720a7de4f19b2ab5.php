
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>Examinations </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                <a href="#">Examinations</a>
                <a href="<?php echo e(route('marks_register')); ?>">Marks Register</a>
                <a href="<?php echo e(route('marks_register_create')); ?>">Fill Marks</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30">Select Criteria </h3>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks_register_create', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_subject'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="Select Exam *" value="">Select Exam *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam_type->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam_type->id? 'selected':''):''); ?>><?php echo e($exam_type->title); ?></option>
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
                                    <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
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
                                    <option data-display="<?php echo app('translator')->get('lang.select_section'); ?> *" value=" "><?php echo app('translator')->get('lang.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>


                            <div class="col-lg-3 mt-30-md" id="select_subject_div">
                                <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject" id="select_subject" name="subject">
                                    <option data-display="Select subject *" value="">Select subject *</option>
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

<?php if(isset($students)): ?>


<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30">Fill Marks</h3>
                </div>
            </div>
        </div>


    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks_register_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'marks_register_store'])); ?> 


        <input type="hidden" name="exam_id" value="<?php echo e($exam_id); ?>">
        <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
        <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
        <input type="hidden" name="subject_id" value="<?php echo e($subject_id); ?>"> 

        <div class="row">
            <div class="col-lg-12">
                <table class="display school-table school-table-style" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th rowspan="2" >Admission No.</th>
                            <th rowspan="2" >Roll No.</th>
                            <th rowspan="2" >Student</th>
                            <th colspan="<?php echo e($number_of_exam_parts + 1); ?>"> <?php echo e($subjectNames->subject_name); ?></th> 
                            <th rowspan="2">Is Present</th>
                        </tr>
                        <tr>
                            <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($part->exam_title); ?> ( <?php echo e($part->exam_mark); ?> ) </th>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo app('translator')->get('teacher'); ?> <?php echo app('translator')->get('remarks'); ?></th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php $colspan = 3; $counter = 0;  ?>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $absent_check = App\SmMarksRegister::is_absent_check($exam_id, $class_id, $section_id, $subject_id, $student->id);
                            
                            
                        ?>

                        <tr>
                            <td>
                                <input type="hidden" name="student_ids[]" value="<?php echo e($student->id); ?>">
                                <input type="hidden" name="student_rolls[<?php echo e($student->id); ?>]" value="<?php echo e($student->roll_no); ?>">
                                <input type="hidden" name="student_admissions[<?php echo e($student->id); ?>]" value="<?php echo e($student->admission_no); ?>">
                                <?php echo e($student->admission_no); ?>

                            </td>
                            <td><?php echo e($student->roll_no); ?></td>
                            <td><?php echo e($student->full_name); ?></td>
                            <?php $entry_form_count=0; //dd($marks_entry_form); ?>
                            <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php $d = 5 + rand()%5;   ?>
                            <td>
                                <div class="input-effect mt-10">
                                <input type="hidden" name="exam_setup_ids[]" value="<?php echo e($part->id); ?>">
                                <?php 
                                $search_mark = App\SmMarkStore::get_mark_by_part($student->id, $part->exam_term_id, $part->class_id, $part->section_id, $part->subject_id, $part->id); 
                                ?>
                                    <input class="primary-input marks_input" type="number" step="any" max="<?php echo e(@$part->exam_mark); ?>"
                                    name="marks[<?php echo e($student->id); ?>][<?php echo e($part->id); ?>]" value="<?php echo e(!empty($search_mark)?$search_mark:0); ?>" <?php echo e(@$absent_check->attendance_type == 'A' || @$absent_check->attendance_type == ''? 'readonly':''); ?>>
                                    
                                    <input class="primary-input" type="hidden" name="exam_Sids[<?php echo e($student->id); ?>][<?php echo e($entry_form_count++); ?>]" value="<?php echo e($part->id); ?>">
                                    
                                    <input type="hidden" id="part_marks" name="part_marks" value="<?php echo e($part->exam_mark); ?>">
                                    
                                    <label><?php echo e($part->exam_title); ?> Mark</label>
                                    <span class="focus-border"></span>
                                </div>                                
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php 

                             $teacher_remarks = App\SmMarkStore::teacher_remarks($student->id, $exam_id, $student->class_id, $student->section_id, $subject_id); 
                            ?>

                            <td>
                                <div class="input-effect mt-10">
                                <input class="primary-input" type="text" name="teacher_remarks[<?php echo e($student->id); ?>][<?php echo e($part->subject_id); ?>]" value="<?php echo e($teacher_remarks); ?>" <?php echo e(@$absent_check->attendance_type == 'A' || @$absent_check->attendance_type == ''? 'readonly':''); ?> >
                                <label><?php echo app('translator')->get('teacher'); ?> <?php echo app('translator')->get('remarks'); ?></label>
                                <span class="focus-border"></span>
                            </div>
                            </td>

                             <?php $is_absent_check = App\SmMarkStore::is_absent_check($student->id, $part->exam_term_id, $part->class_id, $part->section_id, $part->subject_id); ?>

                            <td>
                                <div class="input-effect">
                                    

                                    <?php if(@$absent_check->attendance_type == 'P'): ?>
                                    <button class="primary-btn small fix-gr-bg" type="button"><?php echo app('translator')->get('lang.present'); ?></button>
                                    <?php else: ?>
                                    <button class="primary-btn small bg-danger text-white border-0" type="button"><?php echo app('translator')->get('lang.absent'); ?></button>
                                    <?php endif; ?>

                                    


                                    <?php if(@$absent_check->attendance_type == 'A'): ?>
                                    <input type="hidden" name="absent_students[]" value="<?php echo e($student->id); ?>">
                                    <?php endif; ?>
                                </div>
                                    
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td colspan="<?php echo e(count($marks_entry_form) + 5); ?>" class="text-center">
                                <button type="submit" class="primary-btn fix-gr-bg mt-20">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('save'); ?> <?php echo app('translator')->get('marks'); ?>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

               
                
              
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/examination/masks_register_create.blade.php ENDPATH**/ ?>