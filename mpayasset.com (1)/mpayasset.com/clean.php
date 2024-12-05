<?php
// ob_start();
@session_start();

     //check whether on localhost or online
     $localhost = array(
      '127.0.0.1',
      '::1'
  );

  if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
      $conn=new mysqli("localhost","root","","bitbyte");
  }
  else {
    $conn=new mysqli("localhost","zmuzqzlb_mpay","!@#admin!@#","zmuzqzlb_mpay");
  }

function checkLink($data){
  return (basename($_SERVER['REQUEST_URI'])==$data)?"active":null;
}

function clean($value){
    GLOBAL $conn;
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    $value = $conn->real_escape_string($value);
    return $value;                
  }

  @$idc = clean($_SESSION['userid']);

  function limitTextAnchor($text,$limit,$anchor){
    if(str_word_count($text, 0)>$limit){
        $word = str_word_count($text,2);
        $pos=array_keys($word);
        $text=substr($text,0,$pos[$limit]). $anchor;
    }
    return $text;
  }
  function formatDate($data){
    return date("d M, Y", strtotime($data));
  }

  function formatDateTime($data){
    return date("d M Y, h:i:sa", strtotime($data));
  }


  function formatTime($data){
    return date("H:i", strtotime($data));
  }

  function runQuery($statement){
    GLOBAL $conn;
    return $conn->query($statement);
  }

  function fetchAssoc($statement){
    return $statement->fetch_assoc();
  }

  function numRows($sql) {
    if ($sql === FALSE) {
        return 0;
    }
    return $sql->num_rows;
}

function uploadFile($file) {
  $targetDir = "../qrcode/";
  $fileName = basename($file["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  // Allow certain file formats
  $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (in_array($fileType, $allowedTypes)) {
      // Upload file to server
      if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
          return $fileName;
      }
  }
  return false;
}


  function addToMonth($now, $howManyMonth){
    $date = $now;
    $date = strtotime($date);
    $date = strtotime($howManyMonth.' months', $date);
    return gmdate('Y-m-d H:i:s', $date);
  }

  function addToWeek($howManyWeek){
    $date = strtotime(gmdate("Y-m-d H:i:s"));
    $date = strtotime($howManyWeek.' weeks', $date);
    return gmdate('Y-m-d H:i:s', $date);
  }

  function addToDate($now, $howManyDays){
    $date = $now;
    $date = strtotime($date);
    return gmdate('Y-m-d H:i:s', strtotime($howManyDays.' day')); 
  }

  function addMins($mins){
    return gmdate('Y-m-d H:i:s', strtotime("+ $mins minutes"));    
  }

  function datePlusOneHour(){    
    $now = date("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));
    return $date;
  }


  function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}




function limitText($text,$limit){
  if(str_word_count($text, 0)>$limit){
      $word = str_word_count($text,2);
      $pos=array_keys($word);
      $text=substr($text,0,$pos[$limit]). '...';
  }
  return $text;
}


function replaceForMeNow($data){
  $data = str_replace(" ", "-", $data);
  $data = str_replace(".", "-", $data);
  return $data;
}

function kudiSms($phone, $messageTosend){

  $message=urlencode($messageTosend);
  $sender="Fundwallet";  
  // $sender="Fundwallet";  
  $receiver=$phone; //replace with phone number
  //format phone number
  $receiver_phone=str_replace('+','',$receiver);
  $receiver_phone=str_replace(' ','',$receiver_phone);
  if(strlen($receiver_phone)==11 and substr($receiver_phone,0,1)=='0') {
  $receiver_phone='234'.substr($receiver_phone,1,20);
  }
  //send sms
  $ch = @curl_init();
  @curl_setopt($ch, CURLOPT_URL,"http://account.kudisms.net/api/?username=admin@fundwallet.net&password=@admin100@&message={$message}&sender={$sender}&mobiles={$receiver_phone}");
  @curl_exec($ch);
  @curl_close($ch);

  }


  function findCountry($ip){
    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    //get country full name
    if(property_exists($ipdat, 'geoplugin_countryName')) {
        $country =  $ipdat->geoplugin_countryName;
    }else{
        $country = "Nigeria";
    }
    return $country;
  }




// function insertImagesNew($fileName, $transid, $id='dimg', $int=''){
//   GLOBAL $folder, $userid, $email, $filePath; 
//   @list(, , $imtype, ) = getimagesize($fileName['tmp_name']); 
//   if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
//       $picid=$transid.$int;
//       $foo = new Upload($fileName);
//       include($filePath);
//       runQuery("UPDATE dregister SET $id='$picid' WHERE userid='$userid' AND demail='$email'");       
//   }
  
// }


    
function addline($text) {
    $codesToConvert = array(    
            ' '    =>  '-',
    '-'    =>  '-',
    '�'    =>  '-',
    '+'  =>  '',
    ' �'    =>  '-',	
    '� '    =>  '-',
    ' � '    =>  '-',			
    '- '    =>  '-',
    ' -'    =>  '-',
    '�'    =>  '-',
    '!'    =>  '',
    ' ,'    =>  '-',
    ', '    =>  '-',
    ':'    =>  '-',
    ': '    =>  '-',
    ' :'    =>  '-',
    '�'    =>  '-',
    '_'    =>  '-',
    '&ndash'    =>  '-',
    '&mdash'    =>  '-',
    '&frasl'    =>  '-',
    '/'    =>  '-',
    ';'    =>  '',
    '&#039'    =>  '',
    '&quot'    =>  '',
    '?'    =>  '',
    '�'    =>  '',
    '('    =>  '',
    ')'    =>  '',
    '['    =>  '',
    ']'    =>  '',
    '>'    =>  '',
    '<'    =>  '',
    '{'    =>  '',
    '}'    =>  '',
    '$'    =>  '',
    '&'    =>  '',
    '#'    =>  '',
    '@'    =>  '',
    '%'    =>  '',
    '*'    =>  '',
    '^'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '.'    =>  '',
    '..'    =>  '',
    '...'    =>  '',
    '....'    =>  '',
    '�'    =>  '',	
    '&acirc;��'	  =>  '',
    '&acirc;��'	  =>  '',			
    ','    =>  '-'
           );
    return (strtr($text, $codesToConvert));
  }
  

function userInfo($data, $email, $value){
  $data = runQuery("SELECT * FROM users WHERE userid='$data' AND email='$email'");
  if(numRows($data)>0){
    $datas = fetchAssoc($data);
     $result = $datas[$value];
  }else{
    $result =' ';
  }

  return $result;
}

function getInfo($tableName, $data, $email, $value){
  $data = runQuery("SELECT * FROM $tableName WHERE userid='$data' AND email='$email'");
  if(numRows($data)>0){
    $datas = fetchAssoc($data);
     $result = $datas[$value];
  }else{
    $result =' ';
  }

  return $result;
}

 


    // Transform hours like "1:45" into the total number of minutes, "105". 
    function hoursToMinutes($hours) { 
        $minutes = 0; 
        if (strpos($hours, ':') !== false) { 
            // Split hours and minutes. 
            list($hours, $minutes) = explode(':', $hours); 
        } 
        return $hours * 60 + $minutes; 
    } 
    
    // Transform minutes like "105" into hours like "1:45". 
    function minutesToHours($minutes) { 
        $hours = (int)($minutes / 60); 
        $minutes -= $hours * 60; 
        return sprintf("%d:%02.0f", $hours, $minutes); 
    }

 


function ratePerPeriod($id, $period, $km){
  $sql = runQuery("SELECT * FROM `dsettings_rates` WHERE dcategoryid='$id'")->fetch_assoc();
  return '&#8358; '.number_format($sql[$period] * $km);
}


function hoursToMins($hours){
  $split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $hours, -1, PREG_SPLIT_NO_EMPTY);

    if ($split[0] >= 1 && $split[0] < 60 && $split[1] == 'min'){
        $duration = $split[0];
    }
    elseif ($split[0] >= 1 && $split[0] < 60 && $split[1] == 'mins'){
        $duration = $split[0];
    }
    else{
        $durationHours = $split[0]*60;
        $durationMin = $split[2];
        $duration = $durationHours + $durationMin;        
    }

    return $duration;
}




