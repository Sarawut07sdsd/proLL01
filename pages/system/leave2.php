<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลการลางานที่อนุมัติแล้ว</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr align='center'>
                                    <th class="ml-5">ลำดับ</th>
                                    <th>รหัสการลา</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>ประเภทการลา</th>
                                    <th>วันที่ยื่นใบลา</th>
                                    <th>วันเริ่มต้นลา</th>
                                    <th>วันสิ้นสุดลา</th>
                                    <th>วันที่การอนุมัติ</th>
                                    <th>เหตุผลการลา</th>
                                    <th>หมายเหตุการอนุมัต</th>
                                    <th>สถานะการอนุมัติการลา</th>




                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                @$leave = "SELECT * FROM `leave` WHERE  Leave_status = 2 ORDER BY Leave_date DESC;    ";
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
                                        <td><?php echo $ShowSqlleave['Leave_id'] ?></td>
                                        <td><?php echo $Emp_name; ?></td>
                                        <td><?php echo $Type_name; ?></td>
                                        <td><?php echo $ShowSqlleave['Leave_date'] ?></td>
                                        <td><?php echo $ShowSqlleave['Leave_start'] ?></td>
                                        <td><?php echo $ShowSqlleave['Leave_end'] ?></td>
                                        <td><?php echo $ShowSqlleave['App_date'] ?></td>
                                        <td><?php echo $ShowSqlleave['Leave_reason'] ?></td>
                                        <td><?php echo $ShowSqlleave['App_note'] ?></td>

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

                                        <td>

                                       <!--  <td>
                                            <a type="button" href="index.php?p=showleave&Emp_name=<?php echo $Emp_name; ?> 
                                            &Pos_name=<?php echo $Emp_name; ?>
                                            &Type_name=<?php echo $Type_name; ?>
                                            &Type_id=<?php echo $Type_id; ?>
                                            &Emp_id=<?php echo $Emp_id; ?>
                                            
                                            " class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </a>
                                        </td> -->
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