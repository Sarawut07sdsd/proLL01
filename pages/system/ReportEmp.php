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






?>
<?php ob_start(); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <br><br>
        <center>
            <h2 align="center" class="mb-2 text-titlecase mb-4">ระบบบันทึกเวลาเข้าออกงาน</h2>
            <h2 align="center" class="mb-2 text-titlecase mb-4">รายงานข้อมูลพนักงาน</h2>

            <br><br>

        </center>


        <?php
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        ob_end_flush();
        ?>


        <div align="right">
            <a target="_blank" href="ข้อมูลพนักงาน.pdf" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                </svg>
            </a>
        </div>

        <?php ob_start(); ?>
        <div class="row">

            <div class="col-md-12">

                <h4> ข้อมูลตำแหน่งงาน </h4>

                <div class=" card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table" style="width:100%">
                            <thead align="left">
                                <tr>
                                    <th style="border:solid 1px black;" align="left">ชื่อตำแหน่ง</th>
                                    <th style="border:solid 1px black;" align="left">จำนวน คน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 0;
                                $i=0;
                                while ($Showposition = mysqli_fetch_array($Sqlposition)) {
                                    $i++;
                                    $numPos_name1 = 0;
                                    $Pos_id =   $Showposition['Pos_id'];
                                    @$sql = "SELECT * FROM  `employee` where  Pos_id = '$Pos_id' ";
                                    $q = mysqli_query($con, $sql);
                                    $numPos_name1 = mysqli_num_rows($q);
                                    $num = $num + $numPos_name1;
                                ?>
                                    <tr>
                                        <td style="border:solid 1px black;"><?php echo $Showposition['Pos_name'] ?></td>
                                        <td style="border:solid 1px black;"><?php echo $numPos_name1 ?> คน </td>
                                        <?php
                                        $html = ob_get_contents();
                                        $mpdf->WriteHTML($html);
                                        ob_end_flush();
                                        ?>
                                        <td>
                                            <center>
                                                <a href="index.php?p=ReportEmp1&str=<?php echo $i; ?>" type="button" class="btn btn-success btn-sm btn-icon-text">
                                                    <h6> ดูข้อมูลเพิ่มเติม </h6>
                                                </a>
                                            </center>
                                        </td>
                                        <?php ob_start(); ?>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th scope="row" style="border:solid 1px black;">
                                        <center> ยอดรวมทั้งหมด </center>
                                    </th>
                                    <td colspan="1" style="border:solid 1px black;">
                                        <h4> <?php echo $num ?> คน </h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>






    </div>



</div>

<?php
@$html = ob_get_contents();
@$mpdf->WriteHTML(@$html);
@$mpdf->Output("ข้อมูลพนักงาน.pdf");
ob_end_flush();
?>