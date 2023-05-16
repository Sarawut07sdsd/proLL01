<?php


@$Ttb_statusin = $_GET['Ttb_statusin'];
@$Ttb_statusout = $_GET['Ttb_statusout'];
@$start_date =  date("Y-m-d");
@$end_date =  date("Y-m-d");
if ($Ttb_statusin == '') {
} else  if ($Ttb_statusin == '1') {
    $Ttb_statusinName = 'เข้างานก่อน';
} else  if ($Ttb_statusin == '2') {
    $Ttb_statusinName = 'เข้างานปกติ';
} else  if ($Ttb_statusin == '3') {
    $Ttb_statusinName = 'เข้างานสาย';
}

if ($Ttb_statusout == '') {
} else  if ($Ttb_statusout == '1') {
    $Ttb_statusinName = 'ออกงานปกติ';
} else  if ($Ttb_statusout == '2') {
    $Ttb_statusinName = 'ออกงานก่อน';
} else  if ($Ttb_statusout == '3') {
    $Ttb_statusinName = 'ออกงานช้า';
}




if ($end_date == null || $end_date == '') {
    $end_date = $start_date;
}

require_once __DIR__ . '../../../vendor/autoload.php';

@$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
@$fontDirs = $defaultConfig['fontDir'];

@$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
@$fontData = $defaultFontConfig['fontdata'];

@$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => @$fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);


ob_start();

