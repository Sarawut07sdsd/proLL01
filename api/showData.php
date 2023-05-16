<?php






$Pos_id = $_SESSION['Pos_id'];
@$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
@$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
    @$Pos_name = $Showposition['Pos_name'];
}


/*********************************************************************************** */

//constant
@$constant = "SELECT * FROM constant  ";
@$Sqlconstant = mysqli_query($con, $constant) or die("Error in query: $constant ");


//department
@$department = "SELECT * FROM department ORDER BY Dep_name ASC   ";
@$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");

//position
@$position = "SELECT * FROM position ORDER BY Pos_name ASC ";
@$Sqlposition = mysqli_query($con, $position) or die("Error in query: $position ");

//typeleave+leave_rights
/* @$typeleave = "SELECT typeleave.Type_id , typeleave.Type_name , typeleave.Type_details , leave_rights.Pos_id ,leave_rights.leave_maximum  
FROM typeleave INNER JOIN leave_rights  ON typeleave.Type_id = leave_rights.Type_id ";
@$Sqltypeleave = mysqli_query($con, $typeleave) or die("Error in query: $typeleave "); */

@$typeleave = "SELECT * FROM typeleave ORDER BY Type_name DESC ";
@$Sqltypeleave = mysqli_query($con, $typeleave) or die("Error in query: $typeleave ");

@$leave_rights = "SELECT * FROM leave_rights ORDER BY Pos_id ASC";
@$Sqltleave_rights = mysqli_query($con, $leave_rights) or die("Error in query: $leave_rights ");


//employee
$ps = 0;
$DataPos = [];
@$position1 = "SELECT * FROM position ORDER BY user_group ASC ";
@$Sqlposition1 = mysqli_query($con, $position1) or die("Error in query: $position ");
while ($Showposition1 = mysqli_fetch_array($Sqlposition1)) {
    $ps++;
    $DataPos[$ps]  =  $Showposition1['Pos_id'];
}

@$employeeCEO = "SELECT * FROM employee  WHERE Pos_id = 'POS2901'   ";
@$SqlemployeeCEO = mysqli_query($con, $employeeCEO) or die("Error in query: $employeeCEO ");


@$employeeCEO = "SELECT * FROM employee  WHERE Pos_id = 'POS2991'   ";
@$SqlemployeeEmp2 = mysqli_query($con, $employeeCEO) or die("Error in query: $employeeCEO ");

@$employeeHR = "SELECT * FROM employee  WHERE Pos_id = '$DataPos[1]'   ";
@$SqlemployeeHR = mysqli_query($con, $employeeHR) or die("Error in query: $employeeHR ");



@$employeeEmp = "SELECT * FROM employee ORDER BY Pos_id ASC   ";
@$SqlemployeeEmp = mysqli_query($con, $employeeEmp) or die("Error in query: $employeeEmp ");



//timetable
$ls = "";

if ($_SESSION['user_group'] == '2') {
    $Emp_id = $_SESSION['Emp_id'];
    @$ls =  "where Emp_id = " . " '$Emp_id' ";
}

@$timetable = "SELECT * FROM timetable $ls ORDER BY Ttb_date DESC    ";
@$Sqltimetable = mysqli_query($con, $timetable) or die("Error in query: $timetable ");


//leave

/* @$leave = "SELECT * FROM leave ORDER BY Leave_date DESC    ";
@$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave "); */