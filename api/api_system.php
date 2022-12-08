<?php
include "../confix/DB.php";


extract(@$_POST);
extract(@$_GET);



//////////constant/////////////////////////////////////////////////////////////////////////////

if ($str == 'addconstant') {

    $sqlnum = " SELECT * FROM constant where Stytem_name = '$Stytem_name'  ";
    $q = mysqli_query($con, $sqlnum);
    $numStytem_name = mysqli_num_rows($q);

    if (strlen($Stytem_tel) != 10) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จกรุณาใส่เบอร์โทร 10 หลัก');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    }
    if ($numStytem_name > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    } else {

        echo    $sql = "INSERT INTO constant
            (Stytem_name, 	Stytem_address , Stytem_tel , Stytem_radius,System_latitude ,System_longitude ,System_period ,System_timeoff , Stytem_starttime ,Stytem_endtime    )
            VALUES
            ('$Stytem_name', '$Stytem_address' , '$Stytem_tel', '$Stytem_radius' ,'$System_latitude' , '$System_longitude' , '$System_period' , '$System_timeoff' , '$Stytem_starttime' , '$Stytem_endtime')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
        mysqli_close($con);
    }
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    }
} else if ($str == 'edticonstant') {

    $sqlnum = " SELECT * FROM constant where Stytem_name = '$Stytem_name'  ";
    $q = mysqli_query($con, $sqlnum);
    $numStytem_name = mysqli_num_rows($q);


    if (strlen($Stytem_tel) != 10) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จกรุณาใส่เบอร์โทร 10 หลัก');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    }
    if ($numStytem_name > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    } else {

        $sql = "UPDATE constant SET
    Stytem_name = '$Stytem_name', 
    Stytem_address =  '$Stytem_address' , 
    Stytem_tel =  '$Stytem_tel' ,  
    Stytem_radius =  '$Stytem_radius'  ,  
    System_latitude =  '$System_latitude'  ,  
    System_longitude =  '$System_longitude'  ,  
    System_period =  '$System_period'  ,  
    System_timeoff =  '$System_timeoff'  ,  
    Stytem_starttime =  '$Stytem_starttime'  ,  
    Stytem_endtime =  '$Stytem_endtime' 




    WHERE Stytem_No = '$Stytem_No' ";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        if ($result) {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลสำเร็จ');";
            echo "window.location = '../index.php?p=constant'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลไม่สำเร็จ');";
            echo "window.location = '../index.php?p=constant'; ";
            echo "</script>";
        }
    }
} else if ($str == 'deleteconstant') {

    $sql = "DELETE FROM constant WHERE Stytem_No='$Stytem_No' ";
    $result = mysqli_query($con, $sql);



    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('Delete ข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error ข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=constant'; ";
        echo "</script>";
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////


///addnullDepartment//////////////////////////////////////////////////////////////////////////

else if ($str == 'addnullDepartment') {

    $sqlnum = " SELECT * FROM department where Dep_name = '$Dep_name' or Dep_id = '$Dep_id'  ";
    $q = mysqli_query($con, $sqlnum);
    $numDep_name = mysqli_num_rows($q);

    if ($numDep_name > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=department'; ";
        echo "</script>";
    } else {

        $sql = "INSERT INTO department
            (Dep_id,Dep_name)
            VALUES
            ('$Dep_id', '$Dep_name')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
        mysqli_close($con);
    }
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=department'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=department'; ";
        echo "</script>";
    }
} else if ($str == 'edtiDepartment') {

    $sqlnum = " SELECT * FROM department where Dep_name = '$Dep_name' or Dep_id = '$Dep_id'  ";
    $q = mysqli_query($con, $sqlnum);
    $numDep_name = mysqli_num_rows($q);

    if ($numDep_name > 1) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=department'; ";
        echo "</script>";
    } else {

        $sql = "UPDATE department SET Dep_name = '$Dep_name'  WHERE Dep_id = '$Dep_id' ";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        if ($result) {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลสำเร็จ');";
            echo "window.location = '../index.php?p=department'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลไม่สำเร็จ');";
            echo "window.location = '../index.php?p=department'; ";
            echo "</script>";
        }
    }
} else if ($str == 'deleteDepartment') {

    $sql = "DELETE FROM department WHERE Dep_id='$Dep_id' ";
    $result = mysqli_query($con, $sql);



    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('Delete ข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=department'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error ข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=department'; ";
        echo "</script>";
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////



////////addnullPosition///////////////////////////////////////////////////////////////////////////////////////

else if ($str == 'addnullPosition') {

    $sqlnum = " SELECT * FROM position where Pos_id = '$Pos_id' or Pos_name = '$Pos_name'  ";
    $q = mysqli_query($con, $sqlnum);
    $numPos_name = mysqli_num_rows($q);

    if ($numPos_name > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=position'; ";
        echo "</script>";
    } else {

        $sql = "INSERT INTO position
            (Pos_id,Pos_name)
            VALUES
            ('$Pos_id', '$Pos_name')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
        mysqli_close($con);
    }
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=position'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=position'; ";
        echo "</script>";
    }
} else if ($str == 'edtiPosition') {
    $sqlnum = " SELECT * FROM position where Pos_id = '$Pos_id' or Pos_name = '$Pos_name'  ";
    $q = mysqli_query($con, $sqlnum);
    $numPos_name = mysqli_num_rows($q);

    if ($numPos_name > 1) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=position'; ";
        echo "</script>";
    } else {


        $sql = "UPDATE position SET Pos_name = '$Pos_name'  WHERE Pos_id = '$Pos_id' ";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        if ($result) {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลสำเร็จ');";
            echo "window.location = '../index.php?p=position'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลไม่สำเร็จ');";
            echo "window.location = '../index.php?p=position'; ";
            echo "</script>";
        }
    }
} else if ($str == 'deletePosition') {

    $sql = "DELETE FROM position WHERE Pos_id='$Pos_id' ";
    $result = mysqli_query($con, $sql);



    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('Delete ข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=position'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error ข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=position'; ";
        echo "</script>";
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////



////////addnullPosition///////////////////////////////////////////////////////////////////////////////////////
else if ($str == 'addnullEmployee') {


    $sqlnum = " SELECT * FROM employee where Emp_id = '$Emp_id' ";
    $q = mysqli_query($con, $sqlnum);
    $numPos_name = mysqli_num_rows($q);

    if ($numPos_name > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if (strlen($Emp_tel) != 10) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จกรุณาใส่เบอร์โทร 10 หลัก');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if (strlen($Emp_id) != 13) {
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาใส่เลขบัตรประชาชนให้ถูกต้อง 13 หลัก');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if ($Dep_id == null) {
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาเลือกข้อมูลแผนก');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if ($Pos_id == null) {
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาเลือกข้อมูลตำแหน่ง');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else {

        $sql = "INSERT INTO employee
            (Emp_id,Emp_pass , Emp_name , Emp_tel , Emp_address , Dep_id , Pos_id)
            VALUES
            ('$Emp_id' , '$Emp_pass' , '$Emp_name' , '$Emp_tel' , '$Emp_address' , '$Dep_id' , '$Pos_id')";
        @$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
        mysqli_close($con);
    }
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    }
} else if ($str == 'edtiEmployee') {



    $sqlnum = " SELECT * FROM employee where Emp_id = '$Emp_id' ";
    $q = mysqli_query($con, $sqlnum);
    $numPos_name = mysqli_num_rows($q);

    if ($numPos_name > 1) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if (strlen(@$Emp_tel) != 10) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลไม่สำเร็จกรุณาใส่เบอร์โทร 10 หลัก');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if (strlen($Emp_id) != 13) {
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาใส่เลขบัตรประชาชนให้ถูกต้อง 13 หลัก');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if ($Dep_id == null) {
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาเลือกข้อมูลแผนก');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else if ($Pos_id == null) {
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาเลือกข้อมูลตำแหน่ง');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else {

        $sql = "UPDATE employee SET 
    Emp_name = '$Emp_name'  ,
    Emp_tel = '$Emp_tel'  ,
    Emp_address = '$Emp_address'  ,
    Dep_id = '$Dep_id'  ,
    Pos_id = '$Pos_id'  
    
    WHERE Emp_id = '$Emp_id' ";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        if ($result) {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลสำเร็จ');";
            echo "window.location = '../index.php?p=$str2'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('อัปเดทข้อมูลไม่สำเร็จ');";
            echo "window.location = '../index.php?p=$str2'; ";
            echo "</script>";
        }
    }
} else if ($str == 'deleteEmployee') {

    $sql = "DELETE FROM employee WHERE Emp_id='$Emp_id' ";
    $result = mysqli_query($con, $sql);



    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('Delete ข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error ข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=$str2'; ";
        echo "</script>";
    }
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////addnullPeleave//////////////////////////////////////////////////////////////////////////////
else if ($str == 'addnullPeleave') {




    @$typeleave = "SELECT typeleave.Type_id , typeleave.Type_name , typeleave.Type_details , leave_rights.Pos_id ,leave_rights.leave_maximum  
  FROM typeleave INNER JOIN leave_rights  ON typeleave.Type_id = leave_rights.Type_id WHERE Type_name = '$Type_name' and Pos_id = '$Pos_id';  ";
    @$Sqltypeleave = mysqli_query($con, $typeleave) or die("Error in query: $typeleave ");
    $numtypeleave = mysqli_num_rows($Sqltypeleave);

    if ($numtypeleave > 1) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อและตำแหน่งซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    } else {


        $sql = "INSERT INTO typeleave
            (Type_id,Type_name , Type_details )
            VALUES
            ('$Type_id' , '$Type_name' , '$Type_details')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
        mysqli_close($con);

        if ($result) {
            echo "<script type='text/javascript'>";
            echo "window.location = 'apiError.php?Type_id=$Type_id&Pos_id=$Pos_id&leave_maximum=$leave_maximum'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "window.location = 'apiError.php?Type_id=$Type_id&Pos_id=$Pos_id&leave_maximum=$leave_maximum'; ";
            echo "</script>";
        }
    }
} else if ($str == 'edtiPeleave') {




    @$typeleave = "SELECT typeleave.Type_id , typeleave.Type_name , typeleave.Type_details , leave_rights.Pos_id ,leave_rights.leave_maximum  
FROM typeleave INNER JOIN leave_rights  ON typeleave.Type_id = leave_rights.Type_id WHERE Type_name = '$Type_name' and Pos_id = '$Pos_id';  ";
    @$Sqltypeleave = mysqli_query($con, $typeleave) or die("Error in query: $typeleave ");

    $numtypeleave = mysqli_num_rows($Sqltypeleave);

    if ($numtypeleave > 1) {
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อและตำแหน่งซ้ำกันกรุณาทำรายการใหม่อีกครั้ง');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    } else {

        $sql = "UPDATE typeleave SET 
        Type_name = '$Type_name'  ,
        Type_details = '$Type_details'   
        WHERE Type_id = '$Type_id' ";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        if ($result) {
            echo "<script type='text/javascript'>";

            echo "window.location = 'apiError.php?Type_id=$Type_id&str=leave_rights&Pos_id=$Pos_id&leave_maximum=$leave_maximum'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";

            echo "window.location = '../index.php?p=peleave'; ";
            echo "</script>";
        }
    }
} else if ($str == 'deletePeleave') {

    $sql = "DELETE FROM leave_rights WHERE Type_id='$Type_id' ";
    $result = mysqli_query($con, $sql);

    $sql = "DELETE FROM typeleave WHERE Type_id='$Type_id' ";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลไม่สำเร็จ');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    }
}
