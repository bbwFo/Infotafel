<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "infotafel";

  // Datenbankverbindung
  $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
