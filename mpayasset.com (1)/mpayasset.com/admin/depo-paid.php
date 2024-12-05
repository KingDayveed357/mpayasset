<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>

  <body  class=""  >
   
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
                      <li class="breadcrumb-item">Manage Confirm Payment</li> 
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
                      <h4>Manage Confirm Payment</h4> </div>
                          
                      </div>

                      <hr>
                   
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          <tr>
                            <th>S/N</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>---</th>
                          </tr>
                          <?php 
                    
                                $sql = runQuery("SELECT * FROM transactions dt JOIN users dr on dt.userid = dr.userid WHERE dt.transaction_type='deposit' AND dt.status='completed' ORDER BY dt.id DESC");
                                if(numRows($sql)>0){
                                    $num=1;
                            while($row=fetchAssoc($sql)){?>
                            <tr> 
                                <td><?php echo $num++  ?></td>
                                <td><?php echo $row['name']  ?></td>
                                <td><?php echo $row['email']  ?></td>
                                <td>$<?php echo number_format($row['amount'])  ?></td>
                                <td>
                                <a class="btn btn-danger btn-sm" href="depo?id=<?php echo ($row['transaction_reference']) ?>"> <i class="fa fa-eye"></i> Details</a>
                                </td>
                            </tr>

                            
                            
                            <?php }?>



                      <?php }else{ ?>
                        <tr>
                            <td colspan="5" class="text-danger" style="color: red">No result found</td>
                        </tr>
                    <?php }  ?>




                    </table>
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
 
</html>