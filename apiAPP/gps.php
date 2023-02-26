<?php
include "confix.php";

@$str = $_GET['str'];

@$latitude = $_GET['latitude']; // ละติจุ
@$longitude = $_GET['longitude']; // ลองติจุ
@$Emp_id = $_GET['user'];
@$Ttb_date = date("Y-m-d");
@$Ttb_timein =  date("h:i:s"); // เวลาแสกนเข้า
@$Ttb_radiusin = $latitude . ',' . $longitude;
@$Ttb_statusin = 2; //สถานะ

@$Ttb_timeinout = date("h:i:s"); //เวลาแสกนออก
@$Ttb_radiusout = $latitude . ',' . $longitude;
@$Ttb_statusout = 2; //สถานะ

@$sql = "SELECT * FROM  `constant`  ";
@$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
while ($namesql = mysqli_fetch_array($sqlshow)) {
  @$la =  $namesql['System_latitude'];
  @$lo =  $namesql['System_longitude'];

  @$System_period =  $namesql['System_period'];
  @$System_timeoff =  $namesql['System_timeoff'];

  @$Stytem_starttime =  $namesql['Stytem_starttime'];
  @$Stytem_endtime =  $namesql['Stytem_endtime'];
}

$lat1 = $latitude; // ละติจูดของจุดที่หนึ่ง
$lon1 = $longitude; // ลองจิจูดของจุดที่หนึ่ง
$lat2 = $la; // ละติจูดของจุดที่สอง
$lon2 = $lo; // ลองจิจูดของจุดที่สอง

$distance = haversineDistance($lat1, $lon1, $lat2, $lon2); //ระยะทาง


if ($str == 'in') {

  @$sql = "SELECT * FROM  `timetable` where Emp_id = '$Emp_id' and Ttb_date = '$Ttb_date' ";
  $q = mysqli_query($con, $sql);
  $numPos_name1 = mysqli_num_rows($q);

  if ($numPos_name1 >= 1) {

    @$data = array("success" => '0', "text" => '1');
  } else if ($distance < 200) {
    @$data = array("success" => '0', "text" => '2');
  } else {

    if ($System_period < $Ttb_timein) {
      $Ttb_statusin = 1;
    } else if ($System_timeoff > $Ttb_timein) {
      $Ttb_statusin = 3;
    }

    @$sql = "INSERT INTO `timetable`
    (Emp_id,Ttb_date,Ttb_timein,Ttb_radiusin,Ttb_statusin,
    Ttb_timeinout,Ttb_radiusout,Ttb_statusout
    )
    VALUES
    ('$Emp_id', '$Ttb_date','$Ttb_timein', '$Ttb_radiusin','$Ttb_statusin'
    , '' ,'', ''
    )";
    @$result = mysqli_query($con, $sql);
    mysqli_close($con);
    @$data = array("success" => '1', "text" => '');
  }
}




if ($str == 'out') {

  @$sql = "SELECT * FROM  `timetable` where Emp_id = '$Emp_id' and Ttb_date = '$Ttb_date'  ";
  @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
  while ($namesql = mysqli_fetch_array($sqlshow)) {
    @$T1 = $namesql['Ttb_timein'];
    @$T2 = $namesql['Ttb_radiusin'];
    @$T3 = $namesql['Ttb_statusin'];

    @$T4 = $namesql['Ttb_timeinout'];
    @$T5 = $namesql['Ttb_radiusout'];
    @$T6 = $namesql['Ttb_statusout'];
  }

  if ($T1 == '' || $T2 == '' || $T3 == '' && $distance < 200) {
    @$data = array("success" => '0', "text" => '3');
  } else if ($T4 == '' || $T5 == '') {
    if ($Stytem_starttime < $Ttb_timeinout) {
      $Ttb_statusin = 1;
    } else if ($Stytem_endtime > $Ttb_timeinout) {
      $Ttb_statusin = 3;
    }

    $sql = "UPDATE  `timetable` SET 
    Ttb_timeinout = '$Ttb_timeinout' ,
    Ttb_radiusout = '$Ttb_radiusout' ,
    Ttb_statusout = '$Ttb_statusout'
    WHERE Emp_id = '$Emp_id' ";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    @$data = array("success" => '1', "text" => '');
  } else {
    @$data = array("success" => '0', "text" => '4');
  }
}






echo json_encode(@$data);



















function haversineDistance($lat1, $lon1, $lat2, $lon2)
{
  $earthRadius = 6371; // ค่าคงที่ความยาวของรัศมีโลก (หน่วยเป็นกิโลเมตร)
  $dLat = deg2rad($lat2 - $lat1);
  $dLon = deg2rad($lon2 - $lon1);
  $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
  $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
  $distance = $earthRadius * $c; // ระยะทางระหว่างจุดสองจุดในหน่วยกิโลเมตร
  return $distance;
}
