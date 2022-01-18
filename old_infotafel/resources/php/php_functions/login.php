<?php

$INPUT_USERNAME = $_POST["USERNAME"];
$INPUT_PASSWORD = $_POST["PASSWORD"];

login($INPUT_USERNAME, $INPUT_PASSWORD);

function login(string $user, string $psw){

  // DATENBANKVERBINDUNG
  include ('db.php');

  // WENN USERNAME & PASSWORD NICHT GESETZT SIND
  if ($user == null || $psw == null)
  {
    // echo "User und Passwort = NULL";
    echo "5";
  }
  // WENN USERNAME & PASSWORD GESETZT SIND
  else
  {
    // DATENBANK ABFRAGE
    $zeile_1 = $db -> prepare("SELECT * FROM user WHERE username = '$user'"); // HIER TABELE UND REIHE EINTRAGEN
    $zeile_1 -> execute();
    $db_result_1 = $zeile_1 -> fetchAll();
    $user_exist = count($db_result_1);

    // WENN USER EXISTIERT
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
      if ($aktivierung == 1){
        // DATENBANK-PASSWORD HOLEN
        foreach ($db_result_1 as $wert) {
          $db_psw = $wert["password"];
        }
        // WENN ALLES RICHTIG IST
        if (password_verify($psw, $db_psw))
        {
          // echo "Eingeloggt!";
          echo "1";
        }
        // WENN PASSWORD FALSCH IST
        else
        {
          // echo "Passwort ist Falsch!";
          echo "2";
        }
      }
      // WENN ACCOUNT NICHT AKTIVIERT
      else {
        // echo "Du musst dich erst verifiziren!";
        echo "3";
      }
    }
    // WENN USER NICHT EXISTIERT
    else
    {
      // echo "User Existiert nicht!";
      echo "4";
    }
  }
}
?>
