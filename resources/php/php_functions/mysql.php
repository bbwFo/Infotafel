<?php

function db_select_all_from($TABELLE){

  include ('db.php');

  $zeile = $db -> prepare("SELECT * FROM $TABELLE");
  $zeile -> execute();
  $result = $zeile -> fetchAll();

  return $result;
}














function db_test($VAR1, $VAR2, $VAR3){

  include ('db.php');

  $zeile = $db -> prepare("SELECT * FROM $TABELLE");
  $zeile -> execute();
  $result = $zeile -> fetchAll();

  return $result;
}







?>
