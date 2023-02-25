<?php 

header('Content-Type', 'text/plain');
header('Content-Type: application/json');
header('Content-Length');
header('X-Custom-Header', 'AnotherValue');
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Methods", "GET,PUT,PATCH,POST,DELETE");
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Methods", "GET,PUT,PATCH,POST,DELETE");
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: *");
    
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"); 
header('Content-type:application/json;charset=utf-8');
$con= mysqli_connect("localhost","root","","leave_system") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');
