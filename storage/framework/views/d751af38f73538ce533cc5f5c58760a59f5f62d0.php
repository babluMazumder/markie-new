<style>
    .footer-list ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 50px;
    }

    .footer-list ul li {
        display: block;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .f_title {
        margin-bottom: 40px;
    }

    .f_title h4 {
        color: #415094;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 0px;
    }
</style>



<?php

$links = App\SmCustomLink::find(1);
    $setting = App\SmGeneralSettings::find(1);
    if (isset($setting->copyright_text)) {
        $copyright_text = $setting->copyright_text;
    } else {
        $copyright_text = 'Copyright © 2019 All rights reserved | This template is made with by Codethemes';
    }

    
if(moduleStatusCheck('ParentRegistration')){
    $is_registration_permission = Modules\ParentRegistration\Entities\SmRegistrationSetting::first('position'); 
}

$setting  = generalSetting();
?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" <?php if(isset ($ttl_rtl ) && $ttl_rtl ==1): ?> dir="rtl" class="rtl" <?php endif; ?> >

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="Infix is 100+ unique feature enable school management software system. It can manage all type of school, academy and any educational institution"/>
    <link rel="icon" href="<?php echo e(asset($setting->favicon)); ?>" type="image/png"/>
    <title><?php echo e($setting->site_title ? $setting->site_title :  'Infix Edu ERP'); ?></title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <!-- Bootstrap CSS -->
    <?php if( $setting->site_title == 1): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/rtl/bootstrap.min.css"/>
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css"/>
    <?php endif; ?>


    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/jquery-ui.css"/>


    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/nice-select.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/magnific-popup.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fastselect.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/owl.carousel.min.css"/>
    <!-- main css -->


    <?php if($setting->site_title ==1): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/rtl/style.css"/>
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/<?php echo e(@activeStyle()->path_main_style); ?>"/>
    <?php endif; ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.print.css">


    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/infix.css"/>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body class="client light">

<!--================ Start Header Menu Area =================-->
<header class="header-area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box-1420">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>/home">
                    <img class="w-75" src="<?php echo e(asset($setting->logo ? $setting->logo : 'public/uploads/settings/logo.png')); ?>" alt="Infix Logo" style="max-width: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <?php if(moduleStatusCheck('Saas')== FALSE): ?>
                            <li class="nav-item  <?php echo e(Request::path() == '/' ||  Request::path() == 'home'? 'active':''); ?> ">
                                <a
                                        class="nav-link" href="<?php echo e(url('/')); ?>/home">Home</a></li>
                            <li class="nav-item <?php echo e(Request::path() == 'about'? 'active':''); ?>"><a class="nav-link"
                                                                                                href="<?php echo e(url('/')); ?>/about">About</a>
                            </li>
                            <li class="nav-item <?php echo e(Request::path() == 'course'? 'active':''); ?>"><a class="nav-link"
                                                                                                 href="<?php echo e(url('/')); ?>/course">Course</a>
                            </li>
                            <li class="nav-item <?php echo e(Request::path() == 'news-page'? 'active':''); ?>"><a class="nav-link"
                                                                                                    href="<?php echo e(url('/')); ?>/news-page">News</a>
                            </li>
                            <li class="nav-item <?php echo e(Request::path() == 'contact'? 'active':''); ?>"><a class="nav-link"
                                                                                                  href="<?php echo e(url('/')); ?>/contact">Contact</a>
                            </li>
                            <?php if(Auth::user() ==""): ?>
                                <li class="nav-item <?php echo e(Request::path() == 'login'? 'active':''); ?>"><a class="nav-link"
                                                                                                    href="<?php echo e(url('/')); ?>/login">Login</a>
                                </li>
                            <?php endif; ?>

                            <?php if(moduleStatusCheck('ParentRegistration')== TRUE): ?>
                           
                                <?php if(isset($is_registration_permission) && $is_registration_permission->position==1): ?>
                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php echo e(url('/parentregistration/registration')); ?>">Student
                                            Registration</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>

                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo e(url('/login')); ?>" target="_blank">Demo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="<?php echo e(url('/')); ?>#Support">Support</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="<?php echo e(url('/')); ?>#Price">Price</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="<?php echo e(url('/')); ?>#Contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/login')); ?>" target="_blank">LOGIN</a>
                            </li>
                            <?php if(moduleStatusCheck('ParentRegistration')== TRUE): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/parentregistration/registration')); ?>" target="_blank">Student
                                    Signup</a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/institution-register-new')); ?>" target="_blank">School
                                    Signup</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav mr-auto search-bar">
                            <li class="">
                            </li>
                        </ul>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->
<?php echo $__env->yieldContent('main_content'); ?>

<!--================Footer Area =================-->
<footer class="footer_area section-gap-top">
    <div class="container">
        <div class="row footer_inner">
            <?php if(isset($per["Custom Links"])): ?>
                <?php
                    $url[1]=[1,2,3,4];
                    $url[2]=[5,6,7,8];
                    $url[3]=[9,10,11,12];
                    $url[4]=[13,14,15,16];
                    for($i=1; $i<=4; $i++){
                     $title ='title'.$i ;
                ?>
                <div class="col-lg-3 col-sm-6">
                    <aside class="f_widget ab_widget">
                        <div class="f_title">
                            <h4><?php echo e($links!=""?$links->$title:''); ?></h4>
                        </div>
                        <ul>
                            <?php
                                foreach($url[$i] as $j){
                                    $link_label ='link_label'.$j ;
                                    $link_href ='link_href'.$j ;
                            ?>
                            <li>
                                <a href="<?php echo e($links !="" ? $links->$link_href:''); ?>"
                                   style="color: #828bb2"> <?php echo e($links !="" ? $links->$link_label:''); ?> </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </aside>
                </div>
                <?php } ?>
            <?php endif; ?>

        </div>
        <div class="row single-footer-widget">
            <div class="col-lg-8 col-md-9">
                <div class="copy_right_text">
                    <p><?php echo $copyright_text; ?></p>
                </div>
            </div>

            <?php if(isset($per["Social Icons"])): ?>
                <div class="col-lg-4 col-md-3">
                    <div class="social_widget">
                        <a href="<?php echo e(@$links->facebook_url); ?>"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo e(@$links->twitter_url); ?>"><i class="fa fa-twitter"></i></a>
                        <a href="<?php echo e(@$links->dribble_url); ?>"><i class="fa fa-dribbble"></i></a>
                        <a href="<?php echo e(@$links->linkedin_url); ?>"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-ui.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/popper.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap.min.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/nice-select.min.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery.magnific-popup.min.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/raphael-min.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/morris.min.js">
</script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/owl.carousel.min.js"></script>

<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/moment.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="<?php echo e(asset('public/backEnd/')); ?>/js/gmap3.min.js"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwzmSafhk_bBIdIy7MjwVIAVU1MgUmXY4"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDs3mrTgrYd6_hJS50x4Sha1lPtS2T-_JA"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/custom.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/developer.js"></script>

<?php echo $__env->yieldContent('script'); ?>

</body>
</html>

<?php /**PATH C:\laragon\www\markie-new\resources\views/frontEnd/home/front_master.blade.php ENDPATH**/ ?>