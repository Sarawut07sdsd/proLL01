<?php
extract(@$_GET);


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


$ps = 0;
$DataPos = [];
@$Sqlposition1 = mysqli_query($con, $position) or die("Error in query: $position ");
while ($Showposition1 = mysqli_fetch_array($Sqlposition1)) {
    $ps++;
    $DataPos[$ps]  =  $Showposition1['Pos_id'];
}







?>

<?php ob_start(); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <br><br>
        <center>
            <h2 align="center" class="mb-2 text-titlecase mb-4">ระบบบันทึกเวลาเข้าออกงาน</h2>

            <?php
            if ($str == '1') {
                $dataAll = $SqlemployeeHR;
                echo "<h2 align='center' class='mb-2 text-titlecase mb-4'>รายงานข้อมูลผู้บริหาร</h2>";
            } else  if ($str == '2') {
                $dataAll = $SqlemployeeEmp;
                echo "<h2 align='center' class='mb-2 text-titlecase mb-4'>รายงานข้อมูลพนักงานทั่วไป</h2>";
            } else {
                $dataAll = $SqlemployeeHR;
                echo "<h2 align='center' class='mb-2 text-titlecase mb-4'>รายงานข้อมูลหัวหน้าฝ่ายพนักงาน HR</h2>";
            }


            ?>
            <br><br>

        </center>

        <?php
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        ob_end_flush();
        ?>

        <div align="right">
            <a target="_blank" href="ข้อมูลรายละเอียดพนักงาน.pdf" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                </svg>
            </a>
        </div>
        <?php ob_start(); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="ml-5">ลำดับ</th>
                                    <th class="ml-5">รหัสพนักงาน</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>เบอร์โทร</th>
                                    <th>ที่อยู่</th>
                                    <th>แผนก</th>
                                    <th>ตำแหน่ง</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($str == '1') {
                                    $dataAll = $SqlemployeeCEO;
                                } else  if ($str == '2') {
                                    $dataAll = $SqlemployeeEmp;
                                } else {
                                    $dataAll = $SqlemployeeHR;
                                }
                                $j = 0;
                                while ($ShowmployeetEmp = mysqli_fetch_array($dataAll)) {
                                    $j++;
                                ?>
                                    <tr>
                                        <td> <?php echo $j ?> </td>
                                        <td> <?php echo $ShowmployeetEmp['Emp_id'] ?> </td>
                                        <td><?php echo $ShowmployeetEmp['Emp_name'] ?></td>
                                        <td><?php echo $ShowmployeetEmp['Emp_tel'] ?></td>
                                        <td><?php echo $ShowmployeetEmp['Emp_address'] ?></td>
                                        <td><?php
                                            $Dep_id = $ShowmployeetEmp['Dep_id'];
                                            @$SqlsDep = "SELECT * FROM department WHERE  Dep_id =  '$Dep_id' ";
                                            @$SqlsDepData = mysqli_query($con, $SqlsDep) or die("Error in query: $SqlsDep ");
                                            while ($ShowSqlsDepData = mysqli_fetch_array($SqlsDepData)) {
                                                @$Dep_name = $ShowSqlsDepData['Dep_name'];
                                            }
                                            echo $Dep_name;
                                            ?>
                                        </td>

                                        <td><?php
                                            $Pos_id = $ShowmployeetEmp['Pos_id'];
                                            @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
                                            @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
                                            while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
                                                @$Pos_name = $Showposition['Pos_name'];
                                            }
                                            echo $Pos_name;
                                            ?></td>
                                        <td>


                                    </tr>
                                <?php } ?>
                                <br>
                                <tr>
                                    <th scope="row" colspan="8" align="right">
                                    <?php echo 'ยอดรวมทั้งหมด' . @$j ?> คน 
                                    </th>
                                 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>







        <br> <br>





    </div>

    <?php
    @$html = ob_get_contents();
    @$mpdf->WriteHTML(@$html);
    @$mpdf->Output("ข้อมูลรายละเอียดพนักงาน.pdf");
    ob_end_flush();
    ?>



    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <!--  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap dashboard</a> templates from Bootstrapdash.com</span> -->
                </div>
            </div>
        </div>
    </footer>
</div>