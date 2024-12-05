<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
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
        <div class="page-body porject-dash" style="margin-top: 75px;">
           

          <div class="container-fluid">
            <div class="row ">
            <?php 

              $res = $resx = $inve = $ref = '0.00';
              $depo = runQuery("SELECT SUM(crypto_amount) as total FROM transactions WHERE transaction_type='credit' ");
              if(numRows($depo)>0){
                  $depox = fetchAssoc($depo);
                  $res = $depox['total'];
              }


              $hour = gmdate('H', strtotime("+1 hour"));
              $dayTerm = ($hour > 17) ? "Good Evening" : (($hour > 12) ? "Good afternoon" : "Good morning");
                ?>
            <div class="card text-dark">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                      <h5> <?php echo $dayTerm.' <i class="text-info">'.ucfirst($user['name']) ?></i> </h5>
                      <p>
                        <b>Fullname:</b> <?php echo $user['name'] ?> <br>
                        <b>Email:</b> <?php echo $user['email'] ?> <br> <br>
                      </p> 
                    </div>
                   
                </div>
                <hr>
 

                <div class="container-fluidn ">
                  <div class="row">
                  <div class="col-sm-6 col-xl-4 col-lg-6">
                      <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                            <div class="media-body"><span class="m-0">Total Deposit</span>
                              <h4 class="mb-0 ">$<?php echo ($res != 0)? number_format($res) :"0.00" ?></h4><i class="icon-bg" data-feather="shopping-bag"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-xl-4 col-lg-6">
                      <div class="card o-hidden" onclick="window.location.href='users'">
                        <div class="bg-warning b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="users"></i></div>
                            <div class="media-body"><span class="m-0">Manage Users</span>
                              <h4 class="mb-0 "><?php echo mysqli_num_rows(runQuery("SELECT * FROM users where role='client'")) ?></h4><i class="icon-bg" data-feather="users"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 col-lg-6">
                      <div class="card o-hidden" onclick="window.location.href='with-pending'">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="percent"></i></div>
                            <div class="media-body"><span class="m-0">Manage Crypto Withdrawals</span>
                              <h4 class="mb-0 "><?php echo mysqli_num_rows(runQuery("SELECT * FROM transactions WHERE transaction_type='withdraw' AND status='pending'")) ?></h4><i class="icon-bg" data-feather="percent"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 col-lg-6">
                      <div class="card o-hidden" onclick="window.location.href='address'">
                        <div class="bg-success b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="gift"></i></div>
                            <div class="media-body"><span class="m-0">Manage Wallet Address</span>
                              <h4 class="mb-0 "></h4><i class="icon-bg" data-feather="gift"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-xl-4 col-lg-6">
                      <div class="card o-hidden" onclick="window.location.href='change-password'">
                        <div class="bg-danger b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="lock"></i></div>
                            <div class="media-body"><span class="m-0">Change Password</span>
                              <h4 class="mb-0 "></h4><i class="icon-bg" data-feather="lock"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-6 col-xl-4 col-lg-6">
                      <div class="card o-hidden" onclick="window.location.href='users'">
                        <div class="bg-danger b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="lock"></i></div>
                            <div class="media-body"><span class="m-0">Manage Users Kyc</span>
                              <h4 class="mb-0 "></h4><i class="icon-bg" data-feather="lock"></i>
                            </div>
                          </div>
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
 
</html>