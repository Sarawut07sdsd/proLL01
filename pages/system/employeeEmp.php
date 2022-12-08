<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!--         <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลผู้พนักงาน</h5>
            </div>
        </div>
 -->







        <!-- 

        <button type="button" onclick="nullEmployee()" class="btn btn-primary" data-toggle="modal" data-target="#addnullEmployee">
            เพิ่มข้อมูล
        </button> -->

        <br> <br>

        <center>
            <h5 class="mb-2 text-titlecase mb-4" id="buttonY">เพิ่มข้อมูลผู้พนักงาน</h5>
            <div class="card-body col-md-6">
                <form class="forms-sample" action="./api/api_system.php" method="POST">
                    <div class="form-row">
                        <input type="hidden" class="form-control" name="str" id="str" value="addnullEmployee">
                        <input type="hidden" class="form-control" name="str2" id="str2" value="employeeEmp">

                        <input type="hidden" class="form-control" name="Emp_id" id="Emp_id45" placeholder="รหัสแผนก" required>
                        <input type="hidden" class="form-control" name="Emp_iddd" id="Emp_id" placeholder="รหัสแผนก" required>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">รหัสผู้บริหาร</label>
                            <input type="text" class="form-control" name="Emp_id" id="Emp_id4" placeholder="รหัสผู้บริหาร" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="Emp_pass" id="Emp_pass" placeholder="รหัสผ่าน" required>
                        </div>


                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ชื่อพนักงาน</label>
                            <input type="text" class="form-control" name="Emp_name" id="Emp_name" placeholder="ชื่อพนักงาน" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">เบอร์โทร</label>
                            <input type="text" class="form-control" name="Emp_tel" id="Emp_tel" placeholder="เบอร์โทร" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ที่อยู่</label>
                            <input type="text" class="form-control" name="Emp_address" id="Emp_address" placeholder="ที่อยู่" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">แผนก</label>
                            <!--  <input type="text" class="form-control" name="Dep_id" id="Dep_id" placeholder="ชื่อตำแหน่ง" required> -->


                            <select class="form-control form-control-lg" name="Dep_id" id="exampleFormControlSelect1">
                                <option id="Dep_id" value="" selected> </option>
                                <?php
                                while ($Showdepartment = mysqli_fetch_array($Sqldepartment)) {
                                ?>
                                    <option value="<?php echo $Showdepartment['Dep_id'] ?>"><?php echo $Showdepartment['Dep_name'] ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ตำแหน่ง</label>
                            <!-- <input type="text" class="form-control" name="Pos_id" id="Pos_id" placeholder="ชื่อตำแหน่ง" required> -->
                            <select class="form-control form-control-lg" name="Pos_id" id="exampleFormControlSelect1">
                                <option id="Pos_id" value="" selected> </option>
                                <?php
                                while ($Showposition = mysqli_fetch_array($Sqlposition)) {
                                ?>
                                    <option value="<?php echo $Showposition['Pos_id'] ?>"><?php echo $Showposition['Pos_name'] ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary" id="buttonY"> บันทึก</button>
                    <a onclick="nullEmployee()" class="btn btn-info" i>รีเซ็ต </a>
                </form>
            </div>



        </center>


        <?php
        extract(@$_GET);
        ?>

        <script type="text/javascript">
            function nullEmployee() {

                $('#Emp_id').val("");
                $('#Emp_name').val("");
                $('#Emp_tel').val("");
                $('#Emp_address').val("");
                $('#Dep_id').val("");
                $('#Dep_id').text("");
                $('#Pos_id').val("");
                $('#Pos_id').text("");

                $('#Emp_id4').val("");
                document.getElementById("Emp_id4").readOnly = false;
                document.getElementById("Emp_pass").readOnly = false;
                $('#str').val('addnullEmployee');
                $('#buttonY').text('เพิ่มข้อมูล');
                $('#Pos_id').val('');

            }

            function edtiEmployee(Emp_id) {
                event.preventDefault();
                $.ajax({
                    url: "./api/getData.php?str=Employee&Emp_id=" + Emp_id,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#Emp_id45').val(data.Emp_id);
                        $('#Emp_id4').val(data.Emp_id);
                        $('#Emp_id').val(data.Emp_id);
                        document.getElementById("Emp_id4").readOnly = true;
                        $('#Emp_name').val(data.Emp_name);
                        $('#Emp_tel').val(data.Emp_tel);
                        $('#Emp_address').val(data.Emp_address);
                        $('#Dep_id').val(data.Dep_id);
                        $('#Dep_id').text(data.Dep_name);
                        $('#Pos_id').val(data.Pos_id);
                        $('#Pos_id').text(data.Pos_name);

                        document.getElementById("Emp_pass").readOnly = true;
                        $('#str').val('edtiEmployee');
                        $('#buttonY').text('แก้ไขข้อมูล');
                    }
                });
            }
        </script>








        <!-- ====================================================================================================== -->




        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลผู้บริหาร</h5>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
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
                                while ($ShowmployeetEmp = mysqli_fetch_array($SqlemployeeEmp)) {

                                ?>
                                    <tr>
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
                                            ?></td>

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
                                            <div class="d-flex align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#addnullEmployee" onclick="edtiEmployee(Emp_id =<?php echo $ShowmployeetEmp['Emp_id'] ?>)" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <a href="./api/api_system.php?str=deleteEmployee&str2=employeeEmp&Emp_id=<?php echo $ShowmployeetEmp['Emp_id']; ?>" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลใช่หรือไม่');" type="button" class="btn btn-danger btn-sm btn-icon-text">
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
                    <!--  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap dashboard</a> templates from Bootstrapdash.com</span> -->
                </div>
            </div>
        </div>
    </footer>
</div>