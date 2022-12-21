<?php
include "../confix/DB.php";

extract(@$_GET);


if ($str == 'constant') {
    @$constant = "SELECT * FROM constant  WHERE Stytem_No = '$Stytem_No' ";
    @$Sqlconstant = mysqli_query($con, $constant) or die("Error in query: $constant ");
    $Showconstant = mysqli_fetch_array($Sqlconstant);
    echo json_encode($Showconstant);
}


if ($str == 'Department') {
    @$department = "SELECT * FROM department  WHERE Dep_id = '$Dep_id' ";
    @$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");
    $ShowSqldepartment = mysqli_fetch_array($Sqldepartment);
    echo json_encode($ShowSqldepartment);
}


if ($str == 'Position') {
    @$position = "SELECT * FROM position  WHERE Pos_id = '$Pos_id' ";
    @$Sqlposition = mysqli_query($con, $position) or die("Error in query: $position ");
    $ShowSqlposition = mysqli_fetch_array($Sqlposition);
    echo json_encode($ShowSqlposition);
}

if ($str == 'Employee') {
    @$Employee = "SELECT * FROM employee  WHERE Emp_id = '$Emp_id' ";
    @$SqlEmployee = mysqli_query($con, $Employee) or die("Error in query: $Employee ");
    $ShowSqlEmployee = mysqli_fetch_array($SqlEmployee);

    $Dep_id = $ShowSqlEmployee['Dep_id'];
    @$SqlsDep = "SELECT * FROM department WHERE  Dep_id =  '$Dep_id' ";
    @$SqlsDepData = mysqli_query($con, $SqlsDep) or die("Error in query: $SqlsDep ");
    while ($ShowSqlsDepData = mysqli_fetch_array($SqlsDepData)) {
        @$Dep_name = $ShowSqlsDepData['Dep_name'];
    }

    $Pos_id = $ShowSqlEmployee['Pos_id'];
    @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
    @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
    while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
        @$Pos_name = $Showposition['Pos_name'];
    }



    $data = array(
        'Dep_name' => $Dep_name,
        'Pos_name' => $Pos_name,
        'Emp_id' => $ShowSqlEmployee['Emp_id'],
        'Emp_name' => $ShowSqlEmployee['Emp_name'],
        'Emp_tel' => $ShowSqlEmployee['Emp_tel'],
        'Emp_address' => $ShowSqlEmployee['Emp_address'],
        'Pos_id' => $ShowSqlEmployee['Pos_id'],
        'Dep_id' => $ShowSqlEmployee['Dep_id'],
    );
    echo json_encode($data);
}





if ($str == 'Peleave') {
    @$department = "SELECT * FROM leave_rights  WHERE Type_no = '$Type_id' ";
    @$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");
    $ShowSqldepartment = mysqli_fetch_array($Sqldepartment);
    $Pos_id = $ShowSqldepartment['Pos_id'];
    $Type_id = $ShowSqldepartment['Type_id'];

    @$ShowPosition = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
    @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
    while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
         @$Type_name = $Showposition['Type_name'];
    }


    @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
    @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
    while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
         @$Pos_name = $Showposition['Pos_name'];
    }


   $data = array(
        'Type_id' => $Type_id,
        'Pos_name' => $Pos_name,
        'Type_name' => $Type_name,
        'leave_maximum' => $ShowSqldepartment['leave_maximum'],
        'Pos_id' => $ShowSqldepartment['Pos_id']
    );

    echo json_encode($data);
}

if ($str == 'Peleave1') {
    @$department = "SELECT * FROM typeleave  WHERE Type_id = '$Type_id' ";
    @$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");
    $ShowSqldepartment = mysqli_fetch_array($Sqldepartment);
    echo json_encode($ShowSqldepartment);
}









/* if ($str == 'Peleave') {

    @$typeleave = "SELECT typeleave.Type_id , typeleave.Type_name , typeleave.Type_details , leave_rights.Pos_id ,leave_rights.leave_maximum  
FROM typeleave INNER JOIN leave_rights  ON typeleave.Type_id = leave_rights.Type_id WHERE leave_rights.Type_id = '$Type_id' ;  ";
    @$Sqltypeleave = mysqli_query($con, $typeleave) or die("Error in query: $typeleave ");

    $ShowSqltypeleave = mysqli_fetch_array($Sqltypeleave);


    $Pos_id = $ShowSqltypeleave['Pos_id'];
    @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
    @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
    while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
         @$Pos_name = $Showposition['Pos_name'];
    }


    $data = array(
        'Type_id' => $Type_id,
        'Pos_name' => $Pos_name,
        'Type_name' => $ShowSqltypeleave['Type_name'],
        'Type_details' => $ShowSqltypeleave['Type_details'],
        'leave_maximum' => $ShowSqltypeleave['leave_maximum'],
        'Pos_id' => $ShowSqltypeleave['Pos_id'],
        'Pos_name' => $Pos_name
    );

    echo json_encode($data);
}
 */