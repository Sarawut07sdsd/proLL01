<?php

include "confix.php";
@$Emp_id = $_GET['Emp_id'];
$data = array();
 
$department = "SELECT * FROM employee WHERE Emp_id= '" . $Emp_id . "'  ";
@$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");
while ($Showposition = mysqli_fetch_array($Sqldepartment)) {
$Emp_name = $Showposition['Emp_name'];
}

@$department = "SELECT * FROM `timetable` where Emp_id = '$Emp_id'  ";
@$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");
while ($Showposition = mysqli_fetch_array($Sqldepartment)) {
    @$data[] = array(
        'Ttb_date' => @$Showposition['Ttb_date'],
        'Ttb_timein' => @$Showposition['Ttb_timein'],
        'Ttb_radiusin' => @$Showposition['Ttb_radiusin'],
        'Ttb_timeinout' => @$Showposition['Ttb_timeinout'],
        'Ttb_radiusout' => @$Showposition['Ttb_radiusout'],
        'Emp_name' => @$Emp_name
    );
}
echo json_encode($data);
