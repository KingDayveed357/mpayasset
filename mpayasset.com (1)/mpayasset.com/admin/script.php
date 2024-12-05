 <!-- latest jquery-->
 <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/config.js">   </script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
     
    <script src="assets/js/prism/prism.min.js"></script>
    <script src="assets/js/clipboard/clipboard.min.js"></script>
    <script src="assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="assets/js/counter/jquery.counterup.min.js"></script>
    <script src="assets/js/counter/counter-custom.js"></script>
    <script src="assets/js/custom-card/custom-card.js"></script> 

    
    <script src="assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.custom.js"></script>


    <!-- <script src="assets/js/dashboard/default.js"></script> -->
    <!-- <script src="assets/js/notify/index.js"></script> -->
    <!-- <script src="assets/js/greeting.js"></script>   -->
    <!-- Plugins JS Ends-->
    <!-- Theme js--> 
    <script src="assets/js/script.js"></script>
    <script src="assets/js/sweet-alert/sweetalert.min.js"></script>
    <!-- <script src="assets/js/notify/index.js"></script> -->
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/notify-script.js"></script>
    <script src="notify.js"></script>
    <script src="app.js"></script>  
    <!-- login js-->
<?php if(isset($_SESSION['msg'])){ unset($_SESSION['msg']);} ?>

<script>

<?php if(isset($_SESSION['msgs'])){?>
        notifyMe('Success!',"Updated successfully", "success")
    <?php unset($_SESSION['msgs']); }

     if(isset($_SESSION['msgx'])){?>
        notifyMe('Fail!',<?php echo $_SESSION['msgs'] ?>, "success")
    <?php unset($_SESSION['msgx']); } ?>

</script>