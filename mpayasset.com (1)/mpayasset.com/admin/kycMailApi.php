<?php

$subject = "Denraders: KYC REQUEST\r\n";

$swap = array(    
    "{SITE_ADDR}"=>"https://dentraders.com/",
    "{ICON}"=>"https://dentraders.com/images/favicon.png",
    "{LOGO}"=>"https://dentraders.com/images/den.png",
    "{NAME}"=>$name
);


$headers  = "MIME-Version: 1.0 \r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Swift Trade <support@mpayasset.com>" . "\r\n";
$headers .= "Reply-To: support@dentraders.com"."\r\n";
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


mail($email,$subject,$message,$headers); 

