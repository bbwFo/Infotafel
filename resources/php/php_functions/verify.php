<?php

$INPUT_USERNAME = $_POST["USERNAME"];
$INPUT_CODE = $_POST["CODE"];

verify($INPUT_USERNAME, $INPUT_CODE);

function verify(string $USER, string $CODE){

  // DATENBANKVERBINDUNG
  include ('db.php');

  if ($USER == NULL || $CODE == NULL)
  {
    echo "5";
  }
  else
  {
    if (db_user_value_exist('username', $USER))
    {
      if (db_user_check_aktiv($USER) == 0)
      {
        if (db_user_check_code($USER) == $CODE)
        {
          $update = $db -> prepare("UPDATE user SET aktivierung = 1 WHERE username = '$USER'");
          $update -> execute();

          echo "1";
        }
        else { echo "3"; }
      }
      else { echo "2"; }
    }
    else { echo "4"; }
  }
}



// function db_user_check_fehlversuche($USER){
//
//   include ('db.php');
//
//   $zeile = $db -> prepare("SELECT fehlversuche FROM user WHERE username = '$USER'");
//   $zeile -> execute();
//   $db_result = $zeile -> fetchAll();
//
//   foreach ($db_result as $spalte) {
//    $fehlversuche = $spalte["code"];
//   }
//
//   if ($fehlversuche <= 5)
//   {
//     return 'deaktivate';
//   }
//   else
//   {
//     $update = $db -> prepare("UPDATE user SET fehlversuche = '$fehlversuche++' WHERE username = '$USER'");
//     $update -> execute();
//
//     return $fehlversuche++;
//   }
// }







function db_user_check_code($USER){

  include ('db.php');

  $zeile = $db -> prepare("SELECT code FROM user WHERE username = '$USER'");
  $zeile -> execute();
  $db_result = $zeile -> fetchAll();

  foreach ($db_result as $spalte) {
   return $db_code = $spalte["code"];
  }
}

function db_user_check_aktiv($USER){

  include ('db.php');

  $zeile = $db -> prepare("SELECT aktivierung FROM user WHERE username = '$USER'");
  $zeile -> execute();
  $db_result = $zeile -> fetchAll();

  foreach ($db_result as $spalte) {
    return $aktivierung = $spalte["aktivierung"];
  }
}


function db_user_value_exist(string $ROW, string $VALUE){

  include ('db.php');

  $zeile = $db -> prepare("SELECT * FROM user WHERE $ROW = '$VALUE'");
  $zeile -> execute();
  $db_result = $zeile -> fetchAll();

  return count($db_result);
}

?>
