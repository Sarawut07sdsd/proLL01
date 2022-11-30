<?php

include "../confix/DB.php";


extract(@$_POST);
extract(@$_GET);

if (@$str == 'leave_rights') {
    $sql = "UPDATE leave_rights SET 
        Pos_id = '$Pos_id'  ,
        leave_maximum = '$leave_maximum'   
        WHERE Type_id = '$Type_id' ";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('อัปเดทข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('อัปเดทข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    }
} else {


    echo  $sql2 = "INSERT INTO leave_rights
            (Type_id,Pos_id , leave_maximum )
            VALUES
            ('$Type_id' , '$Pos_id' , '$leave_maximum')";
    @$result2 = mysqli_query($con, $sql2) or die("Error in query: $sql2 " . mysqli_error());
    mysqli_close($con);
    if (@$result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../index.php?p=peleave'; ";
        echo "</script>";
    }
}
