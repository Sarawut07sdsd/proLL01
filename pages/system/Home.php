<?php
@$constant = "SELECT * FROM constant  ";
@$Sqlconstant = mysqli_query($con, $constant) or die("Error in query: $constant ");
while ($ShowSqlconstant = mysqli_fetch_array($Sqlconstant)) {

    $Stytem_No =   $ShowSqlconstant['Stytem_No'];
    $Stytem_name =   $ShowSqlconstant['Stytem_name'];
    $Stytem_address =   $ShowSqlconstant['Stytem_address'];
    $Stytem_tel =   $ShowSqlconstant['Stytem_tel'];
    $Stytem_radius =   $ShowSqlconstant['Stytem_radius'];
    $System_latitude =   $ShowSqlconstant['System_latitude'];
    $System_longitude =   $ShowSqlconstant['System_longitude'];
    $System_period =   $ShowSqlconstant['System_period'];
    $System_timeoff =   $ShowSqlconstant['System_timeoff'];
    $Stytem_starttime =   $ShowSqlconstant['Stytem_starttime'];
    $Stytem_endtime =   $ShowSqlconstant['Stytem_endtime'];
}
?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- ====================================================================================================== -->
        <center>
            <div class="row">
                <div class="col-xl-12 grid-margin stretch-card flex-column">
                    <h1 class="mb-2 text-titlecase mb-4 text-primary"><?php echo $Stytem_name; ?> </h1>
                    <h2 class="mb-2 text-titlecase mb-4 text-primary">ระบบบันทึกเวลาด้วยระบบพิสูจน์ตัวตน 2 ชั้น ผ่านสมาร์ทโฟน </h2>
                    <h3>ที่อยู่ : <?php echo $Stytem_address; ?> <br><br> เบอร์โทรติดต่อ : <?php echo $Stytem_tel; ?> </h3>
                </div>
            </div>
            <br> <br> <br>
            <img src="https://th.hrnote.asia/wp/wp-content/uploads/2019/03/shutterstock_583771270.png">
        </center>
        <br><br>
    </div>


    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                </div>
            </div>
        </div>
    </footer>
</div>