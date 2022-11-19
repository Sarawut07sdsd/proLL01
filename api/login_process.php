<?php
include "../confix/DB.php";
session_start();
?>

<?php

@$Emp_id = trim(@$_POST['Emp_id']);
@$pass = trim(@$_POST['Emp_pass']);

?>


<?php
$strSQL = "SELECT * FROM employee WHERE Emp_id= '" . $Emp_id . "'  ";

@$result = @$con->query($strSQL);

if (@$result->num_rows > 0) {

    //เข้าได้
    while ($row = $result->fetch_assoc()) {
        $Emp_name = $row['Emp_name'];
        $Emp_tel = $row["Emp_tel"];
        $Emp_address = $row["Emp_address"];
        $Dep_id = $row["Dep_id"];
        $Pos_id = $row["Pos_id"];
        $Emp_pass = $row["Emp_pass"];
        //echo $fname;

        if (trim($pass) == $Emp_pass) {
            $_SESSION['Emp_id'] = $Emp_id;
            $_SESSION['Emp_name'] = $Emp_name;
            $_SESSION['Emp_tel'] = $Emp_tel;
            $_SESSION['Emp_address'] = $Emp_address;
            $_SESSION['Dep_id'] = $Dep_id;
            $_SESSION['Pos_id'] = $Pos_id;
            $_SESSION['Emp_pass'] = $Emp_pass;
            echo "<script>";
            echo "alert('ล็อดอินสำเสร็จ');";
            echo "</script>";
            echo "<meta  http-equiv='refresh' content='0;URL=../'>";
        } else {

            echo "<script>";
            echo "alert('username หรือ password ผิดพลาดd');";
            echo "</script>";
            echo "<meta  http-equiv='refresh' content='0;URL=../'>";
        }
    }
}else{

    echo "<script>";
    echo "alert('username หรือ password ผิดพลาดd');";
    echo "</script>";
    echo "<meta  http-equiv='refresh' content='0;URL=../'>";
}






?>




