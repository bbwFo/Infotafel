<?php
// INCLUDES
include ('cookie.php');
include ('security_cookie.php');
include ('login.php');

// -------------------------------






function db_select_all_from($TABELLE){

  include ('db.php');

  $zeile = $db -> prepare("SELECT * FROM $TABELLE");
  $zeile -> execute();
  $result = $zeile -> fetchAll();

  return $result;
}



// 
// function db_update_table($TABLE, $SPALTE, $WERT){
//   $update = $db->prepare("UPDATE user SET username = '$WERT' WHERE newID = '$SPALTE'");
//   $update->execute();
// }












?>
