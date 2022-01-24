<?php
function set_security_cookie($cookie_value){

  $cookie_name = "Security-Cookie";
  $cookie_value_hash = password_hash($cookie_value, PASSWORD_DEFAULT);

  if(!isset($_COOKIE[$cookie_name]))
  {
      setcookie($cookie_name, $cookie_value_hash, time() + (86400 * 30), "/"); // 86400 = 1 day
      return 0;
  }
  else
  {
      return 1;
  }
}


function check_security_cookie(){

  $cookie_name = "Security-Cookie";

  if(!isset($_COOKIE[$cookie_name]))
  {
      return 0;
  }
  else
  {
      return 1;
  }
}

function get_security_cookie(){

  $cookie_name = "Security-Cookie";

  if(!isset($_COOKIE[$cookie_name]))
  {
      return 0;
  }
  else
  {
      echo $_COOKIE[$cookie_name];
  }
}

?>
