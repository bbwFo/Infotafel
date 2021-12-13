<?php


$INPUT_USERNAME = $_POST["USERNAME"];
$INPUT_PASSWORD_ONE = $_POST["PASSWORD_ONE"];
$INPUT_PASSWORD_TWO = $_POST["PASSWORD_TWO"];
$INPUT_STEAM = $_POST["STEAM"];
$INPUT_DISCORD = $_POST["DISCORD"];
$INPUT_EMAIL = $_POST["EMAIL"];
$INPUT_RULES = $_POST["RULES"];

regist($INPUT_USERNAME, $INPUT_PASSWORD_ONE, $INPUT_PASSWORD_TWO, $INPUT_STEAM, $INPUT_DISCORD, $INPUT_EMAIL, $INPUT_RULES);


function regist(string $user, string $psw_one, string $psw_two, string $steam, string $discord, string $email, bool $rules){

  // DATENBANKVERBINDUNG
  include ('db.php');

  // WENN USERNAME, PASSWORD 1, PASSWORD 2 UND EMAIL NICHT GESETZT SIND
  if ($user == null || $psw_one == null || $psw_two == null || $steam == null || $discord == null|| $email == null || $rules == false)
  {
    echo "7";
  }
  else
  {
    if ($psw_one == $psw_two)
    {
      $psw = $psw_one;


      // CECKEN OB EINTRÄGE EXISTIEREN
           if (db_value_exist('user', 'username', $user)){ echo "5"; }
      else if (db_value_exist('user', 'steam_id', $steam)){ echo "4"; }
      else if (db_value_exist('user', 'discord', $discord)){ echo "3"; }
      else if (db_value_exist('user', 'email', $email)){ echo "2"; }

      else
      {
        // PASSWORT HASHEN
        $psw_hash = password_hash($psw, PASSWORD_DEFAULT);

        // AKTIVIERUNGSCODE GENERIREN
        $code = rand(0,9).rand(0,9).rand(0,9).rand(0,9)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9);

        // DATENBANKEINTRAG
        $db_eintrag = "INSERT INTO user(username, password, steam_id, steam_username, discord, email, code) VALUES ('$user', '$psw_hash', '$steam', '0', '$discord', '$email', '$code')";
        $db -> exec($db_eintrag);

        echo "1";

      }
    }
    else { echo "6"; }
  }
}




function db_value_exist($table, $row, $value){

  include ('db.php');

  $zeile = $db -> prepare("SELECT * FROM $table WHERE $row = '$value'");
  $zeile -> execute();
  $db_result = $zeile -> fetchAll();

  return count($db_result);
}










// $zeile_user = $db -> prepare("SELECT * FROM user WHERE username = '$user'");
// $zeile_user -> execute();
// $db_result_user = $zeile_user -> fetchAll();
// $user_exist = count($db_result_user);
//
// $zeile_steam = $db -> prepare("SELECT * FROM user WHERE steam_id = '$steam'");
// $zeile_steam -> execute();
// $db_result_steam = $zeile_steam -> fetchAll();
// $steam_exist = count($db_result_steam);
//
// $zeile_discord = $db -> prepare("SELECT * FROM user WHERE discord = '$discord'");
// $zeile_discord -> execute();
// $db_result_discord = $zeile_discord -> fetchAll();
// $discord_exist = count($db_result_discord);
//
// $zeile_email = $db -> prepare("SELECT * FROM user WHERE email = '$email'");
// $zeile_email -> execute();
// $db_result_email = $zeile_email -> fetchAll();
// $email_exist = count($db_result_email);

?>
