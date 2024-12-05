<?php include 'head.php';


// Enable error reporting for development (show all errors)
// ini_set('display_errors', 1);  // Display errors on the screen
// error_reporting(E_ALL);        // Report all errors

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
                      <li class="breadcrumb-item">User Details</li> 
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
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <?php echo isset($_SESSION['msg'])?$_SESSION['msg']:"" ?>
                        <div class="row">

                        <div class="col-md-6"> <h4>User Details</h4></div>
                        <div class="col-md-6 mb-2 " style="text-align:right">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary">Trade Monitor Room link.</a> -->
                        </div>
                      
                       
                      <hr>
                      <?php 
                        $id = clean($_GET['id']);
                        $email = clean($_GET['email']);
                        $sql = runQuery("SELECT * FROM users WHERE role='client' AND userid='$id' AND email='$email' ORDER BY id DESC LIMIT 200");
                        if(numRows($sql)>0){
                    ?>
                          <div class="col-md-6">
                              
                   
                      <div class="table-responsives" style="min-height: 250px;">
                        <table class="table">
                          
                            

                          <?php  $row=fetchAssoc($sql);
                          $userid = $row['userid'];
                          // $wallet = $row['dwallet'];
                          ?>
                            <tr> 
                                <th>Fullname</th>
                                <td><?php echo $row['name']  ?></td>
                            </tr>
                            
                            <!--<tr>-->
                            <!--    <th>Phone number</th>-->
                            <!--    <td><?php echo $row['phone']  ?></td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                            <!--    <th>Country</th>-->
                            <!--    <td><?php echo $row['country']  ?></td>-->
                            <!--</tr>-->
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['email']  ?></td>
                            </tr>
                            <tr>
                                <th>Bitcoin Balance</th>
                                <td>$<?php  echo number_format($row['bitcoin_balance'],4)  ?></td>
                            </tr>   
                            <tr>
                                <th>Ethereum Balance</th>
                                <td>$<?php  echo number_format($row['ethereum_balance'],4)  ?></td>
                            </tr> 
                            <tr>
                                <th>BNB Balance</th>
                                <td>$<?php  echo number_format($row['binancecoin_balance'],4)  ?></td>
                            </tr> 
                            <tr>
                                <th>Tron Balance</th>
                                <td>$<?php  echo number_format($row['tron_balance'],4)  ?></td>
                            </tr> 
                            <tr>
                                <th>Usdt(trc20) Balance</th>
                                <td>$<?php  echo number_format($row['tether_balance'],4)  ?></td>
                            </tr> 
                            <tr>
                                <th>Usdt(erc20) Balance</th>
                                <td>$<?php  echo number_format($row['usd_coin_balance'],4)  ?></td>
                            </tr> 
                            <tr>
                                <th>DogeCoin Balance</th>
                                <td>$<?php  echo number_format($row['doge_balance'],4)  ?></td>
                            </tr> 
                            <tr>
                                <th>Status</th>
                                <td><?php echo ucfirst($row['status'])  ?></td>
                            </tr>    
                            <tr>
                                <th>Reg Date</th>
                                <td><?php echo $row['created_at']  ?></td>
                            </tr>    
                                
 
                        </table>
                      </div>

 

                      </div>
                         
                        <div class="col-md-6 mt-3 " style="text-align:rightd ;"> 

                          <div class="mb-4 ">
                            <?php 
                              $path =$row['profile_picture'];
                              $img = !empty($path)?"files/$path.jpg":"img/user.jpg";
                              ?>
                              <!-- <center>
                              <img src="../<?php //echo $img ?>" alt="<?php //echo $img ?>" style="border-radius: 50%">
                              </center> -->
                          </div>

                            <div class="col-md-12">
                            <?php if($row['status']=='unverified'){ ?>
                            <a class="btn btn-info" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['email']  ?>" id="verifyAccount" href="javascript:void(0)">Verify Account</a>
                            <?php }else{ ?>
                              <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-dark mt-2">Topup Wallet</a>
                                <!-- <?php if($row['status'] == 'verified'){ ?>-->
                                <!--<a class="btn btn-danger mt-2" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['email']  ?>" data-status="banned" id="banUser" href="javascript:void(0)">Ban User</a>-->
                                <!--<?php }else{ ?>-->
                                <!--<a class="btn btn-danger mt-2" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['email']  ?>" data-status="active" id="banUser" href="javascript:void(0)">Unban User</a>-->
                                <!--<?php } } ?> -->

                                <a class="btn btn-primary mt-2" href="user-history?id=<?php echo $row['userid']  ?>&method=deposit">Deposit History</a>
                                <a class="btn btn-info mt-2" href="user-history?id=<?php echo $row['userid']  ?>&method=withdraw">Withdrawal History</a>

                            </div>
<div class="col-md-12 row mt-3" style="border: 1px solid grey; padding:20px 0;">
    <?php if (!empty($row['kyc_document_1']) || !empty($row['kyc_document_2'])) { ?>
        <div class="col-md-6 mb-3">
            <?php if (!empty($row['kyc_document_1'])) { ?>
    <img src="../kyc-documents/<?php echo htmlspecialchars(basename($row['kyc_document_1'])); ?>" alt="KYC Document 1" width="100%">
<?php } ?>

        </div>
        <div class="col-md-6 mb-3">
            <?php if (!empty($row['kyc_document_2'])) { ?>
                <img src=".././storage/<?php echo htmlspecialchars($row['kyc_document_2']); ?>" alt="KYC Document 2" width="100%">
            <?php } ?>
        </div>
        <div class="col-md-12 text-center">
            <a class="btn btn-success mt-2" href="javascript:void(0)" data-id="<?php echo $row['userid']; ?>" data-email="<?php echo $row['email']; ?>" id="verifyKyc">Approve KYC</a>
            <a class="btn btn-danger mt-2" href="javascript:void(0)" data-id="<?php echo $row['userid']; ?>" data-email="<?php echo $row['email']; ?>" id="declineKyc">Decline KYC</a>
        </div>
    <?php } else { ?>
        <div class="col-md-12">
            <small class="text-danger">No KYC documents uploaded yet.</small>
        </div>
    <?php } ?>
</div>

                        </div>
                      
                        <div class="col-md-12 ">
                          <hr>
                            <h2>User Transaction </h2>
                          <hr>

                          <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Date</th>
                                    <th>Coin</th>
                                    <th>Wallet Addres</th>
                                    <th>Amount</th>
                                    <th>Status</th> 
                                </tr>
                                <?php 
                                $userid =  $row['userid'];
                                $sql = runQuery("SELECT * FROM transactions WHERE userid='$userid' ORDER BY id DESC LIMIT 200");
                                if(numRows($sql)>0){
                                    while($row=fetchAssoc($sql)){
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
                                
                                <tr>
                                    <td><?php echo ($row['date']) ?></td> 
                                    <td><?php echo ucfirst($row['crypto_type']) ?></td>
                                    <td><?php echo ($row['recipient_address']) ?></td>
                                    <td><?php echo($row['amount']) ?> <?php echo $coinSymbol ?></td> 
                                    <td><?php echo ucfirst($row['status']) ?></td> 
                                </tr>
                                <?php  }}else{?>
                                    <tr>
                                        <td colspan="5" class="text-danger">No result found</td>
                                    </tr>
                                
                                <?php } ?>
                                  
                            </table>
                          </div>
                        </div>

                      </div>

                      
                      </div>
                      
                      <?php } ?>
                      <!-- <hr> -->




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


        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Topup Wallet</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="fund.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label for="type">Choose</label>
            <select name="type" id="type" class="form-control">
                <option value="add">+ Add to wallet</option>
                <option value="minu">- Subtract from wallet</option>
            </select>
            <input type="hidden" name="userid" value="<?php echo htmlspecialchars($userid); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"> <!-- Corrected email variable -->
        </div>
        <div class="form-group">
            <?php 
                $sql = runQuery("SELECT * FROM daddress ORDER BY id DESC");
                if (numRows($sql) > 0) {
                    echo '<label for="coin">Choose Coin</label>';
                    echo '<select name="crypto_type" id="coin" class="form-control">'; // Updated name to crypto_type
                    while ($row = fetchAssoc($sql)) {
                        $addressName = htmlspecialchars($row['dname']);
                        echo "<option value='$addressName'>$addressName</option>";
                    }
                    echo '</select>';
                }
            ?>
        </div>
        <div class="form-group">
            <label for="address">Wallet Address</label>
            <input type="text" name="recipient_address" id="address" placeholder="0x7iu8dad4n33ri4t6ed8lwef0nk8" required class="form-control"> <!-- Updated name -->
        </div>
        <div class="form-group">
            <label for="amount">Amount in crypto</label>
            <input type="number" name="crypto_amount" id="amount" placeholder="e.g. 1BTC" required step="any" class="form-control"> <!-- Updated name -->
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-secondary" name="saveTop" type="submit">Submit</button>
    </div>
</form>


            </div>
        </div>
        </div>

  </body>

</html>