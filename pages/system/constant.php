<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <!-- ======================================================================================================== -->
        <!--         <button type="button" onclick="nullConstant()" class="btn btn-primary" data-toggle="modal" data-target="#addconstant">
            เพิ่มข้อมูล
        </button> -->
        <center>
            <h5 class="mb-2 text-titlecase mb-4" id="buttonY">เพิ่มข้อมูลบริษัท</h5>
            <div class="card-body col-md-6">
                <form class="forms-sample" action="./api/api_system.php" method="POST">
                    <div class="form-row">
                        <input type="hidden" class="form-control" name="str" id="str" value="addconstant">
                        <input type="hidden" class="form-control" name="Stytem_No" id="Stytem_No" value="addconstant">

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ชื่อบริษัท</label>
                            <input type="text" class="form-control" name="Stytem_name" id="Stytem_name" placeholder="ชื่อบริษัท" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputUsername1">ที่อยู่บริษัท</label>
                            <input type="text" class="form-control" name="Stytem_address" id="Stytem_address" placeholder="ที่อยู่บริษัท" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">เบอร์โทร</label>
                            <input type="text" class="form-control" name="Stytem_tel" id="Stytem_tel" placeholder="เบอร์โทร" min="100000000" max="9999999999" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">รัศมี</label>
                            <input type="text" class="form-control" name="Stytem_radius" id="Stytem_radius" placeholder="ตำแหน่งรัติจุ" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ละติจูด</label>
                            <input type="text" class="form-control" name="System_latitude" id="System_latitude" placeholder="ตำแหน่งรัติจุ" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ลองติจูด</label>
                            <input type="text" class="form-control" name="System_longitude" id="System_longitude" placeholder="ตำแหน่งรัติจุ" required>
                        </div>




                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ช่วงเวลาเข้าทำงาน</label>
                            <input type="time" class="form-control" name="System_period" id="System_period" placeholder="เวลาเข้างาน" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ช่วงเวลาสิ้นสุด</label>
                            <input type="time" class="form-control" name="System_timeoff" id="System_timeoff" placeholder="เวลาออกงาน" required>
                        </div>



                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">เวลาเริ่มต้นออกงาน</label>
                            <input type="time" class="form-control" name="Stytem_starttime" id="Stytem_starttime" placeholder="เวลาเข้างาน" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">เวลาสิ้นสุดออกงาน</label>
                            <input type="time" class="form-control" name="Stytem_endtime" id="Stytem_endtime" placeholder="เวลาออกงาน" required>
                        </div>


                    </div>


                    <button type="submit" class="btn btn-primary" id="buttonY">เพื่มข้อมูล </button>
                    <a onclick="nullConstant()" class="btn btn-info" i>รีเซ็ต </a>
                </form>
            </div>
        </center>




        <?php
        extract(@$_GET);
        ?>

        <script type="text/javascript">
            function nullConstant() {
                $('#Stytem_name').val("");
                $('#Stytem_address').val("");
                $('#Stytem_tel').val("");
                $('#Stytem_radius').val("");
                $('#System_latitude').val("");
                $('#System_longitude').val("");
                $('#System_period').val("");
                $('#System_timeoff').val("");
                $('#Stytem_starttime').val("");
                $('#Stytem_endtime').val("");

                $('#str').val('addconstant');
                $('#buttonY').text('เพิ่มข้อมูล');
                $('#Stytem_No').val('');

            }

            function editConstant(Stytem_No) {
                event.preventDefault();
                $.ajax({
                    url: "./api/getData.php?str=constant&Stytem_No=" + Stytem_No,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#Stytem_name').val(data.Stytem_name);
                        $('#Stytem_address').val(data.Stytem_address);
                        $('#Stytem_tel').val(data.Stytem_tel);
                        $('#Stytem_radius').val(data.Stytem_radius);
                        $('#System_latitude').val(data.System_latitude);
                        $('#System_longitude').val(data.System_longitude);
                        $('#System_period').val(data.System_period);
                        $('#System_timeoff').val(data.System_timeoff);
                        $('#Stytem_starttime').val(data.Stytem_starttime);
                        $('#Stytem_endtime').val(data.Stytem_endtime);

                        $('#Stytem_No').val(data.Stytem_No);
                        $('#str').val('edticonstant');
                        $('#buttonY').text('แก้ไขข้อมูล');
                    }
                });
            }
        </script>

        <!-- ======================================================================================================== -->


        <br>


        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลบริษัท</h5>
            </div>
        </div>





        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th class="ml-5">ชื่อบริษัท</th>
                                    <th>ที่อยู่บริษัท</th>
                                    <th>เบอร์โทร</th>
                                    <th>รัศมี</th>
                                    <th>ละติจูด</th>
                                    <th>ลองติจูด</th>
                                    <th>ช่วงเวลาเข้าทำงาน</th>
                                    <th>ช่วงเวลาสิ้นสุด</th>
                                    <th>เวลาเริ่มต้นออกงาน</th>
                                    <th>เวลาสิ้นสุดออกงาน</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($Showconstant = mysqli_fetch_array($Sqlconstant)) {

                                ?>
                                    <tr>
                                        <td> <?php echo $Showconstant['Stytem_name'] ?> </td>
                                        <td><?php echo $Showconstant['Stytem_address'] ?></td>
                                        <td><?php echo $Showconstant['Stytem_tel'] ?></td>
                                        <td><?php echo $Showconstant['Stytem_radius'] ?></td>

                                        <td><?php echo $Showconstant['Stytem_radius'] ?></td>
                                        <td><?php echo $Showconstant['System_longitude'] ?></td>
                                        <td><?php echo $Showconstant['System_period'] ?></td>
                                        <td><?php echo $Showconstant['System_timeoff'] ?></td>

                                        <td><?php echo $Showconstant['Stytem_starttime'] ?></td>
                                        <td><?php echo $Showconstant['Stytem_endtime'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#addconstant" onclick="editConstant(Stytem_No =<?php echo $Showconstant['Stytem_No'] ?>)" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <a href="./api/api_system.php?str=deleteconstant&Stytem_No=<?php echo $Showconstant['Stytem_No']; ?>" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลใช่หรือไม่');" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    ลบ
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">

                </div>
            </div>
    </footer>
</div>