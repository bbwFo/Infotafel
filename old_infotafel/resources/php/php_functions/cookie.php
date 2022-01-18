<?php

function set_cookie($cookie_name, $cookie_value){

  if(!isset($_COOKIE[$cookie_name]))
  {
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
      return 0;
  }
  else
  {
      return 1;
  }
}

function check_cookie($cookie_name){

  if(!isset($_COOKIE[$cookie_name]))
  {
      return 0;
  }
  else
  {
      return 1;
  }
}

function get_cookie($cookie_name){

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
