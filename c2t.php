<?php

/** CODE BY HEXV **/

print "Your Cookie Facebook: ";
$COOKIE = trim(fgets(STDIN));

$RESULT = GETTOKEN($COOKIE);

if($RESULT)
{
  print "Your Token: ". $RESULT;
} else {
  die(" Cookie error! ");
}



function GETTOKEN($COOKIE) {
  $URL_BUSS = "https://business.facebook.com/business_locations/?nav_source=flyout_menu";
  
  $INIT = curl_init($URL_BUSS);
  
  $PROT = array(
    
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36",
    CURLOPT_COOKIE    => $COOKIE,
    CURLOPT_SSL_VERIFYPEER => FALSE
    
  );
  
  curl_setopt_array($INIT, $PROT);
  
  $EXEC = curl_exec($INIT);
  
  
  if (strpos($EXEC,'["EAAG'))
  {
  $CUT_TOKEN = explode('["EAAG', $EXEC);
  $CUT_TOKEN_2 = explode('"', $CUT_TOKEN[1]);
  $TOKEN = "EAAG" . trim($CUT_TOKEN_2[0]);
  }
  return $TOKEN;
}
