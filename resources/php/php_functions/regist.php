<?php

$INPUT_USERNAME = $_POST["USERNAME"];
$INPUT_PASSWORD_ONE = $_POST["PASSWORD_ONE"];
$INPUT_PASSWORD_TWO = $_POST["PASSWORD_TWO"];
$INPUT_EMAIL = $_POST["EMAIL"];

regist($INPUT_USERNAME, $INPUT_PASSWORD_ONE, $INPUT_PASSWORD_TWO, $INPUT_EMAIL);

function regist(string $user, string $psw_one, string $psw_two, string $email){

  // DATENBANKVERBINDUNG
  include ('db.php');

  // WENN USERNAME, PASSWORD 1, PASSWORD 2 UND EMAIL NICHT GESETZT SIND
  if ($user == null || $psw_one == null || $psw_two == null || $email == null) {
    // echo "User, Passwort und Email = NULL";
    echo "6";
  }
  // WENN USERNAME, PASSWORD UND EMAIL GESETZT SIND
  else
  {
    if ($psw_one == $psw_two) {

      $psw = $psw_one;

      // DATENBANK ABFRAGE OB USERNAME EXISTIERT
      $zeile_1 = $db -> prepare("SELECT * FROM user WHERE username = '$user'");
      $zeile_1 -> execute();
      $db_result_1 = $zeile_1 -> fetchAll();
      $user_exist = count($db_result_1);

      // DATENBANK ABFRAGE OB EMAIL EXISTIERT
      $zeile_2 = $db -> prepare("SELECT * FROM user WHERE email = '$email'");
      $zeile_2 -> execute();
      $db_result_2 = $zeile_2 -> fetchAll();
      $email_exist = count($db_result_2);

      // WENN USER UND EMAIL EXISTIERT
      if ($user_exist && $email_exist)
      {
        // echo "User und Email existiert!";
        echo "4";
      }
      // WENN USER EXISTIERT
      else if ($user_exist)
      {
        // echo "User existiert!";
        echo "3";
      }
      // WENN EMAIL EXISTIERT
      else if ($email_exist)
      {
        // echo "Email existiert!";
        echo "2";
      }
      // WENN USER UND EMAIL NICHT EXISTIERT
      else
      {
        // PASSWORT HASHEN
        $psw_hash = password_hash($psw, PASSWORD_DEFAULT);

        // AKTIVIERUNGSCODE GENERIREN
        $code = rand(0,9).rand(0,9).rand(0,9).rand(0,9)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9);

        // DATENBANKEINTRAG
        $db_eintrag = "INSERT INTO user(username, password, email, code) VALUES ('$user', '$psw_hash', '$email', '$code')";
        $db -> exec($db_eintrag);

        // echo "Benuzter angelegt!";
        echo "1";
      }
    }
    else {
      // echo "Passwörter stimmen nicht überein";
      echo "5";
    }
  }
}
?>
