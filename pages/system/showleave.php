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
        $datetime =  date('Y');
        extract(@$_GET);


        @$leave = "SELECT * FROM leaves WHERE  Leave_id = '$Leave_id' ;    ";
        @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
        while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {


            $Emp_id = $ShowSqlleave['Emp_id'];
            @$sql = "SELECT * FROM employee WHERE  Emp_id =  '$Emp_id' ";
            @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
            while ($namesql = mysqli_fetch_array($sqlshow)) {
                @$Emp_name = $namesql['Emp_name'];
                @$Pos_id = $namesql['Pos_id'];
                @$Dep_id = $namesql['Dep_id'];
            }

            @$Type_id =   $ShowSqlleave['Type_id'];
            @$sql = "SELECT * FROM typeleave WHERE  Type_id =  '$Type_id' ";
            @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
            while ($namesql = mysqli_fetch_array($sqlshow)) {
                @$Type_name = $namesql['Type_name'];
            }

            @$sql = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
            @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
            while ($namesql = mysqli_fetch_array($sqlshow)) {
                @$Pos_name = $namesql['Pos_name'];
            }

            @$SqlsDep = "SELECT * FROM department WHERE  Dep_id =  '$Dep_id' ";
            @$SqlsDepData = mysqli_query($con, $SqlsDep) or die("Error in query: $SqlsDep ");
            while ($ShowSqlsDepData = mysqli_fetch_array($SqlsDepData)) {
                @$Dep_name = $ShowSqlsDepData['Dep_name'];
            }

            @$App_note =   $ShowSqlleave['App_note'];
            @$Leave_end =  $ShowSqlleave['Leave_end'];
            @$Leave_start = $ShowSqlleave['Leave_start'];
            @$Leave_date =  $ShowSqlleave['Leave_date'];
            if ($App_note == '') {
                $App_note = "ไม่มีได้ระบุเหตุผล";
            }
        }

        ?>



        <center>
            <h4> ข้อมูลการลา</h4>
            <table>
                <thead>
                    <tr align='center'>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <h4>
                            <th>ของคุณ :: </th>
                            <th><?php echo $Emp_name; ?></th>
                        </h4>
                    </tr>

                    <tr>
                        <h4>
                            <th>ตำแหน่ง :: </th>
                            <th><?php echo $Pos_name; ?></th>
                        </h4>
                    </tr>

                    <tr>
                        <h4>
                            <th>แผนก :: </th>
                            <th><?php echo $Dep_name; ?></th>
                        </h4>
                    </tr>

                    <tr>
                        <h4>
                            <th>วันที่ยืนลา :: </th>
                            <th><?php echo $Leave_date; ?></th>
                        </h4>
                    </tr>

                    <tr>
                        <h4>
                            <th>ประเภทการลา :: </th>
                            <th><?php echo $Type_name; ?></th>
                        </h4>
                    </tr>

                    <tr>
                        <h4>
                            <th>วันที่เริ่มต้นการลา :: </th>
                            <th><?php echo $Leave_start; ?></th>
                        </h4>
                    </tr>
                    <tr>
                        <h4>
                            <th>วันที่สิ้นสุดการลา :: </th>
                            <th> <?php echo $Leave_end; ?></th>
                        </h4>
                    </tr>




                    <tr>
                        <h4>
                            <th>เหตุผล :: </th>
                            <th><?php echo $App_note; ?></th>
                        </h4>
                    </tr>
                </tbody>
            </table>
        </center>
        <br>
        <center>
            <a type="button" href="api/api_system.php?Leave_id=<?php echo $Leave_id; ?>&str=approve" class="btn btn-primary">อนุมัติ</a>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                ไม่อนุมัติ
            </button>
        </center>
        <br><br>
        <h4>สิทธิ์การลาในปีปัจจุบัน ( <?php echo date('Y') ?> ) </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="table-responsive pt-3">

                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr align='center'>
                                    <th class="ml-5">ลำดับ</th>
                                    <th>ประเภทการลา</th>
                                    <th>สิทธิ์ที่ลาได้ (วัน)</th>
                                    <th>ใช้ไปแล้ว (วัน) </th>
                                    <th>คงเหลือ (วัน)</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $k = 0;
                                /*    @$sql = "SELECT * FROM  leaves WHERE  Leave_status =  '2' and Emp_id = '$Emp_id' ";
                                    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql "); */

                                @$sql = "SELECT * FROM  `typeleave`  ";
                                @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
                                while ($namesql = mysqli_fetch_array($sqlshow)) {
                                    $Type_id =  $namesql['Type_id'];
                                    $k++;
                                    $datesom = 0;
                                    $datesomSum = 0;
                                    @$sql1 = "SELECT * FROM  `leave_rights` where Type_id = '$Type_id'  ";
                                    @$sqlshow1 = mysqli_query($con, $sql1) or die("Error in query: $sql1 ");
                                    while ($namesql1 = mysqli_fetch_array($sqlshow1)) {
                                        $leave_maximum =   $namesql1['leave_maximum'];
                                    }

                                    @$leave = "SELECT * FROM leaves WHERE  Emp_id = '$Emp_id' and Leave_status = '2' AND YEAR(Leave_date) = '$datetime' and Type_id = '$Type_id';    ";
                                    @$Sqlleave = mysqli_query($con, $leave) or die("Error in query: $leave ");
                                    while ($ShowSqlleave = mysqli_fetch_array($Sqlleave)) {

                                        //คำนวนเวลา
                                        $Leave_start =   $ShowSqlleave['Leave_start'];
                                        $Leave_end =   $ShowSqlleave['Leave_end'];
                                        $start_date = strtotime($Leave_start);
                                        $end_date = strtotime($Leave_end);
                                        $datesom = round(($end_date - $start_date) / (60 * 60 * 24)) + 1;
                                        //////////////


                                        $datesomSum = $datesomSum + $datesom;
                                    }
                                ?>
                                    <tr align='center'>
                                        <td><?php echo $k;  ?></td>
                                        <td><?php echo $namesql['Type_name'];  ?></td>
                                        <td><?php echo $leave_maximum;  ?></td>
                                        <td><?php echo @$datesomSum;  ?></td>
                                        <td><?php echo @$leave_maximum - $datesomSum;  ?></td>
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


                    <th>วันเริ่มต้นลา</th>
                    <th>วันสิ้นสุดลา</th>
                    <th>ประเภทการลา</th>
                    <th>เหตุผลการลา</th>
                    <th>สถานะการอนุมัติการลา</th>
                    <th>หมายเหตุ</th>





                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;

                //  @$leave = "SELECT * FROM leaves WHERE  Emp_id = '$Emp_id' and Leave_status = '2'   ORDER BY Leave_status DESC;    ";
                @$leave = "SELECT * FROM leaves WHERE Emp_id = '$Emp_id' AND Leave_status = '2' AND YEAR(Leave_date) = '$datetime' ORDER BY Leave_status DESC;";

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
                        <td><?php echo $ShowSqlleave['Leave_start'] ?></td>
                        <td><?php echo $ShowSqlleave['Leave_end'] ?></td>
                        <td><?php echo $Type_name; ?></td>
                        <td><?php echo $ShowSqlleave['Leave_reason'] ?></td>
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
                            }

                            ?></td>


                        <td>
                            <?php
                            $App_note = $ShowSqlleave['App_note'];
                            if ($App_note == null) {
                                $App_note = 'ไม่มี';
                            }
                            echo $App_note;
                            ?>

                        </td>






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
                            <input type="hidden" name="Leave_id" value="<?php echo $Leave_id;  ?>" class="form-control" id="inputEmail3">
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