<?php
include "confix.php";


@$Emp_id = trim(@$_GET['Emp_id']);
@$pass = trim(@$_GET['Emp_pass']);
$strSQL = "SELECT * FROM employee WHERE Emp_id= '" . $Emp_id . "'  ";
@$result = @$con->query($strSQL);
if (@$result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $Emp_name = $row['Emp_name'];
        $Emp_tel = $row["Emp_tel"];
        $Emp_address = $row["Emp_address"];
        $Dep_id = $row["Dep_id"];
        $Pos_id = $row["Pos_id"];
        $Emp_pass = $row["Emp_pass"];


        @$SqlsDep = "SELECT * FROM department WHERE  Dep_id =  '$Dep_id' ";
        @$SqlsDepData = mysqli_query($con, $SqlsDep) or die("Error in query: $SqlsDep ");
        while ($ShowSqlsDepData = mysqli_fetch_array($SqlsDepData)) {
            @$Dep_name = $ShowSqlsDepData['Dep_name'];
        }


        @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
        @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
        while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
            @$Pos_name = $Showposition['Pos_name'];
        }



        if (trim($pass) == $Emp_pass) {


            $data = array(
                "success" => '1',
                "user" => $Emp_id,
                "Emp_name" => $Emp_name,
                "Dep_name" => $Dep_name,
                "Pos_name" => "$Pos_name",
                "five" => ''
            );

            echo json_encode($data);
        } else {
            $data = array(
                "success" => '0',
                "user" => "$Emp_id",
                "Emp_name" => "Two",
                "Dep_name" => "Three",
                "Pos_id" => "Four",
                "five" => "Five"
            );
            echo json_encode($data);
        }
    }
} else {
    $data = array(
        "success" => '0',
        "first" => "One",
        "Emp_name" => "Two",
        "Dep_name" => "Three",
        "Pos_id" => "Four",
        "five" => "Five"
    );
    echo json_encode($data);
}
