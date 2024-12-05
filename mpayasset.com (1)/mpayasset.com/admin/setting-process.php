<?php

require '../user/clean.php'; 
$folder = 'files';
require '../image_php/class.upload.php';
$transid = bin2hex(random_bytes(12));
$filePath = "../image_php/image_doc.php";


//Upload Documents
if(isset($_POST['saveWallet'])){ 
    $address = clean($_POST['address']);
   if(!empty($_FILES['img']['name'])){ 
       universalImageUpload($_FILES['img'], $transid, 'dsetting', "id=1", $id='dimg', $int='');
       @unlink($_POST['himg']);
   }  
 
   runQuery("UPDATE dsetting SET daddress='$address' WHERE id=1 ");
      $_SESSION['msg']='<div class="alert alert-success" role="alert">
              <strong>Success!</strong> <br>
              Updated successful!
          </div>';
      header("Location:settings");

}

