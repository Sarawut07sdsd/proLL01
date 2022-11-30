<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลบริษัท</h5>
            </div>
        </div>
        <!-- ======================================================================================================== -->
        <button type="button" onclick="nullConstant()" class="btn btn-primary" data-toggle="modal" data-target="#addconstant">
            เพิ่มข้อมูล
        </button>

        <br> <br>

        <div class="modal fade" id="addconstant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลบริษัท</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form class="forms-sample" action="./api/api_system.php" method="POST">
                                <input type="hidden" class="form-control" name="str" id="str" value="addconstant">
                                <input type="hidden" class="form-control" name="Stytem_No" id="Stytem_No" value="addconstant">

                                <div class="form-group">
                                    <label for="exampleInputUsername1">ชื่อบริษัท</label>
                                    <input type="text" class="form-control" name="Stytem_name" id="Stytem_name" placeholder="ชื่อบริษัท" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">ที่อยู่บริษัท</label>
                                    <input type="text" class="form-control" name="Stytem_address" id="Stytem_address" placeholder="ที่อยู่บริษัท" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">เบอร์โทร</label>
                                    <input type="text" class="form-control" name="Stytem_tel" id="Stytem_tel" placeholder="เบอร์โทร" min="100000000" max="9999999999" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">ตำแหน่งรัติจุ</label>
                                    <input type="text" class="form-control" name="Stytem_radius" id="Stytem_radius" placeholder="ตำแหน่งรัติจุ" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">เวลาเข้างาน</label>
                                    <input type="time" class="form-control" name="Stytem_periodStest" id="Stytem_periodStest" placeholder="เวลาเข้างาน" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">เวลาออกงาน</label>
                                    <input type="time" class="form-control" name="Stytem_periodEnd" id="Stytem_periodEnd" placeholder="เวลาออกงาน" required>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary" id="buttonY"> </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        extract(@$_GET);
        ?>

        <script type="text/javascript">
            function nullConstant() {
                $('#Stytem_name').val("");
                $('#Stytem_address').val("");
                $('#Stytem_tel').val("");
                $('#Stytem_radius').val("");
                $('#Stytem_periodStest').val("");
                $('#Stytem_periodEnd').val("");
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
                        $('#Stytem_periodStest').val(data.Stytem_periodStest);
                        $('#Stytem_periodEnd').val(data.Stytem_periodEnd);
                        $('#Stytem_No').val(data.Stytem_No);
                        $('#str').val('edticonstant');
                        $('#buttonY').text('แก้ไขข้อมูล');
                    }
                });
            }
        </script>

        <!-- ======================================================================================================== -->











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
                                    <th>ตำแหน่งรัติจุ</th>
                                    <th>เวลาเข้างาน</th>
                                    <th>เวลาออกงาน</th>

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
                                        <td><?php echo $Showconstant['Stytem_periodStest'] ?></td>
                                        <td><?php echo $Showconstant['Stytem_periodEnd'] ?></td>
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