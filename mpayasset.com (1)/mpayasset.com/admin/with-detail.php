<?php include 'head.php';
$ref = bin2hex(random_bytes(11));

$id = clean($_GET['id']);

$sql = runQuery("SELECT * FROM users dr JOIN transactions dt on dt.userid = dr.userid WHERE dt.transaction_reference='$id' ORDER BY dt.id DESC");
if(numRows($sql)>0){ 

    $row=fetchAssoc($sql) ;
  $coin =  $row['crypto_type']  ;
          switch ($coin) {
            case 'tether':
                $coinSymbol = 'USDT TRC(20)';
                break;
            case 'bitcoin':
                $coinSymbol = 'BTC';
                break;
            case 'ethereum':
                $coinSymbol = 'ETH';
                break;
            case 'tron':
                $coinSymbol = 'TRON';
                break;
            case 'doge':
                $coinSymbol = 'DOGE';
                break;
            case 'binancecoin':
                $coinSymbol = 'BNB';
                break;
            case 'usd-coin':
                $coinSymbol = 'USDT ERC(20)';
                break;
            default:
                $coinSymbol = 'Unknown';
        }
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
                      <li class="breadcrumb-item">Manage Withdrawal Details</li> 
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
                            <h4>Manage Withdrawal Details</h4> 
                            <hr>
                        </div>
                          
                      <div class="col-md-8">

                     
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
                                <th>Amount in crypto</th> 
                                <td><?php echo number_format($row['amount'])  ?> <?php echo $coinSymbol ?></td>
                            </tr>
                            
                            <tr>
                                <th>Transaction Type</th> 
                                <td><?php echo ($row['transaction_type'])  ?></td>
                            </tr>
                            <tr>
                                <th>Address to Paid to</th> 
                                <td><?php echo ($row['recipient_address'])  ?></td>
                            </tr>
                            <tr>
                                <th>Payment Status</th> 
                                <td><?php echo ucfirst($row['status'])  ?></td>
                            </tr>
                            <tr>
                                <th>Date</th> 
                                <td><?php echo ($row['created_at'])  ?></td>
                            </tr>
                            
                            </tr>

                             



                        </table>
                      </div>
                      </div>

                      <div class="col-md-4">
                          
                          <?php if($row['status']=="pending"){ ?>
                          <hr>
                          <a class="btn btn-info btn-sm" 
                          data-id="<?php echo ($row['transaction_reference']) ?>"
                          data-user="<?php echo ($row['userid']) ?>"
                          data-email="<?php echo ($row['email']) ?>"
                          data-amount="<?php echo ($row['amount']) ?>"
                          data-type="<?php echo ($row['transaction_type']) ?>"
                          data-coin = "<?php echo ($row['crypto_type']) ?>"
                          id="markPaid"
                           href="javascript:void(0)"> Mark as Paid</a>

                          <a class="btn btn-danger btn-sm"
                          data-id="<?php echo ($row['transaction_reference']) ?>"
                          data-user="<?php echo ($row['userid']) ?>"
                          data-email="<?php echo ($row['email']) ?>"
                          data-amount="<?php echo ($row['amount']) ?>"
                          data-type="<?php echo ($row['transaction_type']) ?>"
                          data-coin = "<?php echo ($row['crypto_type']) ?>"
                          id="canWith" href="javascript:void(0)"> Cancel </a>

                          <a class="btn btn-success btn-sm"
                          data-id="<?php echo ($row['transaction_reference']) ?>"
                          data-user="<?php echo ($row['userid']) ?>"
                          data-email="<?php echo ($row['email']) ?>"
                          data-amount="<?php echo ($row['amount']) ?>"
                          data-type="<?php echo ($row['transaction_type']) ?>"
                          data-coin = "<?php echo ($row['crypto_type']) ?>"
                          id="revWith" href="javascript:void(0)"> Reverse </a>
                          <?php } ?>
                          
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