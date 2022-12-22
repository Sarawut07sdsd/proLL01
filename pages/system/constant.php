<div class="main-panel">
    <div class="content-wrapper">


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
        <center>
            <br>
            <h4>ค่าคงที่ของระบบ </h4>
            <br>
            <div class="card-body col-md-6">
                <form class="forms-sample" action="./api/api_system.php" method="POST">
                    <div class="form-group row">
                        <input type="hidden" class="form-control" name="str" id="str" value="edticonstant">
                    </div>

                    <input type="hidden" class="form-control" name="Stytem_No" id="Stytem_No" value="<?php echo $Stytem_No; ?>">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อบริษัท</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Stytem_name" id="Stytem_name" value="<?php echo $Stytem_name; ?>" placeholder="ชื่อบริษัท" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">ที่อยู่บริษัท</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Stytem_address" id="Stytem_address" value="<?php echo $Stytem_address; ?>" placeholder="ที่อยู่บริษัท" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">เบอร์โทร</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Stytem_tel" id="Stytem_tel" value="<?php echo $Stytem_tel; ?>" placeholder="เบอร์โทร" min="100000000" max="9999999999" required>
                        </div>
                    </div>
                    <br><br>
                    <h4>ช่วงเวลาที่ให้พนักงานลงเวลาเข้างานได้ </h4>
                    <br><br>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">ช่วงเวลาเข้าทำงาน</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="System_period" id="System_period" value="<?php echo $System_period; ?>" placeholder="เวลาเข้างาน" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">ช่วงเวลาสิ้นสุด</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="System_timeoff" id="System_timeoff" value="<?php echo $System_timeoff; ?>" placeholder="เวลาออกงาน" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">เวลาเริ่มต้นออกงาน</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="Stytem_starttime" id="Stytem_starttime" value="<?php echo $Stytem_starttime; ?>" placeholder="เวลาเข้างาน" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">เวลาสิ้นสุดออกงาน</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="Stytem_endtime" id="Stytem_endtime" value="<?php echo $Stytem_endtime; ?>" placeholder="เวลาออกงาน" required>
                        </div>
                    </div>



                    <br><br>
                    <h4>ตำแหน่งจุดศูนกลางบริษัท </h4>
                    <br><br>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" class="col-sm-2 col-form-label" for="exampleInputUsername1">รัศมี</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Stytem_radius" id="Stytem_radius" value="<?php echo $Stytem_radius; ?>" placeholder="ตำแหน่งรัติจุ" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">ละติจูด</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="System_latitude" id="System_latitude" value="<?php echo $System_latitude; ?>" placeholder="ตำแหน่งรัติจุ" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputUsername1">ลองติจูด</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="System_longitude" id="System_longitude" value="<?php echo $System_longitude; ?>" placeholder="ตำแหน่งรัติจุ" required>
                        </div>
                    </div>



            </div>

            <button type="submit" class="btn btn-primary" id="buttonY">บันทึก </button>

            </form>
    </div>
    </center>



    <br>




    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">

                </div>
            </div>
    </footer>
</div>