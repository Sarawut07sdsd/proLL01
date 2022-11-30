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
@$department = "SELECT * FROM department  ";
@$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");

//position
@$position = "SELECT * FROM position  ";
@$Sqlposition = mysqli_query($con, $position) or die("Error in query: $position ");

//typeleave+leave_rights
@$typeleave = "SELECT typeleave.Type_id , typeleave.Type_name , typeleave.Type_details , leave_rights.Pos_id ,leave_rights.leave_maximum  
FROM typeleave INNER JOIN leave_rights  ON typeleave.Type_id = leave_rights.Type_id ";
@$Sqltypeleave = mysqli_query($con, $typeleave) or die("Error in query: $typeleave ");



//employee
$ps = 0;
$DataPos = [];
@$Sqlposition1 = mysqli_query($con, $position) or die("Error in query: $position ");
while ($Showposition1 = mysqli_fetch_array($Sqlposition1)) {
    $ps++;
    $DataPos[$ps]  =  $Showposition1['Pos_id'];
}

@$employeeCEO = "SELECT * FROM employee  WHERE Pos_id = '$DataPos[1]'   ";
@$SqlemployeeCEO = mysqli_query($con, $employeeCEO) or die("Error in query: $employeeCEO ");

@$employeeHR = "SELECT * FROM employee  WHERE Pos_id = '$DataPos[2]'   ";
@$SqlemployeeHR = mysqli_query($con, $employeeHR) or die("Error in query: $employeeHR ");

@$employeeEmp = "SELECT * FROM employee  WHERE Pos_id = '$DataPos[3]'   ";
@$SqlemployeeEmp = mysqli_query($con, $employeeEmp) or die("Error in query: $employeeEmp ");


