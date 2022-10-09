<?php
$school_config = schoolConfig();
?>
<nav id="sidebar">

    <div class="sidebar-header update_sidebar">
        <a href="<?php echo e(route('/')); ?>">
            <?php if(! is_null($school_config->logo)): ?>
            <img  src="<?php echo e(asset($school_config->logo)); ?>" alt="logo">
            <?php else: ?>
            <img  src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>" alt="logo">
            <?php endif; ?>
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>

    <?php if(Auth::user()->is_saas == 0): ?>

        <ul class="list-unstyled components">
            <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3 ): ?>
                

                <?php if(userPermission(1)): ?>

                    <li>
                        <?php if(moduleStatusCheck('Saas')== TRUE && Auth::user()->is_administrator=="yes" && Session::get('isSchoolAdmin')==FALSE && Auth::user()->role_id == 1): ?>

                            <a href="<?php echo e(route('superadmin-dashboard')); ?>" id="superadmin-dashboard">
                                <?php else: ?>
                                    
                                    <a href="<?php echo e(route('admin-dashboard')); ?>" id="admin-dashboard">
                                        <?php endif; ?>
                                        <span class="flaticon-speedometer"></span>
                                        <?php echo app('translator')->get('lang.dashboard'); ?>
                                    </a>

                    </li>
                <?php endif; ?>
            <?php endif; ?>

            
            <?php if(moduleStatusCheck('InfixBiometrics')== TRUE && Auth::user()->role_id == 1): ?>
                <?php echo $__env->make('infixbiometrics::menu.InfixBiometrics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <?php if(moduleStatusCheck('ParentRegistration')== TRUE && Auth::user()->role_id ==1 && moduleStatusCheck('Saas')==False ): ?>
                <?php echo $__env->make('parentregistration::menu.ParentRegistration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <?php if(moduleStatusCheck('SaasSubscription')== TRUE && Auth::user()->is_administrator != "yes"): ?>
                <?php echo $__env->make('saassubscription::menu.SaasSubscriptionSchool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
                 
            
            <?php if(moduleStatusCheck('Saas')== TRUE && Auth::user()->is_administrator =="yes" && Session::get('isSchoolAdmin')==FALSE && Auth::user()->role_id == 1 ): ?>

                <?php echo $__env->make('saas::menu.Saas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>

                <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3 ): ?>

                    
                    <?php if(userPermission(11)): ?>
                        <li>
                            <a href="#subMenuAdmin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-analytics"></span>
                                <?php echo app('translator')->get('lang.admin_section'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuAdmin">
                                <?php if(userPermission(12)): ?>
                                    <li>
                                        <a href="<?php echo e(route('admission_query')); ?>"><?php echo app('translator')->get('lang.admission_query'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(16)): ?>
                                    <li>
                                        <a href="<?php echo e(route('visitor')); ?>"><?php echo app('translator')->get('lang.visitor_book'); ?> </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(21)): ?>
                                    <li>
                                        <a href="<?php echo e(route('complaint')); ?>"><?php echo app('translator')->get('lang.complaint'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(27)): ?>
                                    <li>
                                        <a href="<?php echo e(route('postal-receive')); ?>"><?php echo app('translator')->get('lang.postal_receive'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(32)): ?>
                                    <li>
                                        <a href="<?php echo e(route('postal-dispatch')); ?>"><?php echo app('translator')->get('lang.postal_dispatch'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(36)): ?>
                                    <li>
                                        <a href="<?php echo e(route('phone-call')); ?>"><?php echo app('translator')->get('lang.phone_call_log'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(41)): ?>
                                    <li>
                                        <a href="<?php echo e(route('setup-admin')); ?>"><?php echo app('translator')->get('lang.admin_setup'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(49)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student-certificate')); ?>"><?php echo app('translator')->get('lang.student_certificate'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(53)): ?>
                                    <li>
                                        <a href="<?php echo e(route('generate_certificate')); ?>"><?php echo app('translator')->get('lang.generate_certificate'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(45)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student-id-card')); ?>"><?php echo app('translator')->get('lang.student_id_card'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(57)): ?>
                                    <li>
                                        <a href="<?php echo e(route('generate_id_card')); ?>"><?php echo app('translator')->get('lang.generate_id_card'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                    <?php endif; ?>


                    
                    <?php if(userPermission(61)): ?>
                        <li>
                            <a href="#subMenuStudent" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-reading"></span>
                                <?php echo app('translator')->get('lang.student_information'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuStudent">

                                <?php if(userPermission(71)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_category')); ?>"> <?php echo app('translator')->get('lang.student_category'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(62)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_admission')); ?>"><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.student'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(64)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_list')); ?>"> <?php echo app('translator')->get('lang.student_list'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(68)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_attendance')); ?>"> <?php echo app('translator')->get('lang.student_attendance'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(70)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_attendance_report')); ?>"> <?php echo app('translator')->get('lang.student_attendance_report'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(533)): ?>
                                    <li>
                                        <a href="<?php echo e(route('subject-wise-attendance')); ?>"> <?php echo app('translator')->get('lang.subject'); ?> <?php echo app('translator')->get('lang.wise'); ?> <?php echo app('translator')->get('lang.attendance'); ?> </a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(535)): ?>

                                    <li>
                                        <a href="<?php echo e(route('subject-attendance-report')); ?>"> <?php echo app('translator')->get('lang.subject_attendance_report'); ?> </a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(76)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_group')); ?>"><?php echo app('translator')->get('lang.student_group'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(81)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_promote')); ?>"><?php echo app('translator')->get('lang.student_promote'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(83)): ?>
                                    <li>
                                        <a href="<?php echo e(route('disabled_student')); ?>"><?php echo app('translator')->get('lang.disabled_student'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    
                    <?php if(userPermission(245)): ?>
                        <li>
                            <a href="#subMenuAcademic" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-graduated-student"></span>
                                <?php echo app('translator')->get('lang.academics'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuAcademic">


                                <?php if(userPermission(537)): ?>
                                    <li>
                                        <a href="<?php echo e(route('optional-subject')); ?>"> <?php echo app('translator')->get('lang.optional'); ?> <?php echo app('translator')->get('lang.subject'); ?> </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(265)): ?>
                                    <li>
                                        <a href="<?php echo e(route('section')); ?>"> <?php echo app('translator')->get('lang.section'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(261)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class')); ?>"> <?php echo app('translator')->get('lang.class'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(257)): ?>
                                    <li>
                                        <a href="<?php echo e(route('subject')); ?>"> <?php echo app('translator')->get('lang.subjects'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(253)): ?>
                                    <li>
                                        <a href="<?php echo e(route('assign-class-teacher')); ?>"> <?php echo app('translator')->get('lang.assign_class_teacher'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(250)): ?>
                                    <li>
                                        <a href="<?php echo e(route('assign_subject')); ?>"> <?php echo app('translator')->get('lang.assign_subject'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(269)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class-room')); ?>"> <?php echo app('translator')->get('lang.class_room'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(273)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class-time')); ?>"> <?php echo app('translator')->get('lang.class_time_setup'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(246)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class_routine_new')); ?>"> <?php echo app('translator')->get('lang.class_routine'); ?></a>

                                    </li>
                                <?php endif; ?>



                            <!-- only for teacher -->
                                <?php if(Auth::user()->role_id == 4): ?>
                                    <li>
                                        <a href="<?php echo e(route('view-teacher-routine')); ?>"><?php echo app('translator')->get('lang.view'); ?> <?php echo app('translator')->get('lang.class_routine'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>


                    
                    <?php if(userPermission(87)): ?>
                        <li>
                            <a href="#subMenuTeacher" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-professor"></span>
                                <?php echo app('translator')->get('lang.study_material'); ?>
                            </a>

                            <ul class="collapse list-unstyled" id="subMenuTeacher">
                                <?php if(userPermission(88)): ?>
                                    <li>
                                        <a href="<?php echo e(route('upload-content')); ?>"> <?php echo app('translator')->get('lang.upload_content'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(92)): ?>
                                    <li>
                                        <a href="<?php echo e(route('assignment-list')); ?>"><?php echo app('translator')->get('lang.assignment'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(100)): ?>
                                    <li>
                                        <a href="<?php echo e(route('syllabus-list')); ?>"><?php echo app('translator')->get('lang.syllabus'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(105)): ?>
                                    <li>
                                        <a href="<?php echo e(route('other-download-list')); ?>"><?php echo app('translator')->get('lang.other_download'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    

                    
                    <?php if(moduleStatusCheck('FeesCollection')== TRUE): ?>
                        <?php echo $__env->make('feescollection::menu.FeesCollection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php if(userPermission(108)): ?>
                            <li>
                                <a href="#subMenuFeesCollection" data-toggle="collapse" aria-expanded="false"
                                   class="dropdown-toggle">
                                    <span class="flaticon-wallet"></span>
                                    <?php echo app('translator')->get('lang.fees_collection'); ?>
                                </a>
                                <ul class="collapse list-unstyled" id="subMenuFeesCollection">
                                    <?php if(userPermission(123)): ?>
                                        <li>
                                            <a href="<?php echo e(route('fees_group')); ?>"> <?php echo app('translator')->get('lang.fees_group'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(127)): ?>
                                        <li>
                                            <a href="<?php echo e(route('fees_type')); ?>"> <?php echo app('translator')->get('lang.fees_type'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(131)): ?>
                                        <li>
                                            <a href="<?php echo e(route('fees-master')); ?>"> <?php echo app('translator')->get('lang.fees_master'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(118)): ?>
                                        <li>
                                            <a href="<?php echo e(route('fees_discount')); ?>"> <?php echo app('translator')->get('lang.fees_discount'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(109)): ?>
                                        <li>
                                            <a href="<?php echo e(route('collect_fees')); ?>"> <?php echo app('translator')->get('lang.collect_fees'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(113)): ?>
                                        <li>
                                            <a href="<?php echo e(route('search_fees_payment')); ?>"> <?php echo app('translator')->get('lang.search_fees_payment'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(116)): ?>
                                        <li>
                                            <a href="<?php echo e(route('search_fees_due')); ?>"> <?php echo app('translator')->get('lang.search_fees_due'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <li>
                                        <a href="<?php echo e(route('bank-payment-slip')); ?>"> <?php echo app('translator')->get('lang.bank'); ?>  <?php echo app('translator')->get('lang.payment'); ?></a>
                                    </li>

                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    

                    
                    
                    <?php if(userPermission(137)): ?>
                        <li>
                            <a href="#subMenuAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-accounting"></span>
                                <?php echo app('translator')->get('lang.accounts'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuAccount">
                                <?php if(userPermission(148)): ?>
                                    <li>
                                        <a href="<?php echo e(route('chart-of-account')); ?>"> <?php echo app('translator')->get('lang.chart_of_account'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(156)): ?>
                                    <li>
                                        <a href="<?php echo e(route('bank-account')); ?>"> <?php echo app('translator')->get('lang.bank_account'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(139)): ?>
                                    <li>
                                        <a href="<?php echo e(route('add_income')); ?>"> <?php echo app('translator')->get('lang.income'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(138)): ?>
                                    <li>
                                        <a href="<?php echo e(route('profit')); ?>"> <?php echo app('translator')->get('lang.profit'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(143)): ?>
                                    <li>
                                        <a href="<?php echo e(route('add-expense')); ?>"> <?php echo app('translator')->get('lang.expense'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(147)): ?>
                                    <li>
                                        <a href="<?php echo e(route('search_account')); ?>"> <?php echo app('translator')->get('lang.search'); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>


                    
                    <?php if(userPermission(160)): ?>
                        <li>
                            <a href="#subMenuHumanResource" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <span class="flaticon-consultation"></span>
                                <?php echo app('translator')->get('lang.human_resource'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuHumanResource">
                                <?php if(userPermission(180)): ?>
                                    <li>
                                        <a href="<?php echo e(route('designation')); ?>"> <?php echo app('translator')->get('lang.designation'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(184)): ?>
                                    <li>
                                        <a href="<?php echo e(route('department')); ?>"> <?php echo app('translator')->get('lang.department'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(161)): ?>
                                    <li>
                                        <a href="<?php echo e(route('addStaff')); ?>"> <?php echo app('translator')->get('lang.add'); ?>  <?php echo app('translator')->get('lang.staff'); ?> </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(161)): ?>
                                    <li>
                                        <a href="<?php echo e(route('staff_directory')); ?>"> <?php echo app('translator')->get('lang.staff_directory'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(165)): ?>
                                    <li>
                                        <a href="<?php echo e(route('staff_attendance')); ?>"> <?php echo app('translator')->get('lang.staff_attendance'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(169)): ?>
                                    <li>
                                        <a href="<?php echo e(route('staff_attendance_report')); ?>"> <?php echo app('translator')->get('lang.staff_attendance_report'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(170)): ?>
                                    <li>
                                        <a href="<?php echo e(route('payroll')); ?>"> <?php echo app('translator')->get('lang.payroll'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(178)): ?>
                                    <li>
                                        <a href="<?php echo e(route('payroll-report')); ?>"> <?php echo app('translator')->get('lang.payroll_report'); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>



                    
                    <?php if(userPermission(188)): ?>
                        <li>
                            <a href="#subMenuLeaveManagement" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <span class="flaticon-slumber"></span>
                                <?php echo app('translator')->get('lang.leave'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuLeaveManagement">
                                <?php if(userPermission(203)): ?>
                                    <li>
                                        <a href="<?php echo e(route('leave-type')); ?>"> <?php echo app('translator')->get('lang.leave_type'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(199)): ?>
                                    <li>
                                        <a href="<?php echo e(route('leave-define')); ?>"> <?php echo app('translator')->get('lang.leave_define'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(189)): ?>
                                    <li>
                                        <a href="<?php echo e(route('approve-leave')); ?>"><?php echo app('translator')->get('lang.approve_leave_request'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(196)): ?>
                                    <li>
                                        <a href="<?php echo e(route('pending-leave')); ?>"><?php echo app('translator')->get('lang.pending_leave_request'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->role_id!=1): ?>
                                    
                                    <?php if(userPermission(193)): ?>
                                        <li>
                                            <a href="<?php echo e(route('apply-leave')); ?>"><?php echo app('translator')->get('lang.apply_leave'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>


                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(userPermission(207)): ?>
                        <li>
                            <a href="#subMenuExam" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-test"></span>
                                <?php echo app('translator')->get('lang.examination'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuExam">
                                <?php if(userPermission(225)): ?>
                                    <li>
                                        <a href="<?php echo e(route('marks-grade')); ?>"> <?php echo app('translator')->get('lang.marks_grade'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(208)): ?>
                                    <li>
                                        <a href="<?php echo e(route('exam-time')); ?>"> <?php echo app('translator')->get('lang.exam_time'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('exam-type')); ?>"> <?php echo app('translator')->get('lang.add_exam_type'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(214)): ?>
                                    <li>
                                        <a href="<?php echo e(route('exam')); ?>"> <?php echo app('translator')->get('lang.exam_setup'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(217)): ?>
                                    <li>
                                        <a href="<?php echo e(route('exam_schedule')); ?>"> <?php echo app('translator')->get('lang.exam_schedule'); ?></a>
                                    </li>
                                <?php endif; ?>



                                <?php if(userPermission(225)): ?>
                                    <li>
                                        <a href="<?php echo e(route('exam_attendance')); ?>"> <?php echo app('translator')->get('lang.exam_attendance'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(225)): ?>
                                    <li>
                                        <a href="<?php echo e(route('marks_register')); ?>"> <?php echo app('translator')->get('lang.marks_register'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(229)): ?>
                                    <li>
                                        <a href="<?php echo e(route('send_marks_by_sms')); ?>"> <?php echo app('translator')->get('lang.send_marks_by_sms'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(230)): ?>
                                    <li>
                                        <a href="<?php echo e(route('question-group')); ?>"><?php echo app('translator')->get('lang.question_group'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(234)): ?>
                                    <li>
                                        <a href="<?php echo e(route('question-bank')); ?>"><?php echo app('translator')->get('lang.question_bank'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(238)): ?>
                                    <li>
                                        <a href="<?php echo e(route('online-exam')); ?>"><?php echo app('translator')->get('lang.online_exam'); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>



                    <?php if(userPermission(277)): ?>

                        <li>
                            <a href="#subMenuHomework" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-book"></span>
                                <?php echo app('translator')->get('lang.home_work'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuHomework">
                                <?php if(userPermission(278)): ?>
                                    <li>
                                        <a href="<?php echo e(route('add-homeworks')); ?>"> <?php echo app('translator')->get('lang.add_homework'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(280)): ?>
                                    <li>
                                        <a href="<?php echo e(route('homework-list')); ?>"> <?php echo app('translator')->get('lang.homework_list'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(284)): ?>
                                    <li>
                                        <a href="<?php echo e(route('evaluation-report')); ?>"> <?php echo app('translator')->get('lang.evaluation_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                    <?php endif; ?>

                    <?php if(userPermission(286)): ?>
                        <li>
                            <a href="#subMenuCommunicate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-email"></span>
                                <?php echo app('translator')->get('lang.communicate'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuCommunicate">
                                <?php if(userPermission(287)): ?>
                                    <li>
                                        <a href="<?php echo e(route('notice-list')); ?>"><?php echo app('translator')->get('lang.notice_board'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(@$config->Saas == 1 && Auth::user()->is_administrator != "yes" ): ?>

                                    <li>
                                        <a href="<?php echo e(route('administrator-notice')); ?>"><?php echo app('translator')->get('lang.administrator'); ?> <?php echo app('translator')->get('lang.notice'); ?></a>
                                    </li>

                                <?php endif; ?>

                                <?php if(userPermission(291)): ?>
                                    <li>
                                        <a href="<?php echo e(route('send-email-sms-view')); ?>"><?php echo app('translator')->get('lang.send_email'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(293)): ?>
                                    <li>
                                        <a href="<?php echo e(route('email-sms-log')); ?>"><?php echo app('translator')->get('lang.email_sms_log'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(294)): ?>
                                    <li>
                                        <a href="<?php echo e(route('event')); ?>"><?php echo app('translator')->get('lang.event'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo e(route('sms-template-new')); ?>"><?php echo app('translator')->get('lang.sms_template'); ?></a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(userPermission(298)): ?>
                        <li>
                            <a href="#subMenulibrary" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-book-1"></span>
                                <?php echo app('translator')->get('lang.library'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenulibrary">
                                <?php if(userPermission(304)): ?>
                                    <li>
                                        <a href="<?php echo e(route('book-category-list')); ?>"> <?php echo app('translator')->get('lang.book_category'); ?></a>
                                    </li>
                                <?php endif; ?>
                                

                                <li>
                                    <a href="<?php echo e(route('library_subject')); ?>"> <?php echo app('translator')->get('lang.subject'); ?></a>
                                </li>
                                
                                <?php if(userPermission(299)): ?>
                                    <li>
                                        <a href="<?php echo e(route('add-book')); ?>"> <?php echo app('translator')->get('lang.add_book'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(301)): ?>
                                    <li>
                                        <a href="<?php echo e(route('book-list')); ?>"> <?php echo app('translator')->get('lang.book_list'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(308)): ?>
                                    <li>
                                        <a href="<?php echo e(route('library-member')); ?>"> <?php echo app('translator')->get('lang.library_member'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(311)): ?>
                                    <li>
                                        <a href="<?php echo e(route('member-list')); ?>"> <?php echo app('translator')->get('lang.member_list'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(314)): ?>
                                    <li>
                                        <a href="<?php echo e(route('all-issed-book')); ?>"> <?php echo app('translator')->get('lang.all_issued_book'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(userPermission(315)): ?>
                        <li>
                            <a href="#subMenuInventory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-inventory"></span>
                                <?php echo app('translator')->get('lang.inventory'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuInventory">
                                <?php if(userPermission(316)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-category')); ?>"> <?php echo app('translator')->get('lang.item_category'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(320)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-list')); ?>"> <?php echo app('translator')->get('lang.item_list'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(324)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-store')); ?>"> <?php echo app('translator')->get('lang.item_store'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(328)): ?>
                                    <li>
                                        <a href="<?php echo e(route('suppliers')); ?>"> <?php echo app('translator')->get('lang.supplier'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(332)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-receive')); ?>"> <?php echo app('translator')->get('lang.item_receive'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(334)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-receive-list')); ?>"> <?php echo app('translator')->get('lang.item_receive_list'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(339)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-sell-list')); ?>"> <?php echo app('translator')->get('lang.item_sell'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(345)): ?>
                                    <li>
                                        <a href="<?php echo e(route('item-issue')); ?>"> <?php echo app('translator')->get('lang.item_issue'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(userPermission(348)): ?>
                        <li>
                            <a href="#subMenuTransport" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-bus"></span>
                                <?php echo app('translator')->get('lang.transport'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuTransport">
                                <?php if(userPermission(349)): ?>
                                    <li>
                                        <a href="<?php echo e(route('transport-route')); ?>"> <?php echo app('translator')->get('lang.routes'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(353)): ?>
                                    <li>
                                        <a href="<?php echo e(route('vehicle')); ?>"> <?php echo app('translator')->get('lang.vehicle'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(357)): ?>
                                    <li>
                                        <a href="<?php echo e(route('assign-vehicle')); ?>"> <?php echo app('translator')->get('lang.assign_vehicle'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(361)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_transport_report')); ?>"> <?php echo app('translator')->get('lang.student_transport_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(userPermission(362)): ?>
                        <li>
                            <a href="#subMenuDormitory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-hotel"></span>
                                <?php echo app('translator')->get('lang.dormitory'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenuDormitory">
                                <?php if(userPermission(371)): ?>
                                    <li>
                                        <a href="<?php echo e(route('room-type')); ?>"> <?php echo app('translator')->get('lang.room_type'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(367)): ?>
                                    <li>
                                        <a href="<?php echo e(route('dormitory-list')); ?>"> <?php echo app('translator')->get('lang.dormitory'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(363)): ?>
                                    <li>
                                        <a href="<?php echo e(route('room-list')); ?>"> <?php echo app('translator')->get('lang.dormitory_rooms'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(375)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_dormitory_report')); ?>"> <?php echo app('translator')->get('lang.student_dormitory_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(userPermission(376)): ?>
                        <li>
                            <a href="#subMenusystemReports" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <span class="flaticon-analysis"></span>
                                <?php echo app('translator')->get('lang.reports'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenusystemReports">
                                <?php if(userPermission(538)): ?>

                                    <li>
                                        <a href="<?php echo e(route('student_report')); ?>"><?php echo app('translator')->get('lang.student_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(377)): ?>
                                    <li>
                                        <a href="<?php echo e(route('guardian_report')); ?>"><?php echo app('translator')->get('lang.guardian_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(378)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_history')); ?>"><?php echo app('translator')->get('lang.student_history'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(379)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_login_report')); ?>"><?php echo app('translator')->get('lang.student_login_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(381)): ?>
                                    <li>
                                        <a href="<?php echo e(route('fees_statement')); ?>"><?php echo app('translator')->get('lang.fees_statement'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(382)): ?>
                                    <li>
                                        <a href="<?php echo e(route('balance_fees_report')); ?>"><?php echo app('translator')->get('lang.balance_fees_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(383)): ?>
                                    <li>
                                        <a href="<?php echo e(route('transaction_report')); ?>"><?php echo app('translator')->get('lang.transaction_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(384)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class_report')); ?>"><?php echo app('translator')->get('lang.class_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(385)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class_routine_report')); ?>"><?php echo app('translator')->get('lang.class_routine'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(386)): ?>
                                    <li>
                                        <a href="<?php echo e(route('exam_routine_report')); ?>"><?php echo app('translator')->get('lang.exam_routine'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(387)): ?>
                                    <li>
                                        <a href="<?php echo e(route('teacher_class_routine_report')); ?>"><?php echo app('translator')->get('lang.teacher'); ?> <?php echo app('translator')->get('lang.class_routine'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(388)): ?>
                                    <li>
                                        <a href="<?php echo e(route('merit_list_report')); ?>"><?php echo app('translator')->get('lang.merit_list_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(388)): ?>
                                    <li>
                                        <a href="<?php echo e(route('custom-merit-list')); ?>"><?php echo app('translator')->get('custom'); ?> <?php echo app('translator')->get('lang.merit_list_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(389)): ?>
                                    <li>
                                        <a href="<?php echo e(route('online_exam_report')); ?>"><?php echo app('translator')->get('lang.online_exam_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(390)): ?>
                                    <li>
                                        <a href="<?php echo e(route('mark_sheet_report_student')); ?>"><?php echo app('translator')->get('lang.mark_sheet_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(391)): ?>
                                    <li>
                                        <a href="<?php echo e(route('tabulation_sheet_report')); ?>"><?php echo app('translator')->get('lang.tabulation_sheet_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(392)): ?>
                                    <li>
                                        <a href="<?php echo e(route('progress_card_report')); ?>"><?php echo app('translator')->get('lang.progress_card_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(392)): ?>
                                    <li>
                                        <a href="<?php echo e(route('custom-progress-card')); ?>"> <?php echo app('translator')->get('lang.custom'); ?> <?php echo app('translator')->get('lang.progress_card_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(393)): ?>
                                    <li>
                                        <a href="<?php echo e(route('student_fine_report')); ?>"><?php echo app('translator')->get('lang.student_fine_report'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(394)): ?>
                                    <li>
                                        <a href="<?php echo e(route('user_log')); ?>"><?php echo app('translator')->get('lang.user_log'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(539)): ?>
                                    <li>
                                        <a href="<?php echo e(route('previous-class-results')); ?>"><?php echo app('translator')->get('lang.previous'); ?> <?php echo app('translator')->get('lang.result'); ?> </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(540)): ?>
                                    <li>
                                        <a href="<?php echo e(route('previous-record')); ?>"><?php echo app('translator')->get('lang.previous'); ?> <?php echo app('translator')->get('lang.record'); ?> </a>
                                    </li>
                                <?php endif; ?>
                                


                                <?php if(Auth::user()->role_id == 1): ?>
                                    <?php if(moduleStatusCheck('ResultReports')== TRUE): ?>
                                        
                                        <li>
                                            <a href="<?php echo e(route('resultreports/cumulative-sheet-report')); ?>"><?php echo app('translator')->get('lang.cumulative'); ?> <?php echo app('translator')->get('lang.sheet'); ?> <?php echo app('translator')->get('lang.report'); ?></a>
                                        </li>

                                        <li>
                                            <a href="<?php echo e(route('resultreports/continuous-assessment-report')); ?>"><?php echo app('translator')->get('lang.contonuous'); ?> <?php echo app('translator')->get('lang.assessment'); ?> <?php echo app('translator')->get('lang.report'); ?></a>
                                        </li>
                                        <li>

                                            <a href="<?php echo e(route('resultreports/termly-academic-report')); ?>"><?php echo app('translator')->get('lang.termly'); ?> <?php echo app('translator')->get('lang.academic'); ?> <?php echo app('translator')->get('lang.report'); ?></a>
                                        </li>
                                        <li>

                                            <a href="<?php echo e(route('resultreports/academic-performance-report')); ?>"><?php echo app('translator')->get('lang.academic'); ?> <?php echo app('translator')->get('lang.performance'); ?> <?php echo app('translator')->get('lang.report'); ?></a>
                                        </li>
                                        <li>

                                            <a href="<?php echo e(route('resultreports/terminal-report-sheet')); ?>"><?php echo app('translator')->get('lang.terminal'); ?> <?php echo app('translator')->get('lang.report'); ?> <?php echo app('translator')->get('lang.sheet'); ?></a>
                                        </li>
                                        <li>

                                            <a href="<?php echo e(route('resultreports/continuous-assessment-sheet')); ?>"><?php echo app('translator')->get('lang.continuous'); ?> <?php echo app('translator')->get('lang.assessment'); ?> <?php echo app('translator')->get('lang.sheet'); ?></a>
                                        </li>
                                        <li>

                                            <a href="<?php echo e(route('resultreports/result-version-two')); ?>"><?php echo app('translator')->get('lang.result'); ?> <?php echo app('translator')->get('lang.version'); ?> V2</a>
                                        </li>
                                        <li>

                                            <a href="<?php echo e(route('resultreports/result-version-three')); ?>"><?php echo app('translator')->get('lang.result'); ?> <?php echo app('translator')->get('lang.version'); ?> V3</a>
                                        </li>
                                        
                                    <?php endif; ?>
                                <?php endif; ?>


                            </ul>
                        </li>
                    <?php endif; ?>
                    

                    <?php if(userPermission(398)): ?>
                        <li>
                            <a href="#subMenusystemSettings" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <span class="flaticon-settings"></span>
                                <?php echo app('translator')->get('lang.system_settings'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="subMenusystemSettings">

                                <?php if((moduleStatusCheck('Saas')== TRUE) && (auth()->user()->is_administrator=="yes")): ?>
                                    <li>
                                        <a href="<?php echo e(route('school-general-settings')); ?>"> <?php echo app('translator')->get('lang.general_settings'); ?></a>
                                    </li>
                                <?php else: ?>
                                    <?php if(userPermission(405)): ?>

                                        <li>
                                            <a href="<?php echo e(route('general-settings')); ?>"> <?php echo app('translator')->get('lang.general_settings'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>




                                <?php if(userPermission(417)): ?>

                                    <li>
                                        <a href="<?php echo e(route('rolepermission/role')); ?>"><?php echo app('translator')->get('lang.role'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(421)): ?>

                                    <li>
                                        <a href="<?php echo e(route('login-access-control')); ?>"><?php echo app('translator')->get('lang.login_permission'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(userPermission(424)): ?>
                                    <li>
                                        <a href="<?php echo e(route('class_optional')); ?>"><?php echo app('translator')->get('lang.optional'); ?> <?php echo app('translator')->get('lang.subject'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(121)): ?>
                                    
                                <?php endif; ?>


                                <?php if(userPermission(432)): ?>
                                    <li>
                                        <a href="<?php echo e(route('academic-year')); ?>"><?php echo app('translator')->get('lang.academic_year'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(436)): ?>
                                    <li>
                                        <a href="<?php echo e(route('custom-result-setting')); ?>"><?php echo app('translator')->get('lang.custom_result_setting'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(440)): ?>

                                    <li>
                                        <a href="<?php echo e(route('holiday')); ?>"><?php echo app('translator')->get('lang.holiday'); ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php if(userPermission(448)): ?>

                                    <li>
                                        <a href="<?php echo e(route('weekend')); ?>"><?php echo app('translator')->get('lang.weekend'); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(userPermission(412)): ?>

                                    <li>
                                        <a href="<?php echo e(route('payment-method-settings')); ?>"><?php echo app('translator')->get('lang.payment_method_settings'); ?></a>
                                    </li>
                                <?php endif; ?>





                                

                                <?php if(moduleStatusCheck('Saas')== FALSE   ): ?>

                                    <?php echo $__env->make('backEnd/partials/without_saas_school_admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endif; ?>



                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(moduleStatusCheck('Saas')== FALSE): ?>
                        <?php if(userPermission(485)): ?>
                            <li>
                                <a href="#subMenusystemStyle" data-toggle="collapse" aria-expanded="false"
                                   class="dropdown-toggle">
                                    <span class="flaticon-settings"></span>
                                    <?php echo app('translator')->get('lang.style'); ?>
                                </a>
                                <ul class="collapse list-unstyled" id="subMenusystemStyle">
                                    <?php if(userPermission(486)): ?>
                                        <li>
                                            <a href="<?php echo e(route('background-setting')); ?>"><?php echo app('translator')->get('lang.background_settings'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(490)): ?>
                                        <li>
                                            <a href="<?php echo e(route('color-style')); ?>"><?php echo app('translator')->get('lang.color'); ?> <?php echo app('translator')->get('lang.theme'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if(moduleStatusCheck('Saas')== FALSE): ?>
                        <?php if(userPermission(492)): ?>

                            <li>
                                <a href="#subMenufrontEndSettings" data-toggle="collapse" aria-expanded="false"
                                   class="dropdown-toggle">
                                    <span class="flaticon-software"></span>
                                    <?php echo app('translator')->get('lang.front_settings'); ?>
                                </a>
                                <ul class="collapse list-unstyled" id="subMenufrontEndSettings">
                                    <?php if(userPermission(493)): ?>
                                        <li>
                                            <a href="<?php echo e(route('admin-home-page')); ?>"> <?php echo app('translator')->get('lang.home_page'); ?> </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(userPermission(795)): ?>
                                        <li>
                                            <a href="<?php echo e(route('news_index')); ?>"><?php echo app('translator')->get('lang.news_list'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(500)): ?>
                                        <li>
                                            <a href="<?php echo e(route('news-category')); ?>"><?php echo app('translator')->get('lang.news'); ?> <?php echo app('translator')->get('lang.category'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(504)): ?>
                                        <li>
                                            <a href="<?php echo e(route('testimonial_index')); ?>"><?php echo app('translator')->get('lang.testimonial'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(509)): ?>
                                        <li>
                                            <a href="<?php echo e(route('course-list')); ?>"><?php echo app('translator')->get('lang.course_list'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(514)): ?>
                                        <li>
                                            <a href="<?php echo e(route('conpactPage')); ?>"><?php echo app('translator')->get('lang.contact'); ?> <?php echo app('translator')->get('lang.page'); ?> </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(517)): ?>
                                        <li>
                                            <a href="<?php echo e(route('contactMessage')); ?>"><?php echo app('translator')->get('lang.contact'); ?> <?php echo app('translator')->get('lang.message'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(520)): ?>
                                        <li>
                                            <a href="<?php echo e(route('about-page')); ?>"> <?php echo app('translator')->get('lang.about_us'); ?> </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(523)): ?>
                                        <li>
                                            <a href="<?php echo e(route('news-heading-update')); ?>"><?php echo app('translator')->get('lang.news_heading'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(525)): ?>
                                        <li>
                                            <a href="<?php echo e(route('course-heading-update')); ?>"><?php echo app('translator')->get('lang.course_heading'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(527)): ?>
                                    <li>
                                        <a href="<?php echo e(route('custom-links')); ?>"> <?php echo app('translator')->get('lang.footer_widget'); ?> </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(userPermission(529)): ?>
                                        <li>
                                            <a href="<?php echo e(route('social-media')); ?>"> <?php echo app('translator')->get('lang.social_media'); ?> </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(moduleStatusCheck('Saas')== TRUE  && Auth::user()->is_administrator != "yes" ): ?>

                        <li>
                            <a href="#Ticket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <span class="flaticon-settings"></span>
                                <?php echo app('translator')->get('lang.ticket_system'); ?>
                            </a>
                            <ul class="collapse list-unstyled" id="Ticket">
                                <li><a href="<?php echo e(route('school/ticket-view')); ?>"><?php echo app('translator')->get('lang.ticket_list'); ?></a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>
                <?php endif; ?>

            <!-- Student Panel -->
                <?php if(Auth::user()->role_id == 2): ?>
                <!-- Zoom Menu -->
                    
                    <?php echo $__env->make('backEnd/partials/student_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <!-- End student panel -->

                <!-- Parents Panel Menu -->
                <?php if(Auth::user()->role_id == 3): ?>
               
                    <?php echo $__env->make('backEnd/partials/parents_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <!-- End Parents Panel Menu -->

                <!-- Zoom Menu -->
                <?php if(moduleStatusCheck('Zoom') == TRUE): ?>
                    <?php echo $__env->make('zoom::menu.Zoom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <!-- End Zoom Menu -->

            <?php endif; ?>
        </ul>
    <?php endif; ?>
       
    <?php if(Auth::user()->is_saas == 1): ?>
        
        <?php echo $__env->make('saasrolepermission::menu.SaasAdminMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(Auth::user()->is_saas == 1 && Auth::user()->role_id != 1): ?>
        <ul class="list-unstyled components">
            <li>
                <a href="<?php echo e(route('saas/institution-list')); ?>" id="superadmin-dashboard">
                    <span class="flaticon-analytics"></span>
                    institution List
                </a>
            </li>
        </ul>
    <?php endif; ?>


</nav>
<?php /**PATH F:\xamppSF\htdocs\laravel\markie\markie_new\resources\views/backEnd/partials/sidebar.blade.php ENDPATH**/ ?>