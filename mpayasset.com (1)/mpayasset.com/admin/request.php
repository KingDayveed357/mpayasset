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
                      <li class="breadcrumb-item">Request Details</li> 
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
                      
                      <h4>KYC Request Details</h4> 

                      <hr>
                     
                    <?php 

                    $id = clean($_GET['id']);
                    $email = clean($_GET['email']);

                    ?>
                    <?php
                    
                    $sql = runQuery("SELECT * FROM dkyc WHERE userid='$id' and demail='$email' ");
                    if(numRows($sql)>0){
                      $row=fetchAssoc($sql);
                      $status = $row['dstatus'];
                  ?>
                     <div class="">
                          <p>
                              <b>Fullname: </b> <?php echo userInfo($id, $email,'dfname') ?> <br>
                              <b>Email: </b> <?php echo userInfo($id, $email,'demail') ?> <br>
                              <b>Phone: </b> <?php echo userInfo($id, $email,'dphone') ?> <br>
                              <b>Status: </b> <?php echo $status ?>
                          </p>
                      </div>
                      <hr>
                      
                      <div class="table-responsive" >
                        <table class="table">
                            <thead>
                                <th>Question</th>
                                <th>Answer</th>
                            </thead> 
                            <tr> 
                                <td>Principal Occupation:</td> 
                                <td><?php echo ucfirst($row['doccupation'])  ?></td>
                            </tr>
                            <tr> 
                                <td>What is your total estimated annual income?</td> 
                                <td><?php echo ucfirst($row['dannual'])  ?></td>
                            </tr>
                            <tr> 
                                <td>The total estimated Monthly income?</td> 
                                <td><?php echo ucfirst($row['dmonthly'])  ?></td>
                            </tr>
                            <tr> 
                                <td>Source of Trading funds</td> 
                                <td><?php echo ucfirst($row['dfunds'])  ?></td>
                            </tr>
                            <tr> 
                                <td>What is your current employment status?</td> 
                                <td><?php echo ucfirst($row['demployment'])  ?></td>
                            </tr>
                            <tr> 
                                <td>Do you have any trading experience?</td> 
                                <td><?php echo ucfirst($row['dexperience']) ." (".ucfirst($row['dspecify']).")"  ?></td>
                            </tr>
                            <tr> 
                                <td>Which of the trading and Investment objective defined your objective?</td> 
                                <td><?php echo ucfirst($row['dgoal'])  ?></td>
                            </tr>
                            <tr> 
                                <td>Have you ever participated in trading education or have experience/qualifications which would assist your understanding of our services?</td> 
                                <td><?php echo ucfirst($row['dqty'])  ?></td>
                            </tr>
                            <tr> 
                                <td>When trading or investing with Leverage which one of the following applies?</td> 
                                <td><?php echo ucfirst($row['dapp'])  ?></td>
                            </tr>
                            <tr> 
                                <td>If you are trading or investing with 50:1 leverage and you have $1,000 in your account, what is the maximum-size position you can open? </td> 
                                <td><?php echo ucfirst($row['dleverage'])  ?></td>
                            </tr>
                            <tr> 
                                <td>My open position may be closed automatically when ? </td> 
                                <td><?php echo ucfirst($row['dposition'])  ?></td>
                            </tr>
                            <tr> 
                                <td> Which of these general risk warnings is True? </td> 
                                <td><?php echo ucfirst($row['drisk'])  ?></td>
                            </tr>
                             



                        </table>
                      </div>
                      <?php if($status=='pending'){  ?>
                      <div class="mt-4" style="text-align:right">
                          <a href="javascript:void(0)" id="approveReq" data-id="<?php echo ($row['id'])  ?>" data-status="approve" data-uid="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>"  class="btn btn-primary">Approve Request</a>

                          <a href="javascript:void(0)" id="approveReq" data-id="<?php echo ($row['id'])  ?>" data-status="reject" data-uid="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>"  class="btn btn-danger">Reject Request</a>
                      </div>
                      <?php } } ?>




                      
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