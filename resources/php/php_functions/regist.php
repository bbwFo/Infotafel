<?php
function regist(string $user, string $psw, string $email){

  // DATENBANKVERBINDUNG
  include ('db.php');

  // WENN USERNAME, PASSWORD UND EMAIL NICHT GESETZT SIND
  if ($user == null && $psw == null && $email == null) {
    echo "User, Passwort und Email = NULL";
  }
  // WENN USERNAME UND EMAIL NICHT GESETZT SIND
  else if ($user == null && $email == null) {
    echo "User und Email = NULL";
  }
  // WENN USERNAME UND PASSWORD NICHT GESETZT SIND
  else if ($user == null && $psw == null) {
    echo "User und Passwort = NULL";
  }
  // WENN USERNAME, PASSWORD UND EMAIL NICHT GESETZT SIND
  else if ($psw == null && $email == null) {
    echo "Passwort und Email = NULL";
  }
  // WENN USERNAME NICHT GESETZT IST
  else if ($user == null) {
    echo "User = NULL";
  }
  // WENN PASSWORT NICHT GESETZT IST
  else if ($psw == null) {
    echo "Passwort = NULL";
  }
  // WENN EMAIL NICHT GESETZT IST
  else if ($email == null) {
    echo "Email = NULL";
  }
  // WENN USERNAME, PASSWORD UND EMAIL GESETZT SIND
  else
  {
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
      echo "User und Email existiert!";
    }
    // WENN USER EXISTIERT
    else if ($user_exist)
    {
      echo "User existiert!";
    }
    // WENN EMAIL EXISTIERT
    else if ($email_exist)
    {
      echo "Email existiert!";
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

      echo "Benuzter angelegt!";
    }
  }
}
?>
