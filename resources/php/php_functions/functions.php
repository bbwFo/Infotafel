<?php
// INCLUDES ----------------------
include ('cookie.php');
include ('security_cookie.php');
// include ('login.php');
// include ('regist.php');
// include ('verify.php');
include ('mysql.php');
include ('session.php');
// -------------------------------




function sayhello(){
  if(date("G") < 12)
  {
    $hello = "Guten Morgen";
  }
  if(date("G") <= 18 && date("G") >= 12)
  {
    $hello = 'Guten Tag';
  }
  if(date("G") >= 19)
  {
    $hello = 'Guten Abend';
  }
  return $hello;
}










// function get_steam_username($steamid){
//   $xml = simplexml_load_file("http://steamcommunity.com/profiles/$steamid/?xml=1");
//   if(!empty($xml)) {
//       $username = $xml->steamID;
//       echo $username;
//   }
// }










?>
