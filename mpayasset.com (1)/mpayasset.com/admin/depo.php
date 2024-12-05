<?php include 'head.php';
$ref = bin2hex(random_bytes(11));

$id = clean($_GET['id']);

$sql = runQuery("SELECT * FROM users dr JOIN transactions dt on dt.userid = dr.userid WHERE dt.transaction_reference='$id' ORDER BY dt.id DESC");
if(numRows($sql)>0){ 

    $row=fetchAssoc($sql) ;
 ?>

  <body  class="" >
   
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
                      <li class="breadcrumb-item">Manage Depositor Details</li> 
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
                        <div class="col-md-12">
                            <h4>Manage Depositor Details</h4> 
                            <hr>
                        </div>
                          
                      <div class="col-md-6">

                     
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          
 
                            <tr>  
                                <th>Fullname</th>
                                <td><?php echo $row['name']  ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['email']  ?></td>
                            </tr>
                            <tr>
                                <th>Amount</th> 
                                <td>$<?php echo number_format($row['amount'])  ?></td>
                            </tr>
                            
                            <tr>
                                <th>Address Paid to</th> 
                                <td><?php echo ($row['recipient_address'])  ?></td>
                            </tr>
                            <tr>
                                <th>Payment Status</th> 
                                <td><?php echo ucfirst($row['status'])  ?></td>
                            </tr>
                            <tr>
                                <th>Date</th> 
                                <td><?php echo ($row['date'])  ?></td>
                            </tr>
                            
                            </tr>

                             



                        </table>
                      </div>
                      </div>

                      <div class="col-md-6">
                          <b>Proof of payment</b> <br>
                          <img src="../files/<?php echo ($row['dimg'])  ?>.jpg" alt="">
                          <br>
                          <?php if($row['dstatus']=="pending"){ ?>
                          <hr>
                          <a class="btn btn-info btn-sm" 
                          data-id="<?php echo ($row['tid']) ?>"
                          data-user="<?php echo ($row['userid']) ?>"
                          data-email="<?php echo ($row['demail']) ?>"
                          data-amount="<?php echo ($row['damount']) ?>"
                          id="confirmPayment"
                           href="javascript:void(0)"> Confirm Payment</a>

                          <a class="btn btn-danger btn-sm"
                          data-id="<?php echo ($row['tid']) ?>"
                          data-user="<?php echo ($row['userid']) ?>"
                          id="canPayment" href="javascript:void(0)"> Cancel </a>
                          <?php } ?>
                          <hr>
                            <h4 class="mt-3">Update Deposit</h4>
                          <form action="controller" method="post">
                            <div class="form-group">
                              <input type="text" name="amount" value="<?php echo $row['damount'] ?>" class="form-control">
                            </div>
                            <input type="hidden" name="tid" value="<?php echo $row['tid'] ?>">
                            <button type="submit" name="updateDepo" class="btn btn-primary w-100">Update</button>
                          </form>

                          
                      </div>




                      </div>

                     




                      
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
  <?php } ?>
</html> 