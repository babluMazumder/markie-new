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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Login card</title>
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
    hr {
    margin-top: 10px !important;
    margin-bottom: 0px !important;
    border: 0;
    border-top: 1px solid #eee;
}

.font-span{
    font-size: 15px;
}
</style>
<body>
 
    <div style="width: 840px !important; height: auto;">
        @php

        $i = 0;
        @endphp
        @foreach($students as $student)
        @php

        

        $i++;

        @endphp

        <div style="text-align: left; width: 280px; float: left; height: 210px;  {{$i == 15? 'padding-bottom: 200px !important':''}}">
            <div style="border: 1px solid #ddd; padding:8px; margin:5px;">
                <div style="background: #050d6e !important; color: aliceblue; padding: 4px;">
                    <img class="logo-img" width="50" src="{{ url('/')}}/{{$generalSetting->logo }}" alt=""> 
                    <span style="font-size: 20px; font-weight: bold;">Login Card</span><br>
                </div>
                <span class="font-span" ><strong>Name: </strong><span style="text-transform: capitalize;">{{$student->first_name.' '.$student->last_name}}</span></span><br>
                <span class="font-span" ><strong>Class: </strong>{{$student->class->class_name}}({{@$student->section->section_name}})</span><br>
                <span class="font-span" ><strong>Username: </strong>{{$student->user->username}}</span><br>
                <span class="font-span" ><strong>Access PIN: </strong>{{$student->user->pin_password}}</span><br>
            </div>
        </div>
        @php

        

        if($i == 3){
            echo '<br>';
        }   
        @endphp
        @endforeach
    </div>
   
</body>
</html>
    
