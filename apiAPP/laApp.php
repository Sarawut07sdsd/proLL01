<?php
include "confix.php";

$Leave_id = rand(100000, 999999); //รหัส
@$Leave_date = date("Y-m-d"); // วันที่ทำรายการ
@$Leave_start = $_GET['Leave_start']; // เริ่มลา
@$Leave_end = $_GET['Leave_end']; //สิ้นสุดการลา
@$Leave_status = '1'; //สถานะ
@$Leave_reason = $_GET['Leave_reason']; //เหตุผล
@$Type_id = $_GET['Type_id']; //ประเภทการลา 
@$Emp_id = $_GET['user'];
@$strcheck = true;


@$sql = "SELECT * FROM  `typeleave` where Type_id = '$Type_id' ";
@$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
while ($namesql = mysqli_fetch_array($sqlshow)) {
  @$k++;
  @$datesom = 0;
  @$datesomSum = 0;
  @$sql1 = "SELECT * FROM  `leave_rights` where Type_id = '$Type_id'  ";
  @$sqlshow1 = mysqli_query($con, $sql1) or die("Error in query: $sql1 ");
  while ($namesql1 = mysqli_fetch_array($sqlshow1)) {
    @$leave_maximum =   @$namesql1['leave_maximum'];
  }

  @$leave = "SELECT * FROM `leaves` WHERE  Emp_id = '$Emp_id' and Leave_status = '2'  and Type_id = '$Type_id';    ";
  @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
  while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
    @$Leave_start =   $ShowSqlleave['Leave_start'];
    @$Leave_end =   $ShowSqlleave['Leave_end'];
    @$datesom =  substr($Leave_end, 8) - substr($Leave_start, 8);
    @$datesomSum = $datesomSum + @$datesom;
  }

  @$check = $leave_maximum - $datesomSum;

  if (@$check < 0) {
    @$strcheck = false;
  }
}


if ($strcheck == true) {
  @$sql = "INSERT INTO `leaves`
  (Leave_id,Leave_date,Leave_start,Leave_end,Leave_status,Leave_reason
  ,Type_id,Emp_id
  )
  VALUES
  ('$Leave_id', '$Leave_date','$Leave_start', '$Leave_end','$Leave_status'
  , '$Leave_reason' ,'$Type_id', '$Emp_id'
  )";
  @$result = mysqli_query($con, $sql);
  mysqli_close($con);
  @$data = array("success" => '1', "text" => '', 'strcheck' => $strcheck, 'check' => $check);
} else {
  @$data = array("success" => '0', "text" => '', 'strcheck' => $strcheck, 'check' => $check);
}


echo json_encode(@$data);
