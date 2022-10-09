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
 

@php 
    $generalSetting= App\SmGeneralSettings::find(1); 
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    } 
@endphp
<div class="container-fluid"> 
    <table class="table" style="width: 100%">
            <tr >
                
                <th width="25%">
                    <img class="logo-img" width="50" src="{{ url('/')}}/{{$generalSetting->logo }}" alt=""> 
                </th>
                <th width="50%" style="text-align: center;"> 
                    <h5 class="text-white"> {{isset($school_name)?$school_name:'Infix School Management ERP'}} </h5> 
                    <p class="text-white mb-0"> {{isset($address)?$address:'Infix School Address'}} </p>
                </th>
                <th width="25%">
                    <p class="mb-0"> @lang('lang.exam') : <span class="primary-color fw-500">{{$exam_name}}</span> </p>
                    <p class="mb-0"> @lang('lang.class')(@lang('lang.section')) : <span class="primary-color fw-500">{{$class_name}}({{$section->section_name}})</span> </p>
                </th>

            </tr> 
    </table>
    <h3 style="width: 100%; text-align: center;">Merit List</h3>
 

                                        <table class="marklist" style="width: 100%">
                                            <thead>
                                                <tr style="border-bottom: 1px solid black !important">
                                                    <th>Merit @lang('lang.position')</th>
                                                    <th class="name">@lang('lang.student')</th>
                                                    @foreach($subjectlist as $subject)
                                                    <th>{{$subject}}</th>
                                                    @endforeach

                                                    <th>@lang('lang.total_mark')</th>
                                                    <th>@lang('lang.average')</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                @php $i=1; $subject_mark = []; $total_student_mark = 0; @endphp
                                                @foreach($allresult_data as $row) 
                                                <tr>
                                                    <td>{{$row->merit_order}}</td>
                                                    <td style="text-align: left; padding-left: 4px !important;">{{$row->student_name}}</td>

                                                    @php 
                                                    $markslist = explode(',',$row->marks_string);
                                                    $total_subject = count($markslist);
                                                    
                                                    
                                                    @endphp  
                                                    @if(!blank($markslist))
                                                        @foreach($markslist as $mark)
                                                            @php 
                                                                $subject_mark[]= $mark;
                                                                $total_student_mark = $total_student_mark + $mark; 
                                                            @endphp 
                                                            <td>  {{$mark != 0 && $mark != 1?$mark:'AB'}}</td> 
                                                        @endforeach
                                                     
                                                    @endif



                                                    <td>{{$total_student_mark}}</td>
                                                    <td>
                                                        @if($class_name == "SS 3" || $class_name == "SS 2")
                                                        {{number_format($total_student_mark/9, 2)}}

                                                        @elseif($class_name == "SS 1")
                                                        {{number_format($total_student_mark/13, 2)}}

                                                        @else

                                                       {{number_format($total_student_mark/$total_subject, 2)}}

                                                       @endif
<!-- 
                                                        {{!empty($row->average_mark)?$row->average_mark:0}}  -->


                                                        @php $total_student_mark=0; @endphp
                                                    </td> 
                                                   
                                                </tr> 

                                                @endforeach 

                                            </tbody>
                                        </table> 
 

</body>
</html>
    
