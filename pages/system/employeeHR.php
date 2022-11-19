<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">ข้อมูลหัวหน้าฝ่าย(HR)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th class="ml-5">รหัสหัวหน้าฝ่าย (HR)</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>เบอร์โทร</th>
                                    <th>ที่อยู่</th>
                                    <th>แผนก</th>
                                    <th>ตำแหน่ง</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($ShowmployeetHR = mysqli_fetch_array($SqlemployeeHR)) {

                                ?>
                                    <tr>
                                        <td> <?php echo $ShowmployeetHR['Emp_id'] ?> </td>
                                        <td><?php echo $ShowmployeetHR['Emp_name'] ?></td>
                                        <td><?php echo $ShowmployeetHR['Emp_tel'] ?></td>
                                        <td><?php echo $ShowmployeetHR['Emp_address'] ?></td>
                                        <td><?php
                                            $Dep_id = $ShowmployeetHR['Dep_id'];
                                            @$SqlsDep = "SELECT * FROM department WHERE  Dep_id =  '$Dep_id' ";
                                            @$SqlsDepData = mysqli_query($con, $SqlsDep) or die("Error in query: $SqlsDep ");
                                            while ($ShowSqlsDepData = mysqli_fetch_array($SqlsDepData)) {
                                                @$Dep_name = $ShowSqlsDepData['Dep_name'];
                                            }
                                            echo $Dep_name;
                                            ?></td>

                                        <td><?php
                                            $Pos_id = $ShowmployeetHR['Pos_id'];
                                            @$ShowPosition = "SELECT * FROM position WHERE  Pos_id =  '$Pos_id' ";
                                            @$SQLShowPosition = mysqli_query($con, $ShowPosition) or die("Error in query: $ShowPosition ");
                                            while ($Showposition = mysqli_fetch_array($SQLShowPosition)) {
                                                @$Pos_name = $Showposition['Pos_name'];
                                            }
                                            echo $Pos_name;


                                            ?></td>


                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    แก้ไข
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    ลบ
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                </button>
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