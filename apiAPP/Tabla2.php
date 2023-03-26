<?php
include "confix.php";
@$Emp_id = $_GET['Emp_id'];
@$str = $_GET['str'];

$data = array();


if ($str == 'datala') {
    @$sql = "SELECT * FROM  `typeleave`  ";
    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
    while ($namesql = mysqli_fetch_array($sqlshow)) {
        @$Type_id =  $namesql['Type_id'];
        @$k++;
        @$datesom = 0;
        @$datesomSum = 0;
        @$sql1 = "SELECT * FROM  `leave_rights` where Type_id = '$Type_id'  ";
        @$sqlshow1 = mysqli_query($con, $sql1) or die("Error in query: $sql1 ");
        while ($namesql1 = mysqli_fetch_array($sqlshow1)) {
            $leave_maximum =   $namesql1['leave_maximum'];
        }

        @$leave = "SELECT * FROM `leaves` WHERE  Emp_id = '$Emp_id' and Leave_status = '2'  and Type_id = '$Type_id';    ";
        @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
        while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
            @$Leave_start =   $ShowSqlleave['Leave_start'];
            @$Leave_end =   $ShowSqlleave['Leave_end'];
            @$datesom =  substr($Leave_end, 8) - substr($Leave_start, 8);
            @$datesomSum = $datesomSum + $datesom;
        }

        @$data[] = array(
            'num' => @$k,
            'Type_name' => @$namesql['Type_name'],
            'leave_maximum' => @$leave_maximum,
            'datesomSum' => @$datesomSum,
            'sum' => @$leave_maximum - $datesomSum,
        );
    }

    echo json_encode($data);
} else if ($str == 'laYa') {

    @$leave = "SELECT * FROM `leaves` WHERE  Leave_status = 2 ORDER BY Leave_date DESC;    ";
    @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
    while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
        @$i++;
        $Emp_id = $ShowSqlleave['Emp_id'];
        @$sql = "SELECT * FROM employee WHERE  Emp_id =  '$Emp_id' ";
        @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
        while ($namesql = mysqli_fetch_array($sqlshow)) {
            @$Emp_name = $namesql['Emp_name'];
        }

        @$Type_id =   $ShowSqlleave['Type_id'];
        @$sql = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
        @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
        while ($namesql = mysqli_fetch_array($sqlshow)) {
            @$Type_name = $namesql['Type_name'];
        }
        $Leave_status =  $ShowSqlleave['Leave_status'];
       

        @$data[] = array(
            'Leave_id' => @$ShowSqlleave['Leave_id'],
            'Emp_name' => @$Emp_name,
            'Type_name' => @$Type_name,
            'Leave_date' => @$ShowSqlleave['Leave_date'],
            'Leave_start' => @$ShowSqlleave['Leave_start'],
            'Leave_end' => @$ShowSqlleave['Leave_end'],
            'App_date' => @$ShowSqlleave['App_date'],
            'Leave_reason' => @$ShowSqlleave['Leave_reason'],
            'App_note' => @$ShowSqlleave['App_note'],
            'text'=> 'อนุมัติการลางานแล้ว'
        );
    }
    echo json_encode($data);
} else if ($str == 'laNo') {
    @$leave = "SELECT * FROM `leaves` WHERE  Leave_status = 3 ORDER BY Leave_date DESC;    ";
    @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
    while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
        @$i++;
        $Emp_id = $ShowSqlleave['Emp_id'];
        @$sql = "SELECT * FROM employee WHERE  Emp_id =  '$Emp_id' ";
        @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
        while ($namesql = mysqli_fetch_array($sqlshow)) {
            @$Emp_name = $namesql['Emp_name'];
        }

        @$Type_id =   $ShowSqlleave['Type_id'];
        @$sql = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
        @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
        while ($namesql = mysqli_fetch_array($sqlshow)) {
            @$Type_name = $namesql['Type_name'];
        }
        $Leave_status =  $ShowSqlleave['Leave_status'];
       

        @$data[] = array(
            'Leave_id' => @$ShowSqlleave['Leave_id'],
            'Emp_name' => @$Emp_name,
            'Type_name' => @$Type_name,
            'Leave_date' => @$ShowSqlleave['Leave_date'],
            'Leave_start' => @$ShowSqlleave['Leave_start'],
            'Leave_end' => @$ShowSqlleave['Leave_end'],
            'App_date' => @$ShowSqlleave['App_date'],
            'Leave_reason' => @$ShowSqlleave['Leave_reason'],
            'App_note' => @$ShowSqlleave['App_note'],
            'text'=> 'ไม่อนุมัติ'
        );
    }
    echo json_encode($data);
} else if ($str == 'lalo') {
    @$leave = "SELECT * FROM `leaves` WHERE  Leave_status = 1 ORDER BY Leave_date DESC;    ";
    @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
    while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
        @$i++;
        $Emp_id = $ShowSqlleave['Emp_id'];
        @$sql = "SELECT * FROM employee WHERE  Emp_id =  '$Emp_id' ";
        @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
        while ($namesql = mysqli_fetch_array($sqlshow)) {
            @$Emp_name = $namesql['Emp_name'];
        }

        @$Type_id =   $ShowSqlleave['Type_id'];
        @$sql = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
        @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
        while ($namesql = mysqli_fetch_array($sqlshow)) {
            @$Type_name = $namesql['Type_name'];
        }
        $Leave_status =  $ShowSqlleave['Leave_status'];
       

        @$data[] = array(
            'Leave_id' => @$ShowSqlleave['Leave_id'],
            'Emp_name' => @$Emp_name,
            'Type_name' => @$Type_name,
            'Leave_date' => @$ShowSqlleave['Leave_date'],
            'Leave_start' => @$ShowSqlleave['Leave_start'],
            'Leave_end' => @$ShowSqlleave['Leave_end'],
            'App_date' => @$ShowSqlleave['App_date'],
            'Leave_reason' => @$ShowSqlleave['Leave_reason'],
            'App_note' => @$ShowSqlleave['App_note'],
            'text'=> 'รอการอนุมัติ'
        );
    }
    echo json_encode($data);
}
