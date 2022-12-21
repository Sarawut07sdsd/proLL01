<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลตำแหน่ง</h5>
            </div>
        </div>


        <!--         <button type="button" onclick="nullPosition()" class="btn btn-primary" data-toggle="modal" data-target="#addnullPosition">
            เพิ่มข้อมูล
        </button> -->

        <br> <br>








        <?php
        extract(@$_GET);
        ?>

        <script type="text/javascript">
            function nullPosition() {
                var random = Math.floor(Math.random() * 10000000000000);
                $('#Pos_id4').val(random);
                document.getElementById("Pos_id4").readOnly = true;
                $('#Pos_name').val("");
                $('#str').val('addnullPosition');
                $('#buttonY').text('เพิ่มข้อมูล');
                $('#Pos_id').val('');

            }

            function edtiPosition(Pos_id) {
                event.preventDefault();
                $.ajax({
                    url: "./api/getData.php?str=Position&Pos_id=" + Pos_id,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#Pos_id45').val(data.Pos_id);
                        $('#Pos_id4').val(data.Pos_id);
                        document.getElementById("Pos_id4").readOnly = true;
                        $('#Pos_name').val(data.Pos_name);
                        $('#str').val('edtiPosition');
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
                                    <th class="ml-5">รหัสตำแหน่ง</th>
                                    <th>ชื่อตำแหน่ง</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($Showposition = mysqli_fetch_array($Sqlposition)) {

                                ?>
                                    <tr>

                                        <td><?php echo $Showposition['Pos_id'] ?></td>
                                        <td><?php echo $Showposition['Pos_name'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#addnullPosition" onclick="edtiPosition(Pos_id =<?php echo $Showposition['Pos_id'] ?>)" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <a href="./api/api_system.php?str=deletePosition&Pos_id=<?php echo $Showposition['Pos_id']; ?>" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลใช่หรือไม่');" type="button" class="btn btn-danger btn-sm btn-icon-text">
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
            <h5 class="mb-2 text-titlecase mb-4" >จัดการข้อมูลตำแหน่ง</h5>
            <div class="card-body col-md-6">
                <form class="forms-sample" action="./api/api_system.php" method="POST">
                    <input type="hidden" class="form-control" name="str" id="str" value="addnullPosition">
                    <input type="hidden" class="form-control" name="Pos_id" id="Pos_id45" placeholder="รหัสแผนก" required>

                    <div class="form-group">
                       <!--  <label for="exampleInputUsername1">รหัสตำแหน่ง</label> -->
                        <input type="hidden" class="form-control" name="Pos_id" id="Pos_id4" placeholder="รหัสตำแหน่ง" required>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputUsername1">ชื่อตำแหน่ง</label>
                        <input type="text" class="form-control" name="Pos_name" id="Pos_name" placeholder="ชื่อตำแหน่ง" required>
                    </div>





                    <button type="submit" class="btn btn-primary" id="buttonY"> เพิ่มข้อมูล</button>

              <!--       <a onclick="nullPosition()" class="btn btn-info" i>รีเซ็ต </a> -->

                </form>
            </div>
        </center>


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