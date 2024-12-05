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
                      <h4>Manage Wallet Address</h4> </div>
                          <div class="col-md-3">
                            <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-primary">Add New Address</a>
                          </div>
                      </div>

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM daddress  ORDER BY id DESC");
                      if(numRows($sql)>0){
                          $num=1
                    ?>
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          <tr>
                            <th>S/N</th>
                            <th>Currency</th>
                            <th>Address</th> 
                            <th>Qrcode</th> 
                            <th>---</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                                <!-- <td><?php //echo date("d M, Y", strtotime($row['ddate'])) ?></td>   -->
                                <td><?php echo $num++  ?></td>
                                <td><?php echo $row['dname']  ?></td>
                                <td><?php echo ($row['daddress'])  ?></td> 
                                <td>
                                  <img src="../qrcode/<?php echo ($row['dqrcode'])  ?>" alt=""  width="100" height="100">
                                </td>
                                <td>
                                <a class="btn btn-info btn-sm"  data-bs-toggle="modal"  data-bs-target="#exampleModal<?php echo $row['id']  ?>" href="javascript:void(0)"> <i class="fa fa-eye"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" id="deleteAdd" data-id="<?php echo $row['id']  ?>"  href="javascript:void(0)"> <i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            
                            <div class="modal fade" id="exampleModal<?php echo $row['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="controller" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>"  >
                                         
                                        
                                        <div class="form-group">
                                            <label for="">Cypto Name</label>
                                            <input type="text" name="name" value="<?php echo $row['dname']  ?>" placeholder="e.g Bitcoin" required id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" name="address" value="<?php echo $row['daddress']  ?>" placeholder="e.g 0xd7d9mf8ewl388fbn84riugh83bi7" required id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">QrCode Scanner IMG</label>
                                            <input type="file" name="dqrcode" value="<?php echo $row['dqrcode']  ?>" placeholder="e.g 0xd7d9mf8ewl388fbn84riugh83bi7" required id="" class="form-control">
                                        </div>
                                        <img src="../qrcode/<?php echo $row['dqrcode']?>" alt="qrcode" width="100" height="100">

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-secondary" name="saveUpAdd" type="submit">Update Currency </button>
                                    </form>
                                    </div>
                                </div>
                                </div>
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

    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Currency</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Coin Name</label>
                    <input type="text" name="name" placeholder="e.g Bitcoin" required id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Wallet Address</label>
                    <input type="text" name="address" placeholder="e.g 0xd7d9mf8ewl388fbn84riugh83bi7" required id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">QrCode Scanner IMG</label>
                    <input type="file" name="dqrcode"  required id="" class="form-control">
                </div>
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="saveAdd" type="submit">Add Crypto</button>
            </form>
            </div>
        </div>
        </div>

        
  </body>
 
</html>