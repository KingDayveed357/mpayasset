<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
?>

<body class="">
  <!-- page-wrapper Start -->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <?php include 'header.php' ?>

    <!-- Page Body Start -->
    <div class="page-body-wrapper sidebar-icon">
      <!-- Page Sidebar Start -->
      <?php include 'aside.php' ?>

      <!-- Page Sidebar Ends -->
      <div class="page-body porject-dash">
        <div class="container-fluid">
          <div class="page-header dash-breadcrumb">
            <div class="row">
              <div class="col-6"></div>
              <div class="col-6">
                <div class="breadcrumb-sec">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item"><?php echo ucfirst($_GET['method']) ?> History</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <h4><?php echo ucfirst($_GET['method']) ?> History</h4>
                        </div>

                        <hr>
                        <?php 
                          $id = clean($_GET['id']);
                          $method = clean($_GET['method']);   
                        ?>
                        
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Method</th>
                              <th>Address</th>
                              <th>Status</th>
                            </tr>
                            <?php 
                              // Fetch transactions based on method (deposit or withdraw)
                              $sql = runQuery("SELECT * FROM transactions WHERE userid='$id' AND method='$method' ORDER BY id DESC LIMIT 100");

                              if(numRows($sql) > 0) {
                                while($row = fetchAssoc($sql)) {
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
                                <td><?php echo $row['date'] ?></td>
                                <td>$<?php echo number_format($row['amount']) ?> <?php echo $coinSymbol ?></td>
                                <td><?php echo $row['method'] ?></td>
                                <td><?php echo $row['recipient_address'] ?></td>
                                <td><?php echo ucfirst($row['status']) ?></td>
                              </tr>
                            <?php 
                                }
                              } else { 
                            ?>
                              <tr>
                                <td colspan="5" class="text-danger">No transaction found</td>
                              </tr>
                            <?php 
                              } 
                            ?>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends -->
      </div>
      <!-- footer start -->
      <?php include 'footer.php' ?>
    </div>
  </div>
  <?php include 'script.php' ?>
</body>
</html>