?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">



        <center>
            <h2 align="center" class="mb-2 text-titlecase mb-4">ระบบบันทึกเวลาเข้าออกงาน</h2>
            <h3 align="center" class="mb-2 text-titlecase mb-4">ข้อมูลการลงเวลาประจำวันที่ <?php echo  date("Y-m-d"); ?></h3>
            <h3 align="center" class="mb-2 text-titlecase mb-4">รายงานข้อมูลพนักงานที่ : <?php echo $Ttb_statusinName; ?> </h3>
            <?php if ($_SESSION['user_group'] == '2') { ?>
                <h3 align="center" class="mb-2 text-titlecase mb-4">ชื่อ : <?php echo $_SESSION['Emp_name'];  ?></h3>
            <?php } ?>
        </center>
        <?php
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        ob_end_flush();
        ?>

        <br>

        <br><br>
        <div align="right">
            <a target="_blank" href="ข้อมูลลงเวลาเข้าและออกงาน.pdf" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                </svg>
            </a>
        </div>


        <?php
        @$timetable = "SELECT * 
         FROM `timetable`
         INNER JOIN `employee` ON `timetable`.`Emp_id` = `employee`.`Emp_id`
         WHERE `timetable`.`Emp_id` LIKE '%$Emp_id%'
         AND `timetable`.`Ttb_statusin` LIKE '%$Ttb_statusin%'
         AND `timetable`.`Ttb_statusout` LIKE '%$Ttb_statusout%'
         AND (`timetable`.`Ttb_date` >= '$start_date' AND (`timetable`.`Ttb_date` <= '$end_date' OR '$end_date' = '$start_date'))
         ORDER BY `timetable`.`Ttb_date` DESC
         ";

        @$Sqltimetable = mysqli_query($con, $timetable) or die("Error in query: $timetable ");
        while ($ShowSqltimetable = mysqli_fetch_array($Sqltimetable)) {
            @$Emp_name = $ShowSqlleave['Emp_name'];
        }


        if (@$Emp_id == '') {
            @$Emp_name = 'ทั้งหมด';
        }




        if ($Ttb_statusin == '') {
            $Ttb_statusinName = 'ทั้งหมด';
        } else  if ($Ttb_statusin == '1') {
            $Ttb_statusinName = 'เข้างานก่อน';
        } else  if ($Ttb_statusin == '2') {
            $Ttb_statusinName = 'เข้างานปกติ';
        } else  if ($Ttb_statusin == '3') {
            $Ttb_statusinName = 'เข้างานสาย';
        }

        if ($Ttb_statusout == '') {
            $Ttb_statusoutName = 'ทั้งหมด';
        } else  if ($Ttb_statusout == '1') {
            $Ttb_statusoutName = 'ออกงานปกติ';
        } else  if ($Ttb_statusout == '2') {
            $Ttb_statusoutName = 'ออกงานก่อน';
        } else  if ($Ttb_statusout == '3') {
            $Ttb_statusoutName = 'ออกงานช้า';
        }


        if ($start_date == '') {
            $nameDate = 'ทั้งหมด';
            $nameDate2 = ' - ';
        } else if ($start_date != '' &&  $end_date == $start_date) {
            $nameDate = $start_date;
            $nameDate2 = ' - ';
        } else if ($start_date != '' &&  $end_date != '') {
            $nameDate = $start_date;
            $nameDate2 = $end_date;
        }



        ob_start(); ?>


        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr align='center'>
                                    <th>วันที่เข้าทำงาน</th>
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อพนักงาน</th>

                                    <th>เวลาเข้า</th>
                                    <th>รัศมีเข้า</th>
                                    <th>สถานะเข้างาน</th>
                                    <th>เวลาออก</th>
                                    <th>รัศมีออก</th>
                                    <th>สถานะออกงาน</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                $str1 = 0;
                                $str2 = 0;
                                $str3 = 0;
                                $strSum = 0;

                                $strr1 = 0;
                                $strr2 = 0;
                                $strr3 = 0;
                                $strrSum = 0;

                                if ($_SESSION['user_group'] == '2') {
                                    $Emp_id = $_SESSION['Emp_id'];
                                }


                                @$timetable = "SELECT * FROM `timetable`
                                INNER JOIN `employee` ON `timetable`.`Emp_id` = `employee`.`Emp_id`
                                WHERE `timetable`.`Emp_id` LIKE '%$Emp_id%'
                                AND `timetable`.`Ttb_statusin` LIKE '%$Ttb_statusin%'
                                AND `timetable`.`Ttb_statusout` LIKE '%$Ttb_statusout%'
                                AND (`timetable`.`Ttb_date` >= '$start_date' AND (`timetable`.`Ttb_date` <= '$end_date' OR '$end_date' = '$start_date'))
                                ORDER BY `timetable`.`Ttb_date` DESC
                                ";

                                @$Sqltimetable = mysqli_query($con, $timetable) or die("Error in query: $timetable ");
                                $numPos_name1 = mysqli_num_rows($Sqltimetable);
                                $date_tmp = "0000-00-00";
                                while ($ShowSqltimetable = mysqli_fetch_array($Sqltimetable)) {
                                    $i++;
                                    if ($i == 1) {
                                        $date_tmp = $ShowSqltimetable['Ttb_date'];
                                    }




                                ?>

                                    <tr>
                                        <!--<td><?php echo $i ?></td>-->
                                        <td><?php echo $ShowSqltimetable['Ttb_date'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Emp_id'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Emp_name']; ?></td>

                                        <td><?php echo $ShowSqltimetable['Ttb_timein'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Ttb_radiusin'] ?></td>

                                        <td align='center'>

                                            <?php $Ttb_statusin = $ShowSqltimetable['Ttb_statusin'];
                                            if ($Ttb_statusin == 1) {
                                                $str1++;
                                                echo '<div class="alert alert-primary" role="alert">
                                                เข้างานก่อน
                                              </div>';
                                            } else if ($Ttb_statusin == 2) {
                                                $str2++;
                                                echo '<div class="alert alert-success" role="alert">
                                                เข้างานปกติ
                                              </div>';
                                            } else if ($Ttb_statusin == 3) {
                                                $str3++;
                                                echo '<div class="alert alert-danger" role="alert">
                                                เข้างานสาย
                                              </div>';
                                            }

                                            ?>


                                        </td>


                                        <td><?php echo $ShowSqltimetable['Ttb_timeinout'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Ttb_radiusout'] ?></td>

                                        <td align='center'><?php
                                                            $Ttb_statusout =  $ShowSqltimetable['Ttb_statusout'];

                                                            if ($Ttb_statusout == 1) {
                                                                $strr1++;
                                                                echo '<div class="alert alert-success" role="alert">
                                                ออกงานปกติ
                                              </div>';
                                                            } else if ($Ttb_statusout == 2) {
                                                                $strr2++;
                                                                echo '<div class="alert alert-danger" role="alert">
                                            ออกงานก่อน
                                          </div>';
                                                            } else if ($Ttb_statusout == 3) {
                                                                $strr3++;
                                                                echo '<div class="alert alert-primary" role="alert">
                                            ออกงานช้า
                                          </div>';
                                                            }



                                                            echo "</td>";

                                                            echo "</tr>";
                                                            if ($ShowSqltimetable['Ttb_date'] != $date_tmp) {
                                                                $notimetable = "SELECT * FROM `employee` WHERE Emp_id not in
                                                    (SELECT `timetable`.`Emp_id` FROM `timetable`
                                                     WHERE `timetable`.`Ttb_date` = '$date_tmp' )";
                                                                @$Sqlnotimetable = mysqli_query($con, $notimetable) or die("Error in query: $notimetable ");
                                                                $num = mysqli_num_rows($Sqlnotimetable);
                                                                if ($num > 0) {
                                                                    while ($ShowSqlnotimetable = mysqli_fetch_array($Sqlnotimetable)) {
                                                                        echo "<tr>";
                                                                        echo "<td colspan = 9>";
                                                                        echo $ShowSqlnotimetable['Emp_name'], " (ขาดงาน) ";
                                                                        echo "</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                    $date_tmp = $ShowSqltimetable['Ttb_date'];
                                                                }
                                                            }
                                                        } ?>

                            </tbody>
                        </table>
                        <?php
                        if ($numPos_name1 <= 0) {
                        ?>

                            <center>
                                <div class="alert alert-danger" role="alert">
                                    <h3> ไม่พบข้อมูล! </h3>
                                </div>
                            </center>

                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4> สรุปยอดรวมรายการเข้าทำงาน ประจำวันที่ <?php echo date("Y-m-d"); ?> </h4>

                    <table class="table" style="width: 30%;">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th align="left" scope="row">จำนวนคนที่เข้างานก่อนเวลา</th>
                                <td><?php echo @$str1; ?> </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">จำนวนคนที่เข้างานปกติ</th>
                                <td><?php echo @$str2; ?> </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">จำนวนคนที่เข้างานสาย</th>
                                <td><?php echo @$str3; ?> </td>

                            </tr>

                            <tr>
                                <th align="left" scope="row">รวมยอดรายการทั้งหมด</th>
                                <td><?php echo @$strSum = $str1 + $str2 + $str3; ?> </td>
                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4> สรุปยอดรวมรายการออกทำงาน ประจำวันที่ <?php echo date("Y-m-d"); ?>  </h4>

                    <table class="table" style="width: 30%;">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th align="left" scope="row">จำนวนคนที่เข้าออกก่อนเวลา</th>
                                <td><?php echo @$strr1; ?> </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">จำนวนคนที่ออกงานปกติ</th>
                                <td><?php echo @$strr2; ?> </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">จำนวนคนที่ออกงานช้า</th>
                                <td><?php echo @$strr3; ?> </td>

                            </tr>

                            <tr>
                                <th align="left" scope="row">รวมยอดรายการทั้งหมด</th>
                                <td><?php echo @$strrSum = $strr1 + $strr2 + $strr3; ?> </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


    <?php
    @$html = ob_get_contents();
    @$mpdf->WriteHTML(@$html);
    @$mpdf->Output("ข้อมูลลงเวลาเข้าและออกงาน.pdf");
    ob_end_flush();
    ?>