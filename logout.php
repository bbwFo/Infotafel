<?php
  Session_start();
  Session_destroy();
  header('Location: manager_login.php');
?>
