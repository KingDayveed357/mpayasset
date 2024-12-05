<?php include 'head.php'; 
$ref = bin2hex(random_bytes(11)); 
?>

<body class="">
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <?php include 'header.php'; ?>

        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <?php include 'aside.php'; ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body project-dash">
                <div class="container-fluid">
                    <!-- Page Header Start-->
                    <div class="page-header dash-breadcrumb">
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <div class="breadcrumb-sec">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">Dashboard</li>
                                        <li class="breadcrumb-item">All Users</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Header Ends-->
                </div>

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Row for Manage Users header and search -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Manage Users</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="search" method="post">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <input type="text" name="search" placeholder="Search by Username, UserId, Email" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button name="ubtn" class="btn btn-primary">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <hr>
                                            <?php 
                                            if(isset($_GET['search'])){
                                                $search = clean($_GET['search']);
                                                $sql = runQuery("SELECT * FROM users WHERE role='client' AND ( userid LIKE '%$search%'  OR  email LIKE '%$search%') ORDER BY id DESC LIMIT 200");
                                            } else {
                                                $sql = runQuery("SELECT * FROM users WHERE role='client' ORDER BY id DESC LIMIT 200");
                                            }

                                            if(numRows($sql) > 0) {
                                            ?>
                                            <div class="table-responsive" style="min-height: 250px;">
                                                <table class="table">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>User ID</th>
                                                        <th>Fullname</th>
                                                        <th>Status</th>
                                                        <th>---</th>
                                                    </tr>
                                                    <?php while($row = fetchAssoc($sql)) { ?>
                                                    <tr>
                                                        <td><?php echo date("d M, Y", strtotime($row['date'])); ?></td>  
                                                        <td><?php echo $row['userid']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo ucfirst($row['status']); ?></td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm" href="user-details?id=<?php echo ($row['userid']).'&email='.$row['email']; ?>">
                                                                <i class="fa fa-eye"></i> Details
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                            <?php } else { ?>
                                                <p>No users found.</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>

            <!-- footer start-->
            <?php include 'footer.php'; ?>
            <!-- footer end-->
        </div>
    </div>

    <?php include 'script.php'; ?>
</body>
</html>
