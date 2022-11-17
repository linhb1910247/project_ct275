<?php
    if(!empty($_GET['msg'])){
        $msg= unserialize(urldecode($_GET['msg']));
       foreach( $msg as $key => $value ){
        echo '  <div class="container mt-4">
        <h2>Thông báo</h2>
        <div class="alert alert-success">
          <strong>'.$value.'</strong> 
        </div> ';
        }
    }
   
use Carbon\Carbon;
use Carbon\CarbonInterval;

require 'vendor/autoload.php';
if(isset($_POST['thoigian'])){
    $thoigian = $_POST['thoigian'];
   
  
}else{
    $thoigian='';
    $subdays=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();
}

if($thoigian=='7ngay'){
    $subdays=Carbon::now('asia/ho_chi_minh')->subdays(7)->toDateString();
}else if($thoigian=='28ngay'){
    $subdays=Carbon::now('asia/ho_chi_minh')->subdays(28)->toDateString();
}else if($thoigian=='90ngay'){
    $subdays=Carbon::now('asia/ho_chi_minh')->subdays(90)->toDateString();
}else if($thoigian=='365ngay'){
    $subdays=Carbon::now('asia/ho_chi_minh')->subdays(365)->toDateString();
}
$now=Carbon::now('asia/ho_chi_minh')->toDateString();


    
  
?>
<div class="container"  style="min-width:1280px">

<p >Thống kê đơn hàng theo: <span id="text-date"></span></p>


   <p><select class="select-date"  >
    <option value="7ngay">7 ngày</option>
    <option value="28ngay">28 ngày</option>
    <option value="90ngay">90 ngày</option>
    <option value="365ngay">365 ngày</option>
    </select></p>   
<div id="chart" style="height: 250px;"></div>
</div>
