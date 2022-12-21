<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!--   <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลสิทธิ์การลา</h5>
            </div>
        </div> -->




        <!-- 
        <button type="button" onclick="nullPeleave()" class="btn btn-primary" data-toggle="modal" data-target="#addnullPeleave">
            เพิ่มข้อมูล
        </button> -->

        <br> <br>







        <?php
        extract(@$_GET);
        ?>

        <script type="text/javascript">
            function nullPeleave() {
                var random = Math.floor(Math.random() * 10000000000000);
                $('#Type_id2').val(random);
                $('#Type_id').val(random);
                $('#Type_name').val("");
                $('#Type_details').val("");
                $('#leave_maximum').val("");
                $('#Pos_id').val("");
                $('#Pos_id').text("");

                document.getElementById("Type_id").readOnly = false;

                $('#str').val('addnullPeleave1');
                $('#buttonY').text('เพิ่มข้อมูล');


            }

            function edtiPeleave(Type_id) {
                event.preventDefault();

                $.ajax({
                    url: "./api/getData.php?str=Peleave1&Type_id=" + Type_id,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(Type_id);

                        $('#Type_id2').val(data.Type_id);
                        $('#Type_id').val(data.Type_id);
                        $('#Type_name').val(data.Type_name);
                        $('#Type_details').val(data.Type_details);
                        $('#leave_maximum').val(data.leave_maximum);
                        $('#Pos_id').val(data.Pos_id);
                        $('#Pos_id').text(data.Pos_name);

                        document.getElementById("Type_id").readOnly = true;


                        $('#str').val('edtiPeleave1');
                        $('#buttonY').text('แก้ไขข้อมูล');
                    }
                });
            }
        </script>








        <!-- ====================================================================================================== -->
















        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลประเภทการลางาน</h5>
            </div>
        </div>






        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th class="ml-5">รหัสการลา</th>
                                    <th>เหตุลา</th>
                                    <th>รายละเอียดการลา</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($Showpeleave = mysqli_fetch_array($Sqltypeleave)) {

                                ?>
                                    <tr>

                                        <td><?php echo $Showpeleave['Type_id'] ?></td>
                                        <td><?php echo $Showpeleave['Type_name'] ?></td>
                                        <td><?php echo $Showpeleave['Type_details'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#addnullPeleave" onclick="edtiPeleave(Type_id =<?php echo $Showpeleave['Type_id'] ?>)" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <a href="./api/api_system.php?str=deletePeleave1&Type_id=<?php echo $Showpeleave['Type_id']; ?>" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลใช่หรือไม่');" type="button" class="btn btn-danger btn-sm btn-icon-text">
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


        <br><br>

        <center>
            <h5 class="mb-2 text-titlecase mb-4">จัดการข้อมูลประเภทการลางาน</h5>
            <div class="card-body col-md-6">
                <form class="forms-sample" action="./api/api_system.php" method="POST">
                    <div class="form-row">
                        <input type="hidden" class="form-control" name="str" id="str" value="addnullPeleave1">
                        <input type="hidden" class="form-control" name="Type_id" id="Type_id2">
                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">รหัสการลา</label>
                            <input type="text" class="form-control" name="Type_id" id="Type_id" placeholder="รหัสผู้บริหาร" required>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">เหตุลา</label>
                            <input type="text" class="form-control" name="Type_name" id="Type_name" placeholder="ชื่อพนักงาน" required>
                        </div>
                        <div class="form-group col-md-12  ">
                            <label for="exampleInputUsername1">รายละเอียดการลา</label>
                            <textarea class="form-control" name="Type_details" id="Type_details" rows="5"></textarea>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary" id="buttonY">บันทึก </button>
                    <a onclick="nullPeleave()" class="btn btn-info" i>รีเซ็ต </a>
                </form>

            </div>
        </center>

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