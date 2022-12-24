<!-- partial -->




<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <br><br>
            <a type="button" onclick="window.history.back();" class="btn btn-primary">
                ย้อนกลับ
            </a>
            <br><br>



        </div>

        <br><br>











        <?php

        extract(@$_GET);




        ?>


        <center>

            <h4> ประวัติลางาน</h4>
            <br>
            <h4> ของคุณ :: <?php echo $Emp_name; ?> </h4>
            <br>
            <a type="button" href="api/api_system.php?Leave_id=<?php echo $Leave_id; ?>&str=approve" class="btn btn-primary">อนุมัติ</a>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                ไม่อนุมัติ
            </button>
            <br><br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive pt-3">
                            <table class="table table-striped project-orders-table">
                                <thead>
                                    <tr align='center'>
                                        <th class="ml-5">ลำดับ</th>
                                        <th>ประเภทการลา</th>
                                        <th>จำนวนที่ลาได้</th>
                                        <th>ลาไปแล้ว (วัน) </th>
                                        <th>คงเหลือ (วัน)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $k = 0;
                                    /*    @$sql = "SELECT * FROM  `leave` WHERE  Leave_status =  '2' and Emp_id = '$Emp_id' ";
                                    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql "); */

                                    @$sql = "SELECT * FROM  `typeleave`  ";
                                    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
                                    while ($namesql = mysqli_fetch_array($sqlshow)) {
                                        $Type_id =  $namesql['Type_id'];
                                        $k++;
                                        $datesom = 0;
                                        @$sql1 = "SELECT * FROM  `leave_rights` where Type_id = '$Type_id'  ";
                                        @$sqlshow1 = mysqli_query($con, $sql1) or die("Error in query: $sql1 ");
                                        while ($namesql1 = mysqli_fetch_array($sqlshow1)) {
                                            $leave_maximum =   $namesql1['leave_maximum'];
                                        }

                                        @$leave = "SELECT * FROM `leave` WHERE  Emp_id = '$Emp_id' and Leave_status = '2'  and Type_id = '$Type_id';    ";
                                        @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
                                        while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
                                            $Leave_start =   $ShowSqlleave['Leave_start'];
                                            $Leave_end =   $ShowSqlleave['Leave_end'];
                                            $datesom =  substr($Leave_end, 8) - substr($Leave_start, 8);
                                        }


                                    ?>
                                        <tr align='center'>

                                            <td><?php echo $k;  ?></td>
                                            <td><?php echo $namesql['Type_name'];  ?></td>
                                            <td><?php echo $leave_maximum;  ?></td>
                                            <td><?php echo @$datesom;  ?></td>
                                            <td><?php echo @$leave_maximum - $datesom;  ?></td>
                                        </tr>



                                    <?php  }
                                    ?>

                                </tbody>
                            </table>


















                        </div>


                    </div>
                </div>
            </div>
        </center>

        <br><br> <br><br> <br><br>
        <center>
            <h4> ประวัติลางาน </h4>
        </center>

        <br><br>
        <table class="table table-striped project-orders-table">
            <thead>
                <tr align='center'>
                    <th class="ml-5">ลำดับ</th>

                    <th>ชื่อพนักงาน</th>
                    <th>ประเภทการลา</th>
                    <th>วันที่ยื่นใบลา</th>
                    <th>วันเริ่มต้นลา</th>
                    <th>วันสิ้นสุดลา</th>
                    <th>วันที่การอนุมัติ</th>
                    <th>เหตุผลการลา</th>
                    <th>หมายเหตุการอนุมัติหรือไม่อนุมัติ</th>
                    <th>สถานะการอนุมัติการลา</th>




                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                @$leave = "SELECT * FROM `leave` WHERE  Emp_id = '$Emp_id' and Leave_status = '2'   ORDER BY Leave_status DESC;    ";
                @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
                while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {
                    $i++;
                    $Emp_id = $ShowSqlleave['Emp_id'];
                    @$sql = "SELECT * FROM employee WHERE  Emp_id =  '$Emp_id' ";
                    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
                    while ($namesql = mysqli_fetch_array($sqlshow)) {
                        @$Emp_name = $namesql['Emp_name'];
                    }

                    @$Type_id =   $ShowSqlleave['Type_id'];
                    @$sql = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
                    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
                    while ($namesql = mysqli_fetch_array($sqlshow)) {
                        @$Type_name = $namesql['Type_name'];
                    }
                ?>

                    <tr align='center'>
                        <td><?php echo $i ?></td>

                        <td><?php echo $Emp_name; ?></td>
                        <td><?php echo $Type_name; ?></td>
                        <td><?php echo $ShowSqlleave['Leave_date'] ?></td>
                        <td><?php echo $ShowSqlleave['Leave_start'] ?></td>
                        <td><?php echo $ShowSqlleave['Leave_end'] ?></td>
                        <td><?php echo $ShowSqlleave['App_date'] ?></td>
                        <td><?php echo $ShowSqlleave['Leave_reason'] ?></td>
                        <td>
                            <?php
                            $App_note = $ShowSqlleave['App_note'];
                            if ($App_note == null) {
                                $App_note = 'ไม่มี';
                            }
                            echo $App_note;
                            ?>

                        </td>

                        <td><?php
                            $Leave_status =  $ShowSqlleave['Leave_status'];

                            if ($Leave_status == 1) {
                                echo '<div class="alert alert-primary" role="alert">
                    รออนุมัติ
                  </div>';
                            } else if ($Leave_status == 2) {
                                echo '<div class="alert alert-success" role="alert">
                    อนุมัติการลางานแล้ว
                  </div>';
                            } else if ($Leave_status == 3) {
                                echo '<div class="alert alert-danger" role="alert">
                    เข้างานสาย
                  </div>';
                            }

                            ?></td>





                    </tr>
                <?php } ?>
            </tbody>













    </div>


</div>














<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">โปรดระบุสาเหตุที่ไม่อนุมติ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" action="./api/api_system.php" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">สาเหตุที่ไม่อนุมัติ</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="str" value="noapprove" class="form-control" id="inputEmail3">
                            <input type="hidden" name="Leave_id" value="<?php echo $Leave_id;  ?>"class="form-control" id="inputEmail3">
                            <input type="text" name="App_note" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">ยืนยันการไม่อนุมัติ</button>
                </div>
            </form>
        </div>
    </div>
</div>