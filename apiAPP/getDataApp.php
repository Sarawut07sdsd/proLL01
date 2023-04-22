<?php 

include "confix.php";
extract(@$_GET);


if ($str == 'PeleaveSUM') {
    @$department = "SELECT * FROM typeleave WHERE Type_id = '$Type_id'  ";
    @$Sqldepartment = mysqli_query($con, $department) or die("Error in query: $department ");
    // $ShowSqldepartment[] = mysqli_fetch_array($Sqldepartment);
    // echo json_encode($ShowSqldepartment);
    $data = array();
    while ($Showposition = mysqli_fetch_array($Sqldepartment)) {
        @$data[] =array('Type_id'=> $Showposition['Type_id'], 'name'=> $Showposition['Type_name'] , 'Type_details'=> $Showposition['Type_details'] , 'test' => '' ); 
   }
   echo json_encode($data);
}

?>