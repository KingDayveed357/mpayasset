<?php

$subject = SITETITLE."\r\n";

$swap = array(    
    "{SITE_ADDR}"=>SITELINK,
    "{TITLE}"=>SITETITLE,
    "{ICON}"=>SITEICON,
    "{LOGO}"=>SITELOGO,
    "{REFER}"=>$user,
    "{AMOUNT}"=>$bat,
    "{NAME}"=>$fname
);


$headers  = "MIME-Version: 1.0 \r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// $headers .= "From: ".SITETITLE." <".SITEINFO.">" . "\r\n";
$headers .= "Reply-To: ".SITEINFO."\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
//create the html message
if(file_exists($test)){
    $message = file_get_contents($test);

}else{
    die("Unable to locate file");
}


foreach(array_keys($swap) as $key){
    if(strlen($key)>2 && trim($key) !=''){
        $message = str_replace($key, $swap[$key], $message);
    }
}


mail($maps,$subject,$message,$headers); 

