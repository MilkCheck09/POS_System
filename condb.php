<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


$condb = mysqli_connect("localhost","root","","my_pos") 
or die ("Error :".mysqli_error($condb));
mysqli_query($condb,"SET NAMES UTF8");
date_default_timezone_set('Asia/Bangkok');

//error_reporting( error_reporting() & ~E_NOTICE );//ปิดerror ที่ต้องใส่ @
 //if($condb){
 	//echo "Connect";
 //}else{
 	//echo "error";
//}




?>