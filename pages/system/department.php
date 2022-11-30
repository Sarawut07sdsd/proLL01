<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมลูแผนก</h5>
            </div>
        </div>



        <button type="button" onclick="nullDepartment()" class="btn btn-primary" data-toggle="modal" data-target="#addnullDepartment">
            เพิ่มข้อมูล
        </button>

        <br> <br>

        <div class="modal fade" id="addnullDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลแผนก</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form class="forms-sample" action="./api/api_system.php" method="POST">
                                <input type="hidden" class="form-control" name="str" id="str" value="addnullDepartment">
                                <input type="hidden" class="form-control" name="Dep_id" id="Dep_id45" placeholder="รหัสแผนก" required>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">รหัสแผนก</label>
                                    <input type="text" class="form-control" name="Dep_id" id="Dep_id4" placeholder="รหัสแผนก" required>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputUsername1">ชื่อแผนก</label>
                                    <input type="text" class="form-control" name="Dep_name" id="Dep_name" placeholder="ชื่อแผนก" required>
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
            function nullDepartment() {
                var random = Math.floor(Math.random() * 10000000000000);
                $('#Dep_id4').val(random);
                document.getElementById("Dep_id4").readOnly = true;
                $('#Dep_name').val("");
                $('#str').val('addnullDepartment');
                $('#buttonY').text('เพิ่มข้อมูล');
                $('#Dep_id').val('');

            }

            function edtiDepartment(Dep_id) {
                event.preventDefault();
                $.ajax({
                    url: "./api/getData.php?str=Department&Dep_id=" + Dep_id,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#Dep_id45').val(data.Dep_id);
                        $('#Dep_id4').val(data.Dep_id);
                        document.getElementById("Dep_id4").readOnly = true;
                        $('#Dep_name').val(data.Dep_name);
                        $('#str').val('edtiDepartment');
                        $('#buttonY').text('แก้ไขข้อมูล');
                    }
                });
            }
        </script>








        <!-- ====================================================================================================== -->



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th class="ml-5">รหัสแผนก</th>
                                    <th>ชื่อแผนก</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($Showdepartment = mysqli_fetch_array($Sqldepartment)) {

                                ?>
                                    <tr>

                                        <td><?php echo $Showdepartment['Dep_id'] ?></td>
                                        <td><?php echo $Showdepartment['Dep_name'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#addnullDepartment" onclick="edtiDepartment(Dep_id =<?php echo $Showdepartment['Dep_id'] ?>)" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <a href="./api/api_system.php?str=deleteDepartment&Dep_id=<?php echo $Showdepartment['Dep_id']; ?>" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลใช่หรือไม่');" type="button" class="btn btn-danger btn-sm btn-icon-text">
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
        </div>
    </footer>
</div>