function replace($data){
  $data = str_replace(',','',$data);
  $data = str_replace('₦ ','',$data);
  $data = str_replace('&#8358; ','',$data);
  return $data;
}


 

function loginUser($email, $pass, $tablename, $location='user/dashboard'){
    
    $sql =  runQuery("SELECT * FROM $tablename WHERE (demail='$email' OR username='$email') AND dpass='$pass' ");
    if(numRows($sql)>0){
      //user have info
      $row = fetchAssoc($sql);
      $_SESSION['email']=$row['demail'];
      $_SESSION['userid']=$row['userid']; 
      if($row['dlevel']=='admin' OR $row['dlevel']=='staff'){
        $_SESSION['admin']=true;  
        header("Location: admin/dashboard");
      }else{        
      $_SESSION['web']=true;  
      header("Location: $location");
      }
      

    }else{  
      $_SESSION['msg']=' 
        <div class="alert alert-danger" role="alert">
            <strong>Fail!</strong> 
            <p>Invalid login details, try again later!</p>
        </div>
        ';
      header('Location:login');

    }

   
}

function logoutUser($return='../'){
    session_start();       
    session_destroy();
    setcookie("email", "");
    setcookie("pin", "");
    header("Location: $return");
 }

function changePassword($old, $pass, $email, $userid) {
    // Fetch the current hashed pin from the database
    $sql = runQuery("SELECT pin FROM users WHERE email='$email' AND userid='$userid'");
    
    if (numRows($sql) > 0) {
        $row = fetchAssoc($sql); // Assuming fetchAssoc fetches the row as an associative array
        $hashedPin = $row['pin'];

        // Verify the old PIN
        if (password_verify($old, $hashedPin)) {
            // Hash the new password
            $newHashedPin = password_hash($pass, PASSWORD_DEFAULT);

            // Update the PIN in the database
            runQuery("UPDATE users SET pin='$newHashedPin' WHERE email='$email' AND userid='$userid'");
            
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                                    <strong>Success!</strong> <br>
                                    Updated successfully!!
                                </div>';
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                                    <strong>Fail!</strong> <br>
                                    Incorrect current password, try again later!
                                </div>';
        }
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                                <strong>Fail!</strong> <br>
                                User not found!
                            </div>';
    }
}



//  function universalImageUpload($fileName, $transid, $tableName, $position, $id='dimg', $int=''){
//   GLOBAL $folder, $filePath; 
//   @list(, , $imtype, ) = getimagesize($fileName['tmp_name']); 
//   if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
//       $picid=$transid.$int;
//       $foo = new Upload($fileName);
//       include($filePath);
//       runQuery("UPDATE $tableName SET $id='$picid' WHERE $position ");       
//   }
  
// }

function deleteFire($tableName, $position){
  runQuery("DELETE FROM $tableName WHERE  $position "); 
}

function updateFire($tableName, $rowSet, $position){
  runQuery("UPDATE $tableName SET $rowSet WHERE  $position "); 
}

function selectFire($tableName, $position, $colResul){
  $sql = runQuery("SELECT * FROM $tableName WHERE  $position "); 
  if(numRows($sql)>0){
    $row = fetchAssoc($sql);
    $result = $row[$colResul];
  }else{
    $result = '';
  }

   return $result;

}
