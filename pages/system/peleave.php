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

                $('#str').val('addnullPeleave');
                $('#buttonY').text('เพิ่มข้อมูล');


            }

            function edtiPeleave(Type_id) {
                event.preventDefault();

                $.ajax({
                    url: "./api/getData.php?str=Peleave&Type_id=" + Type_id,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(Type_id);

                        $('#Type_id2').val(data.Type_id);
                        //  $('#Type_id').val(data.Type_id);
                        $('#Type_name').val(data.Type_name);
                        $('#Type_details').val(data.Type_details);
                        $('#leave_maximum').val(data.leave_maximum);
                        $('#Pos_id').val(data.Pos_id);
                        $('#Pos_id').text(data.Pos_name);

                        $('#Type_id').val(data.Type_id);
                        $('#Type_id').text(data.Type_name);

                        document.getElementById("Type_id").readOnly = true;


                        $('#str').val('edtiPeleave');
                        $('#buttonY').text('แก้ไขข้อมูล');
                    }
                });
            }
        </script>








        <!-- ====================================================================================================== -->







        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลสิทธิ์การลา</h5>
            </div>
        </div>






        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <!--      <th class="ml-5">รหัสการลา</th> -->
                                    <th>ตำแหน่ง</th>
                                    <th class="ml-5">ประเภทการลา</th>
                                    <th>ลาได้สูงสุด (วัน)</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($Showpeleave = mysqli_fetch_array($Sqltleave_rights)) {

                                ?>
                                    <tr>

                                        <!--    <td><?php echo $Showpeleave['Type_id'] ?></td> -->



                                        <td><?php
                                            $Pos_id = $Showpeleave['Pos_id'];
                                            @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
                                            @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
                                            while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
                                                @$Pos_name = $Showposition['Pos_name'];
                                            }
                                            echo $Pos_name;


                                            ?></td>

                                        <td><?php
                                            $Type_id =  $Showpeleave['Type_id'];

                                            @$ShowPosition = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
                                            @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
                                            while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
                                                echo  @$Type_name = $Showposition['Type_name'];
                                            }


                                            ?></td>

                                        <td><?php echo $Showpeleave['leave_maximum'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#addnullPeleave" onclick="edtiPeleave(Type_id =<?php echo $Showpeleave['Type_no'] ?>)" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <a href="./api/api_system.php?str=deletePeleave&Type_no=<?php echo $Showpeleave['Type_no']; ?>" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลใช่หรือไม่');" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    ลบ
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <form class="forms-sample" action="./api/api_system.php" method="POST">
                                    <input type="hidden" class="form-control" name="str" id="str" value="addnullPeleave">
                                    <tr>


                                        <td>
                                            <select class="form-control form-control-lg" name="Pos_id" id="exampleFormControlSelect1">
                                                <option id="Pos_id" value="" required selected> </option>
                                                <?php
                                                while ($Showposition = mysqli_fetch_array($Sqlposition)) {
                                                ?>
                                                    <option value="<?php echo $Showposition['Pos_id'] ?>"><?php echo $Showposition['Pos_name'] ?> </option>
                                                <?php }  ?>
                                            </select>
                                        </td>

                                        <td> <select class="form-control form-control-lg" name="Type_id" id="exampleFormControlSelect1">
                                                <option id="Type_id" value="" required selected> </option>
                                                <?php
                                                while ($ShowSqltypeleave = mysqli_fetch_array($Sqltypeleave)) {
                                                ?>
                                                    <option value="<?php echo $ShowSqltypeleave['Type_id'] ?>"><?php echo $ShowSqltypeleave['Type_name'] ?> </option>
                                                <?php }  ?>
                                            </select> </td>


                                        <td>
                                            <input type="number" class="form-control" name="leave_maximum" id="leave_maximum" placeholder="สิทธิ์การลา" required>
                                        </td>


                                        <td>
                                            <button type="submit" class="btn btn-primary" id="buttonY">บันทึก </button>
                                            <!-- <a onclick="nullPeleave()" class="btn btn-info" i>รีเซ็ต </a> -->
                                        </td>
                                      
                                            
                                      
                                    </tr>

                                </form>






                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <br><br>


        <!--  <center>
          
            <div class="card-body col-md-6">

                <form class="forms-sample" action="./api/api_system.php" method="POST">
                    <div class="form-row">
                        <input type="hidden" class="form-control" name="str" id="str" value="addnullPeleave">


                        <div class="form-group col-md-6 ">
                            <label for="exampleInputUsername1">ประเภทการลา</label>
                            

                            <select class="form-control form-control-lg" name="Type_id" id="exampleFormControlSelect1">
                                <option id="Type_id" value="" selected> </option>
                                <?php
                                while ($ShowSqltypeleave = mysqli_fetch_array($Sqltypeleave)) {
                                ?>
                                    <option value="<?php echo $ShowSqltypeleave['Type_id'] ?>"><?php echo $ShowSqltypeleave['Type_name'] ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6  ">
                            <label for="exampleInputUsername1">ตำแหน่ง</label>
                            <select class="form-control form-control-lg" name="Pos_id" id="exampleFormControlSelect1">
                                <option id="Pos_id" value="" selected> </option>
                                <?php
                                while ($Showposition = mysqli_fetch_array($Sqlposition)) {
                                ?>
                                    <option value="<?php echo $Showposition['Pos_id'] ?>"><?php echo $Showposition['Pos_name'] ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12  ">
                            <label for="exampleInputUsername1">ลาได้สูงสุด (วัน)</label>
                            <input type="number" class="form-control" name="leave_maximum" id="leave_maximum" placeholder="สิทธิ์การลา" required>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" id="buttonY">บันทึก </button>
                    <a onclick="nullPeleave()" class="btn btn-info" i>รีเซ็ต </a>
                </form>

            </div>
        </center> -->

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