<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมลการลงเวลา</h5>
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
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>วันที่เข้าทำงาน</th>
                                    <th>เวลาเข้า</th>
                                    <th>รัศมีเข้า</th>
                                    <th>สถานะเข้างาน</th>
                                    <th>เวลาออก</th>
                                    <th>รัศมีออก</th>
                                    <th>สถานะออกงาน</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                while ($ShowSqltimetable = mysqli_fetch_array($Sqltimetable)) {
                                    $i++;
                                    $Emp_id = $ShowSqltimetable['Emp_id'];
                                    @$sql = "SELECT * FROM employee WHERE  Emp_id =  '$Emp_id' ";
                                    @$sqlshow = mysqli_query($con, $sql) or die("Error in query: $sql ");
                                    while ($namesql = mysqli_fetch_array($sqlshow)) {
                                        @$Emp_name = $namesql['Emp_name'];
                                    }
                                ?>

                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $ShowSqltimetable['Emp_id'] ?></td>
                                        <td><?php echo $Emp_name; ?></td>
                                        <td><?php echo $ShowSqltimetable['Ttb_date'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Ttb_timein'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Ttb_radiusin'] ?></td>

                                        <td align='center'>

                                            <?php $Ttb_statusin = $ShowSqltimetable['Ttb_statusin'];
                                            if ($Ttb_statusin == 1) {
                                                echo '<div class="alert alert-primary" role="alert">
                                                เข้างานก่อน
                                              </div>';
                                            } else if ($Ttb_statusin == 2) {
                                                echo '<div class="alert alert-success" role="alert">
                                                เข้างานปกติ
                                              </div>';
                                            } else if ($Ttb_statusin == 3) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                เข้างานสาย
                                              </div>';
                                            }


                                            ?>


                                        </td>


                                        <td><?php echo $ShowSqltimetable['Ttb_timeinout'] ?></td>
                                        <td><?php echo $ShowSqltimetable['Ttb_radiusout'] ?></td>

                                        <td align='center'><?php
                                            $Ttb_statusout =  $ShowSqltimetable['Ttb_statusout'];

                                            if ($Ttb_statusout == 1) {
                                                echo '<div class="alert alert-success" role="alert">
                                                ออกงานปกติ
                                              </div>';
                                            } else if ($Ttb_statusout == 2) {
                                                echo '<div class="alert alert-danger" role="alert">
                                            ออกงานก่อน
                                          </div>';
                                            } else if ($Ttb_statusout == 3) {
                                                echo '<div class="alert alert-primary" role="alert">
                                            ออกงานช้า
                                          </div>';
                                            }


                                            ?></td>
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