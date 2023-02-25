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

        if (trim($pass) == $Emp_pass) {
  

            $data = array(
                "success" => '1',
                "user"=> $Emp_id,
                "second"=> "Two",
                "third"=> "Three",
                "four"=> "Four",
                "five"=>''
            );

            echo json_encode($data);
        } else {
            $data = array(
                "success" => '0',
                "user"=> "$Emp_id",
                "second"=> "Two",
                "third"=> "Three",
                "four"=> "Four",
                "five"=> "Five"
            );
            echo json_encode($data);
        }
    }
} else {
    $data = array(
        "success" => '0',
        "first"=> "One",
        "second"=> "Two",
        "third"=> "Three",
        "four"=> "Four",
        "five"=> "Five"
    );
    echo json_encode($data);
}
