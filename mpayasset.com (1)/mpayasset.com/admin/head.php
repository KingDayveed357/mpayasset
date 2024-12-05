<?php 

include '../clean.php';

include '../siteSettings.php';

if(isset($_SESSION['admin'])){
  $email = $_SESSION['email'];
  $userid = $_SESSION['userid'];
  $user = runQuery("SELECT * FROM users WHERE userid='$userid' AND email='$email'")->fetch_assoc();
}else{
  header("Location:../signin");
}

?>
<!DOCTYPE html>
<html lang="en">
   
<head>
<?php if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){ ?>
      <base href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] .'/bitbyte/admin/'; ?>">
      <base href="bitbyte/admin/">
    <?php } else {?>
      <base href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] .'/admin/'; ?>">
      <base href="admin/">
    <?php }?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content="\">
    <link rel="icon" href="../<?php echo ICON ?>" type="image/x-icon">
    <link rel="shortcut icon" href="../<?php echo ICON ?>" type="image/x-icon">
    <title><?php echo SITETITLE ?> | Admin Dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="./assets/font-awesome/css/font-awesome.min.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/animate.css">
    <!-- <link rel="stylesheet" type="text/css" href="./assets/css/vendors/prism.css"> -->
    <!-- Plugins css Ends-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/sweetalert2.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../user/assets/css/style.css">
    <link id="color" rel="stylesheet" href="./assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../user/assets/css/responsive.css">
 
  </head>