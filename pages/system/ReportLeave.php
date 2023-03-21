<?php
@$Emp_id = $_POST['Emp_id'];
@$Type_id = $_POST['Type_id'];
@$Leave_status = $_POST['Leave_status'];
@$start_date = $_POST['start_date'];
@$end_date = $_POST['end_date'];

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
            <h3 align="center" class="mb-2 text-titlecase mb-4">ข้อมูลการลาของพนักงาน</h3>
            <?php if ($_SESSION['user_group'] == '2') { ?>
                <h3 align="center" class="mb-2 text-titlecase mb-4">ชื่อ : <?php echo $_SESSION['Emp_name'];  ?></h3>
            <?php } ?>
            <?php if ($Emp_id != '') {
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
        <center>
            <?php if ($_SESSION['user_group'] != '2') { ?>
                <div class="col-sm-10">
                    <br>
                    <form name="register" action="index.php?p=ReportLeave" method="POST" class="form-horizontal">

                        <div class="input-group">



                            <label class="input-group-text" for="inputGroupSelect03">ชื่อ-สกุล</label>
                            <!-- <input id="Emp_name" type="text"  value="" name="Emp_name" width="300" /> -->
                            <select class="form-select" id="Emp_id" name="Emp_id" aria-label="Example select with button addon">
                                <option value="">ทั้งหมดㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</option>
                                <?php
                                @$employeeCEO = "SELECT * FROM employee    ";
                                @$SqlemployeeCEO = mysqli_query($con, $employeeCEO) or die("Error in query: $employeeCEO ");
                                while ($row = mysqli_fetch_array($SqlemployeeCEO)) {
                                ?>
                                    <option value="<?php echo $row['Emp_id']; ?>"><?php echo $row['Emp_name']; ?></option>
                                <?php } ?>
                            </select>




                            <label class="input-group-text" for="inputGroupSelect03">ประเภทการลา</label>
                            <select class="form-select" id="Type_id" name="Type_id" aria-label="Example select with button addon">
                                <option value="">ทั้งหมด</option>
                                <?php
                                while ($row = mysqli_fetch_array($Sqltypeleave)) {
                                ?>
                                    <option value="<?php echo $row['Type_id']; ?>"><?php echo $row['Type_name']; ?></option>
                                <?php } ?>
                            </select>

                            <label class="input-group-text" for="inputGroupSelect03">สถานะ</label>
                            <select class="form-select" id="Leave_status" name="Leave_status" aria-label="Example select with button addon">
                                <option value="">ทั้งหมด</option>
                                <option value="1">รออนุมัติ</option>
                                <option value="2">อนุมัติแล้ว</option>
                                <option value="3">ไม่อนุมัติ</option>
                            </select>

                            <label class="input-group-text" for="inputGroupSelect03">วันที่</label>
                            <input id="start_date" type="date" placeholder="dd-mm-yyyy" value="All" name="start_date" width="300" />
                            <label class="input-group-text" for="inputGroupSelect03">ถึงวันที่</label>
                            <input id="end_date" type="date" placeholder="dd-mm-yyyy" value="All" name="end_date" width="300" />




                            <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>

                        </div>

                    </form>
                </div>
            <?php } ?>
        </center>

        <br><br>


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
        FROM `leave`
        INNER JOIN `employee` ON `leave`.`Emp_id` = `employee`.`Emp_id`
        INNER JOIN `typeleave` ON `leave`.`Type_id` = `typeleave`.`Type_id`
        WHERE `leave`.`Emp_id` LIKE '%$Emp_id%'
        AND `leave`.`Type_id` LIKE '%$Type_id%'
        AND `leave`.`Leave_status` LIKE '%$Leave_status%'
        AND (`leave`.`Leave_date` >= '$start_date' AND (`leave`.`Leave_date` <= '$end_date' OR '$end_date' = '$start_date'))
        ORDER BY `leave`.`Leave_date` DESC
        ";
        @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
        while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
            @$Emp_name = $ShowSqlleave['Emp_name'];
            @$Type_name = $ShowSqlleave['Type_name'];
        }

        if ($Emp_id == '') {
            $Emp_name = 'ทั้งหมด';
        }

        if ($Type_id == '') {
            $Type_name = 'ทั้งหมด';
        }


        if ($Leave_status == '') {
            $Leave_statusName = 'ทั้งหมด';
        } else  if ($Leave_status == '1') {
            $Leave_statusName = 'รออนุมัติ';
        } else  if ($Leave_status == '2') {
            $Leave_statusName = 'อนุมัติแล้ว';
        } else  if ($Leave_status == '3') {
            $Leave_statusName = 'ไม่อนุมัติ';
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



        ?>
        <?php if ($_SESSION['user_group'] != '2') { ?>
            <center>
                <h4 align='center'>ผลการรายงาน : ชื่อ : <?php echo @$Emp_name; ?> : ประเภทการลา : <?php echo @$Type_name; ?>
                    : สถานะ : <?php echo $Leave_statusName; ?> : วันที่ : <?php echo $nameDate; ?> : ถึงวันที่ : <?php echo $nameDate2; ?> </h4>
            </center>
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
                                    <!--   <th>ชื่อพนักงาน</th> -->
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
                                FROM `leave`
                                INNER JOIN `employee` ON `leave`.`Emp_id` = `employee`.`Emp_id`
                                INNER JOIN `typeleave` ON `leave`.`Type_id` = `typeleave`.`Type_id`
                                WHERE `leave`.`Emp_id` LIKE '%$Emp_id%'
                                AND `leave`.`Type_id` LIKE '%$Type_id%'
                                AND `leave`.`Leave_status` LIKE '%$Leave_status%'
                                AND (`leave`.`Leave_date` >= '$start_date' AND (`leave`.`Leave_date` <= '$end_date' OR '$end_date' = '$start_date'))
                                ORDER BY `leave`.`Leave_date` DESC
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
                                        <!-- <td><?php echo $ShowSqlleave['Emp_name']; ?></td> -->
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
                                <td><?php echo $str1; ?> รายการ </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">รายการลางานที่ยังไม่อนุมัติ</th>
                                <td><?php echo $str2; ?> รายการ </td>

                            </tr>
                            <tr>
                                <th align="left" scope="row">รายการอนุมัติลางานที่รออนุมัติ</th>
                                <td><?php echo $str3; ?> รายการ </td>

                            </tr>

                            <tr>
                                <th align="left" scope="row">รวมยอดรายการทั้งหมด</th>
                                <td><?php echo $strSum = $str1 + $str2 + $str3; ?> รายการ </td>
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
                            // @$sql = "SELECT typeleave.Type_name, COUNT(`leave`.Type_id) AS Type_Count
                            // FROM typeleave
                            // INNER JOIN `leave` ON typeleave.Type_id = `leave`.Type_id
                            // GROUP BY typeleave.Type_name
                            // ORDER BY typeleave.Type_id ASC; ";

                            @$sql = "SELECT `typeleave`.`Type_name`, COUNT(`leave`.`Type_id`) as count
                            FROM `leave`
                            INNER JOIN `employee` ON `leave`.`Emp_id` = `employee`.`Emp_id`
                            INNER JOIN `typeleave` ON `leave`.`Type_id` = `typeleave`.`Type_id`
                            WHERE `leave`.`Emp_id` LIKE '%$Emp_id%'
                            AND `leave`.`Type_id` LIKE '%$Type_id%'
                            AND `leave`.`Leave_status` LIKE '%$Leave_status%'
                            AND (`leave`.`Leave_date` >= '$start_date' AND (`leave`.`Leave_date` <= '$end_date' OR '$end_date' = '$start_date'))
                            GROUP BY `leave`.`Type_id`
                            
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
                                    <td><?php echo $Type_name . ' ' . $Type_Count ?> คน </td>

                                </tr>

                            <?php
                            }
                            ?>
                            <tr>
                                <th scope="row">รวมยอดรวมประเภทลางานทั้งหมด</th>
                                <td><?php echo $summ; ?> คน </td>
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