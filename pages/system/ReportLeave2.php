<?php

@$Leave_status = $_GET['Leave_status'];
@$start_date =  date("Y-m-d");
@$end_date =  date("Y-m-d");


if ($Leave_status == 1) {
    $Leave_statusName = 'รออนุมัติ';
} else  if ($Leave_status == 2) {
    $Leave_statusName = 'อนุมัติแล้ว';
} else  if ($Leave_status == 3) {
    $Leave_statusName = 'ไม่อนุมัติ';
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



<div class="main-panel">
    <div class="content-wrapper">


        <center>
            <h2 align="center" class="mb-2 text-titlecase mb-4">ระบบบันทึกเวลาเข้าออกงาน</h2>
            <h3 align="center" class="mb-2 text-titlecase mb-4">ข้อมูลการลาของพนักงาน ประจำวันที่ <?php echo  date("Y-m-d"); ?> </h3>
            <h3 align="center" class="mb-2 text-titlecase mb-4">รายงานข้อมูลพนักงานที่ : <?php echo $Leave_statusName; ?> </h3>
            <?php if ($_SESSION['user_group'] == '2') { ?>
                <h3 align="center" class="mb-2 text-titlecase mb-4">ชื่อ : <?php echo $_SESSION['Emp_name'];  ?></h3>
            <?php } ?>
            <?php if (@$Emp_id != '') {
                @$employeeCEO = "SELECT * FROM employee where  Emp_id = '$Emp_id'  ";
                @$SqlemployeeCEO = mysqli_query($con, $employeeCEO) or die("Error in query: $employeeCEO ");
                while ($row = mysqli_fetch_array($SqlemployeeCEO)) {
                    $Emp_name =   $row['Emp_name'];
                }

            ?>
                <h3 align="center" class="mb-2 text-titlecase mb-4">ชื่อ : <?php echo @$Emp_name;  ?></h3>
            <?php } ?>
        </center>

        <?php
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        ob_end_flush();
        ?>





        <br>



        <div align="right">
            <a target="_blank" href="ข้อมูลลางาน.pdf" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                </svg>
            </a>
        </div>

        <?php ob_start(); ?>


        <?php

        @$leave = "SELECT *
        FROM `leaves`
        INNER JOIN `employee` ON `leaves`.`Emp_id` = `employee`.`Emp_id`
        INNER JOIN `typeleave` ON `leaves`.`Type_id` = `typeleave`.`Type_id`
        WHERE `leaves`.`Emp_id` LIKE '%$Emp_id%'
        AND `leaves`.`Type_id` LIKE '%$Type_id%'
        AND `leaves`.`Leave_status` LIKE '%$Leave_status%'
        AND (`leaves`.`Leave_date` >= '$start_date' AND (`leaves`.`Leave_date` <= '$end_date' OR '$end_date' = '$start_date'))
        ORDER BY `leaves`.`Leave_date` DESC
        ";
        @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
        while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
            @$Emp_name = $ShowSqlleave['Emp_name'];
            @$Type_name = $ShowSqlleave['Type_name'];
        }






        ?>
        <?php if ($_SESSION['user_group'] != '2') { ?>

        <?php } ?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr align='center'>
                                    <!-- <th class="ml-5">ลำดับ</th> -->
                                    <th>รหัสการลา</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>ประเภทการลา</th>
                                    <!--  <th>วันที่ยื่นใบลา</th> -->
                                    <th>วันเริ่มต้นลา</th>
                                    <th>วันสิ้นสุดลา</th>
                                    <!--  <th>วันที่การอนุมัติ</th> -->
                                    <th>สถานะการอนุมัติการลา</th>
                                    <th>เหตุผลการลา</th>
                                    <th>หมายเหตุการอนุมัต</th>





                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                $str1 = 0;
                                $str2 = 0;
                                $str3 = 0;
                                $strSum = 0;

                                if ($_SESSION['user_group'] == '2') {
                                    $Emp_id = $_SESSION['Emp_id'];
                                }


                                @$leave = "SELECT *
                                FROM leaves
                                INNER JOIN `employee` ON leaves.`Emp_id` = `employee`.`Emp_id`
                                INNER JOIN `typeleave` ON leaves.`Type_id` = `typeleave`.`Type_id`
                                WHERE leaves.`Emp_id` LIKE '%$Emp_id%'
                                AND leaves.`Type_id` LIKE '%$Type_id%'
                                AND leaves.`Leave_status` LIKE '%$Leave_status%'
                                AND (leaves.`Leave_date` >= '$start_date' AND (leaves.`Leave_date` <= '$end_date' OR '$end_date' = '$start_date'))
                                ORDER BY leaves.`Leave_date` DESC
                                ";



                                @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
                                $numPos_name1 = mysqli_num_rows($Sqlleave);
                                while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
                                    $i++;
                                    $Leave_status1 = $ShowSqlleave['Leave_status'];
                                ?>

                                    <tr align='center'>
                                        <!-- <td><?php echo $i ?></td> -->
                                        <td><?php echo $ShowSqlleave['Leave_id'] ?></td>
                                        <td><?php echo $ShowSqlleave['Emp_name']; ?></td>
                                        <td><?php echo $ShowSqlleave['Type_name']; ?></td>
                                        <!-- <td><?php echo $ShowSqlleave['Leave_date'] ?></td> -->
                                        <td><?php echo $ShowSqlleave['Leave_start'] ?></td>
                                        <td><?php echo $ShowSqlleave['Leave_end'] ?></td>
                                        <!-- <td><?php echo $ShowSqlleave['App_date'] ?></td> -->
                                        <td><?php


                                            if ($Leave_status1 == 1) {
                                                $str1++;
                                                echo '<div class="alert alert-primary" role="alert">
                                                รออนุมัติ
                                              </div>';
                                            } else if ($Leave_status1 == 2) {
                                                $str2++;
                                                echo '<div class="alert alert-success" role="alert">
                                                อนุมัติการลางานแล้ว
                                              </div>';
                                            } else if ($Leave_status1 == 3) {
                                                $str3++;
                                                echo '<div class="alert alert-danger" role="alert">
                                                เข้างานสาย 
                                              </div>';
                                            }

                                            ?></td>


                                        <td><?php echo $ShowSqlleave['Leave_reason'] ?></td>
                                        <td><?php echo $ShowSqlleave['App_note'] ?></td>




                                    </tr>
                                <?php } ?>
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
    <br><br>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4> สรุปยอดรวมรายการ </h4>

                    <table class="table" style="width: 30%;">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th align="left" scope="row">รายการลางานที่อนุมัติแล้ว</th>
                                <td><?php echo $str1; ?> </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">รายการลางานที่ยังไม่อนุมัติ</th>
                                <td><?php echo $str2; ?> </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">รายการอนุมัติลางานที่รออนุมัติ</th>
                                <td><?php echo $str3; ?> </td>

                            </tr>

                            <tr>
                                <th align="left" scope="row">รวมยอดรายการทั้งหมด</th>
                                <td><?php echo $strSum = $str1 + $str2 + $str3; ?> </td>
                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4> สรุปยอดรวมประเภทลางาน </h4>

                    <table class="table" style="width: 40%;">
                        <thead>
                        </thead>
                        <tbody>

                            <?php
                            // @$sql = "SELECT typeleave.Type_name, COUNT(leaves.Type_id) AS Type_Count
                            // FROM typeleave
                            // INNER JOIN leaves ON typeleave.Type_id = leaves.Type_id
                            // GROUP BY typeleave.Type_name
                            // ORDER BY typeleave.Type_id ASC; ";

                            @$sql = "SELECT `typeleave`.`Type_name`, COUNT(leaves.`Type_id`) as count
                            FROM leaves
                            INNER JOIN `employee` ON leaves.`Emp_id` = `employee`.`Emp_id`
                            INNER JOIN `typeleave` ON leaves.`Type_id` = `typeleave`.`Type_id`
                            WHERE leaves.`Emp_id` LIKE '%$Emp_id%'
                            AND leaves.`Type_id` LIKE '%$Type_id%'
                            AND leaves.`Leave_status` LIKE '%$Leave_status%'
                            AND (leaves.`Leave_date` >= '$start_date' AND (leaves.`Leave_date` <= '$end_date' OR '$end_date' = '$start_date'))
                            GROUP BY leaves.`Type_id`
                            
";

                            @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
                            $Type_Count = 0;
                            $summ = 0;
                            while ($namesql = mysqli_fetch_array($sqlshow)) {
                                @$Type_name = $namesql['Type_name'];
                                @$Type_Count = $namesql['count'];
                                $summ = $summ + $Type_Count;

                            ?>
                                <tr>
                                    <th align="left" scope="row">ประเภทการลา</th>
                                    <td><?php echo $Type_name . ' ' . $Type_Count ?> </td>

                                </tr>

                            <?php
                            }
                            ?>
                            <tr>
                                <th scope="row">รวมยอดรวมประเภทลางานทั้งหมด</th>
                                <td><?php echo $summ; ?> </td>
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
    @$mpdf->Output("ข้อมูลลางาน.pdf");
    ob_end_flush();
    ?>

</div>