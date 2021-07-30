<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "arklifenet";

  // Datenbankverbindung
  $SQLconnect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  $SQLconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);








  // $DATA = $SQLconnect->prepare("SELECT * FROM testtable WHERE page = 'test1' AND content = 'test2' ");
  // $DATA->execute();
  // $DATAarray = $DATA->fetchAll();
  //
  // foreach ($DATAarray as $DATAspalte) {
  //   $Kategorie = utf8_encode($DATAspalte["content"]);
  //   $Text001 = utf8_encode($DATAspalte["text1"]);
  //   $Text002 = utf8_encode($DATAspalte["text2"]);
  //
  // }

  //
  //
  // $DATA = $SQLconnect->prepare("SELECT * FROM Home2 WHERE content = 'slider'");
  // $DATA->execute();
  // $DATAarray = $DATA->fetchAll();
  //
  // foreach ($DATAarray as $DATAspalte) {
  //   $Kategorie = utf8_encode($DATAspalte["zeile"]);
  //   $Text001 = utf8_encode($DATAspalte["text1"]);
  //   $Text002 = utf8_encode($DATAspalte["text2"]);
  //   $Text003 = utf8_encode($DATAspalte["text3"]);
  // }
  //

  $DATA = $SQLconnect->prepare("SELECT * FROM home");
  $DATA->execute();
  $DATAarray = $DATA->fetchAll();

  foreach ($DATAarray as $DATAspalte) {
    $Text01 = utf8_encode($DATAspalte["text01"]);
    $Text02 = utf8_encode($DATAspalte["text02"]);
    $Text03 = utf8_encode($DATAspalte["text03"]);
  }







  // $DATA = $SQLconnect->prepare("SELECT * FROM content WHERE page = 'home' AND content = 'slider1'");
  // $DATA->execute();
  // $DATAarray = $DATA->fetchAll();
  //
  // foreach ($DATAarray as $DATAspalte) {
  //   $Content = utf8_encode($DATAspalte["content"]);
  //   $Text01 = utf8_encode($DATAspalte["item01"]);
  //   $Text02 = utf8_encode($DATAspalte["item02"]);
  //   $Text03 = utf8_encode($DATAspalte["item03"]);
  //   $Text04 = utf8_encode($DATAspalte["item04"]);
  //   $Text05 = utf8_encode($DATAspalte["item05"]);
  //   $Text06 = utf8_encode($DATAspalte["item06"]);
  //   $Text07 = utf8_encode($DATAspalte["item07"]);
  //   $Text08 = utf8_encode($DATAspalte["item08"]);
  //   $Text09 = utf8_encode($DATAspalte["item09"]);
  //   $Text10 = utf8_encode($DATAspalte["item10"]);
  // }


?>
