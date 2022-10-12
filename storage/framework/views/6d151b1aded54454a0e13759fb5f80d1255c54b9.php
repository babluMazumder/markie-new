
<?php if(userPermission(1)): ?>
    <li>
        <a href="<?php echo e(route('student-dashboard')); ?>">
            <span class="flaticon-resume"></span>
            <?php echo app('translator')->get('lang.dashboard'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(11)): ?>
    <li>
        <a href="<?php echo e(route('student-profile')); ?>">
            <span class="flaticon-resume"></span>
            <?php echo app('translator')->get('lang.my_profile'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(20)): ?>
    <li>
        <a href="#subMenuStudentFeesCollection" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle" href="#">
            <span class="flaticon-wallet"></span>
            <?php echo app('translator')->get('lang.fees'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuStudentFeesCollection">
            <?php if(moduleStatusCheck('FeesCollection')== false ): ?>
            <li>
                <a href="<?php echo e(route('student_fees')); ?>"><?php echo app('translator')->get('lang.pay_fees'); ?></a>
            </li>
            <?php else: ?>
            <li>
                <a href="<?php echo e(route('feescollection/student-fees')); ?>">b@lang('lang.pay_fees')</a>
            </li>

            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission(22)): ?>
    <li>
        <a href="<?php echo e(route('student_class_routine')); ?>">
            <span class="flaticon-calendar-1"></span>
            <?php echo app('translator')->get('lang.class_routine'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(23)): ?>
    <li>
        <a href="<?php echo e(route('student_homework')); ?>">
            <span class="flaticon-book"></span>
            <?php echo app('translator')->get('lang.home_work'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(26)): ?>
    <li>
        <a href="#subMenuDownloadCenter" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
        href="#">
            <span class="flaticon-data-storage"></span>
            <?php echo app('translator')->get('lang.download_center'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuDownloadCenter">
            <?php if(userPermission(27)): ?>
                <li>
                    <a href="<?php echo e(route('student_assignment')); ?>"><?php echo app('translator')->get('lang.assignment'); ?></a>
                </li>
            <?php endif; ?>
            
            <?php if(userPermission(31)): ?>
                <li>
                    <a href="<?php echo e(route('student_syllabus')); ?>"><?php echo app('translator')->get('lang.syllabus'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(33)): ?>
                <li>
                    <a href="<?php echo e(route('student_others_download')); ?>"><?php echo app('translator')->get('lang.other_download'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission(35)): ?>
    <li>
        <a href="<?php echo e(route('student_my_attendance')); ?>">
            <span class="flaticon-authentication"></span>
            <?php echo app('translator')->get('lang.attendance'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(36)): ?>
    <li>
        <a href="#subMenuStudentExam" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
        href="#">
            <span class="flaticon-test"></span>
            <?php echo app('translator')->get('lang.examinations'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuStudentExam">
            <?php if(userPermission(37)): ?>
                <li>
                    <a href="<?php echo e(route('mark_sheet_student')); ?>"><?php echo app('translator')->get('lang.result'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(38)): ?>
                <li>
                    <a href="<?php echo e(route('student_exam_schedule')); ?>"><?php echo app('translator')->get('lang.exam_schedule'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission(39)): ?>
    <li>
        <a href="#subMenuLeaveManagement" data-toggle="collapse" aria-expanded="false"
            class="dropdown-toggle">
            <span class="flaticon-slumber"></span>
            <?php echo app('translator')->get('lang.leave'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuLeaveManagement">

            <?php if(userPermission(40) || Auth::user()->role_id == 2): ?>

                <li>
                    <a href="<?php echo e(route('student-apply-leave')); ?>"><?php echo app('translator')->get('lang.apply_leave'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission(44) || Auth::user()->role_id == 2): ?>

                <li>
                        <a href="<?php echo e(route('student-pending-leave')); ?>"><?php echo app('translator')->get('lang.pending_leave_request'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission(45)): ?>
    <li>
        <a href="#subMenuStudentOnlineExam" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
        href="#">
            <span class="flaticon-test-1"></span>
            <?php echo app('translator')->get('lang.online_exam'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuStudentOnlineExam">
            <?php if(userPermission(46)): ?>
                <li>
                    <a href="<?php echo e(route('student_online_exam')); ?>"><?php echo app('translator')->get('lang.active_exams'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(47)): ?>
                <li>
                    <a href="<?php echo e(route('student_view_result')); ?>"><?php echo app('translator')->get('lang.view_result'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission(48)): ?>

    <li>
        <a href="<?php echo e(route('student_noticeboard')); ?>">
            <span class="flaticon-poster"></span>
            <?php echo app('translator')->get('lang.notice_board'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(49)): ?>
    <li>
        <a href="<?php echo e(route('student_subject')); ?>">
            <span class="flaticon-reading-1"></span>
            <?php echo app('translator')->get('lang.subjects'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(50)): ?>
    <li>
        <a href="<?php echo e(route('student_teacher')); ?>">
            <span class="flaticon-professor"></span>
            <?php echo app('translator')->get('lang.teacher'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(51)): ?>
    <li>
        <a href="#subMenuStudentLibrary" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
        href="#">
            <span class="flaticon-book-1"></span>
            <?php echo app('translator')->get('lang.library'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuStudentLibrary">
            <?php if(userPermission(52)): ?>
                <li>
                    <a href="<?php echo e(route('student_library')); ?>"> <?php echo app('translator')->get('lang.book_list'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(53)): ?>
                <li>
                    <a href="<?php echo e(route('student_book_issue')); ?>"><?php echo app('translator')->get('lang.book_issue'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission(54)): ?>
    <li>
        <a href="<?php echo e(route('student_transport')); ?>">
            <span class="flaticon-bus"></span>
            <?php echo app('translator')->get('lang.transport'); ?>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(55)): ?>
    <li>
        <a href="<?php echo e(route('student_dormitory')); ?>">
            <span class="flaticon-hotel"></span>
            <?php echo app('translator')->get('lang.dormitory'); ?>
        </a>
    </li>
<?php endif; ?>
<?php /**PATH C:\laragon\www\markie-new\resources\views/backEnd/partials/student_sidebar.blade.php ENDPATH**/ ?>