<?php include 'head.php' ?>
  <body class="" >
  
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <?php include 'header.php' ?>
      
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
    <?php include 'aside.php' ?>
        
        <!-- Page Sidebar Ends-->
        <div class="page-body porject-dash">
          
          <!-- Container-fluid starts-->
          <div class="container-fluid ">
            <div class="row ">
                            <div class="col-md-12">
              <div class="card ">
                
                <div class="card-body row">
                    <div class="col-md-7 m-auto">
                    
    <form class="theme-form login-forms" method="post" action="change-password-process.php">
  <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?>
  <h4 class="mb-3">Create Your Password</h4>
  <div class="form-group">
    <label>Current Password</label>
    <div class="input-group">
      <span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
      <input class="form-control" type="password" name="old" required="" placeholder="*********">
    </div>
  </div>

  <div class="form-group">
    <label>New Password</label>
    <div class="input-group">
      <span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
      <input class="form-control" type="number" name="pin" required="" placeholder="Enter 4-digit PIN" minlength="4" maxlength="4">
    </div>
  </div>

  <div class="form-group">
    <label>Confirm Password</label>
    <div class="input-group">
      <span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
      <input class="form-control" type="number" name="cpin" required="" placeholder="Re-enter 4-digit PIN" minlength="4" maxlength="4">
    </div>
  </div>

  <div class="form-group">
    <button name="change" class="btn border-orange btn-primary btn-block w-100 bg-orange" type="submit">Submit</button>
  </div>
</form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- tap on top starts-->
        <div class="tap-top"><i class="icon-control-eject"></i></div>
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
<?php if(isset($_SESSION['msg'])){ unset($_SESSION['msg']);} ?>
        
      </div>
    </div>
    <script>
  document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('input', function (e) {
      this.value = this.value.replace(/\D/g, '').slice(0, 4); // Restrict to digits and maximum length of 4
    });
  });
</script>

   
    <?php include 'script.php' ?>
  </body>
 
</html>