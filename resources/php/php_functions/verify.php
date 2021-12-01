<?php

$INPUT_USERNAME = $_POST["USERNAME"];
$INPUT_CODE = $_POST["CODE"];

verify($INPUT_USERNAME, $INPUT_CODE);

function verify(string $user, string $code){

  // DATENBANKVERBINDUNG
  include ('db.php');

  // WENN USERNAME & CODE NICHT GESETZT SIND
  if ($user == null || $code == null)
  {
    // echo "User und Code = NULL";
    echo "5";
  }
  // WENN USERNAME & CODE GESETZT SIND
  else{
    // DATENBANK ABFRAGE OB USERNAME EXISTIERT
    $zeile_1 = $db -> prepare("SELECT * FROM user WHERE username = '$user'");
    $zeile_1 -> execute();
    $db_result_1 = $zeile_1 -> fetchAll();
    $user_exist = count($db_result_1);

    // WENN USERNAME EXISTIERT
    if ($user_exist)
    {
      // DATENBANK ABFRAGE OB ACCOUNT SCHON AKTIVIERT
      $zeile_2 = $db -> prepare("SELECT aktivierung FROM user WHERE username = '$user'");
      $zeile_2 -> execute();
      $db_result_2 = $zeile_2 -> fetchAll();

      foreach ($db_result_2 as $spalte) {
        $aktivierung = $spalte["aktivierung"];
      }

      // WENN ACCOUNT NICHT AKTIVIERT
      if ($aktivierung == 0)
      {
        // DATENBANK ABFRAGE FÜR CODE ÜBERPRÜFUNG
        $zeile_3 = $db -> prepare("SELECT code FROM user WHERE username = '$user'");
        $zeile_3 -> execute();
        $db_result_3 = $zeile_3 -> fetchAll();

        foreach ($db_result_3 as $spalte) {
          $db_code = $spalte["code"];
        }

        // WENN CODE GLEICH IST
        if ($code == $db_code) {

          // DATENBANK UPDATE
          $update = $db -> prepare("UPDATE user SET aktivierung = 1 WHERE username = '$user'");
          $update -> execute();

          // echo "Account aktiviert!";
          echo "1";
        }
        // WENN CODE FALSCH IST
        else
        {
          // echo "Der Code ist Falsch!";
          echo "3";
        }
      }
      // WENN ACCOUNT BEREITS AKTIVIERT IST
      else {
        // echo "Account bereits aktiviert!";
        echo "2";
      }
    }
    // WENN USER NICHT EXISTIERT
    else
    {
      // echo "Benutzer existiert nicht!";
      echo "4";
    }
  }
}
?>
