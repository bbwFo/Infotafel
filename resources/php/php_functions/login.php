<?php

// ------------------------------
// login() => Name, Passwort
//
// Rückgabe:
//   6 = User und Password = NULL
//   5 = User = NULL
//   4 = Password = NULL
//   3 = User existiert nicht!
//   2 = Passwort ist falsch!
//   1 = Eingeloggt
// ------------------------------

function login(string $user, string $psw){

  // DATENBANK CONNECTION
  include ('db.php');

  // WENN USERNAME & PASSWORD NICHT GESETZT SIND
  if ($user == null && $psw == null)
  {
    return 6;
  }
  // WENN USERNAME NICHT GESETZT IST
  else if ($user == null)
  {
    return 5;
  }
  // WENN PASSWORD NICHT GESETZT IST
  else if ($psw == null)
  {
    return 4;
  }
  // WENN USERNAME & PASSWORD GESETZT SIND
  else
  {
    // DATENBANK ABFRAGE
    $zeile = $db -> prepare("SELECT * FROM user WHERE username = '$user'"); // HIER TABELE UND REIHE EINTRAGEN
    $zeile -> execute();
    $db_result = $zeile -> fetchAll();
    $user_exist = count($db_result);

    // WENN USER EXISTIERT
    if ($user_exist)
    {
      // DATENBANK-PASSWORD HOLEN
      foreach ($db_result as $wert) { $db_psw = $wert["password"]; }
      // WENN ALLES RICHTIG IST
      if (password_verify($psw, $db_psw)) { return 1; }
      // WENN PASSWORD FALSCH IST
      else { return 2; }
    }
    // WENN USER NICHT EXISTIERT
    else { return 3; }
  }
}

?>
