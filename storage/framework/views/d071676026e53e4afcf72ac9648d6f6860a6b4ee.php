<!DOCTYPE html>
<html lang="en">
<head>
  <title>Merit List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
   .marklist th, .marklist td{
        border: 1px solid black;
        padding:0px;
        font-size: 11px;
    }
    .marklist th{
        text-transform: capitalize;
        text-align: center; 
    }
    .marklist td{
        text-align: center;
    }
    body{
        padding: 0;
        font-family: "Poppins", sans-serif;
        font-weight: 400;

        margin-top: 5px; 
    }
    html{
        padding: 0px;
        margin: 0px;  
        font-family: "Poppins", sans-serif;
        font-weight: 300;


    }
    .container-fluid{ 
        /*padding-bottom: 20px;*/
    }
    h1,h2,h3,h4,h5{

        font-family: "Poppins", sans-serif;
        margin: 0px 0px !important;
        padding: 0px 0px !important;
    }
    table{
        margin: 0px !important;
    }
    .name{
        padding-left: 2px !important;
    }
</style>
<body>
 

<?php 
    $generalSetting= App\SmGeneralSettings::find(1); 
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    } 
?>
<div class="container-fluid"> 
    <table class="table" style="width: 100%">
            <tr >
                
                <th width="25%">
                    <img class="logo-img" width="50" src="<?php echo e(url('/')); ?>/<?php echo e($generalSetting->logo); ?>" alt=""> 
                </th>
                <th width="50%" style="text-align: center;"> 
                    <h5 class="text-white"> <?php echo e(isset($school_name)?$school_name:'Infix School Management ERP'); ?> </h5> 
                    <p class="text-white mb-0"> <?php echo e(isset($address)?$address:'Infix School Address'); ?> </p>
                </th>
                <th width="25%">
                    <p class="mb-0"> <?php echo app('translator')->get('lang.exam'); ?> : <span class="primary-color fw-500"><?php echo e($exam_name); ?></span> </p>
                    <p class="mb-0"> <?php echo app('translator')->get('lang.class'); ?>(<?php echo app('translator')->get('lang.section'); ?>) : <span class="primary-color fw-500"><?php echo e($class_name); ?>(<?php echo e($section->section_name); ?>)</span> </p>
                </th>

            </tr> 
    </table>
    <h3 style="width: 100%; text-align: center;">Merit List</h3>
 

                                        <table class="marklist" style="width: 100%">
                                            <thead>
                                                <tr style="border-bottom: 1px solid black !important">
                                                    <th>Merit <?php echo app('translator')->get('lang.position'); ?></th>
                                                    <th class="name"><?php echo app('translator')->get('lang.student'); ?></th>
                                                    <?php $__currentLoopData = $subjectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th><?php echo e($subject); ?></th>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <th><?php echo app('translator')->get('lang.total_mark'); ?></th>
                                                    <th><?php echo app('translator')->get('lang.average'); ?></th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <?php $i=1; $subject_mark = []; $total_student_mark = 0; ?>
                                                <?php $__currentLoopData = $allresult_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <tr>
                                                    <td><?php echo e($row->merit_order); ?></td>
                                                    <td style="text-align: left; padding-left: 4px !important;"><?php echo e($row->student_name); ?></td>

                                                    <?php 
                                                    $markslist = explode(',',$row->marks_string);
                                                    $total_subject = count($markslist);
                                                    
                                                    
                                                    ?>  
                                                    <?php if(!blank($markslist)): ?>
                                                        <?php $__currentLoopData = $markslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php 
                                                                $subject_mark[]= $mark;
                                                                $total_student_mark = $total_student_mark + $mark; 
                                                            ?> 
                                                            <td>  <?php echo e($mark != 0 && $mark != 1?$mark:'AB'); ?></td> 
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                     
                                                    <?php endif; ?>



                                                    <td><?php echo e($total_student_mark); ?></td>
                                                    <td>
                                                        <?php if($class_name == "SS 3" || $class_name == "SS 2"): ?>
                                                        <?php echo e(number_format($total_student_mark/9, 2)); ?>


                                                        <?php elseif($class_name == "SS 1"): ?>
                                                        <?php echo e(number_format($total_student_mark/13, 2)); ?>


                                                        <?php else: ?>

                                                       <?php echo e(number_format($total_student_mark/$total_subject, 2)); ?>


                                                       <?php endif; ?>
<!-- 
                                                        <?php echo e(!empty($row->average_mark)?$row->average_mark:0); ?>  -->


                                                        <?php $total_student_mark=0; ?>
                                                    </td> 
                                                   
                                                </tr> 

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                                            </tbody>
                                        </table> 
 

</body>
</html>
    
<?php /**PATH /home/maxicare/hwti.sch.ng/resources/views/backEnd/reports/merit_list_report_print.blade.php ENDPATH**/ ?>