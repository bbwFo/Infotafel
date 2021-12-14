<?php

$INPUT_USERNAME = $_POST["USERNAME"];
$INPUT_PASSWORD_ONE = $_POST["PASSWORD_ONE"];
$INPUT_PASSWORD_TWO = $_POST["PASSWORD_TWO"];
$INPUT_STEAM = $_POST["STEAM"];
$INPUT_DISCORD = $_POST["DISCORD"];
$INPUT_EMAIL = $_POST["EMAIL"];
$INPUT_RULES = $_POST["RULES"];

regist($INPUT_USERNAME, $INPUT_PASSWORD_ONE, $INPUT_PASSWORD_TWO, $INPUT_STEAM, $INPUT_DISCORD, $INPUT_EMAIL, $INPUT_RULES);

function regist(string $USER, string $PSW_ONE, string $PSW_TWO, string $STEAM, string $DISCORD, string $EMAIL, bool $RULES){

  // DATENBANKVERBINDUNG
  include ('db.php');

  // WENN USERNAME, PASSWORD 1, PASSWORD 2 UND EMAIL NICHT GESETZT SIND
  if ($USER == NULL || $PSW_ONE == NULL || $PSW_TWO == NULL || $STEAM == NULL || $DISCORD == NULL|| $EMAIL == NULL || $RULES == FALSE)
  {
    echo "7";
  }
  else
  {
    if ($PSW_ONE == $PSW_TWO)
    {
      $PSW = $PSW_ONE;


      // CECKEN OB EINTRÄGE EXISTIEREN
           if (db_user_value_exist('username', $USER)){ echo "5"; }
      else if (db_user_value_exist('steam_id', $STEAM)){ echo "4"; }
      else if (db_user_value_exist('discord', $DISCORD)){ echo "3"; }
      else if (db_user_value_exist('email', $EMAIL)){ echo "2"; }
      else
      {
        // PASSWORT HASHEN
        $PSW_HASH = password_hash($PSW, PASSWORD_DEFAULT);

        // AKTIVIERUNGSCODE GENERIREN
        $zeichensatz = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($zeichensatz);

        $numberblock_length = 6;

        $randomString_1 = '';
        $randomString_2 = '';
        $randomString_3 = '';

        do
        {
          for ($i = 0; $i < $numberblock_length; $i++) { $randomString_1 .= $zeichensatz[rand(0, $charactersLength - 1)]; }
          for ($i = 0; $i < $numberblock_length; $i++) { $randomString_2 .= $zeichensatz[rand(0, $charactersLength - 1)]; }
          for ($i = 0; $i < $numberblock_length; $i++) { $randomString_3 .= $zeichensatz[rand(0, $charactersLength - 1)]; }

          $CODE = $randomString_1.'-'.$randomString_2.'-'.$randomString_3;
        }
        while (db_user_value_exist('code', $CODE));

        // DATENSATZ ERSTELLUNGS DATETIME
        $DATE = new DateTime();
        $TIMESTAMP = $DATE->format('Y-m-d H:i:s');

        // DATENBANKEINTRAGEMAIL
        $db_eintrag = "INSERT INTO user(username, password, steam_id, steam_username, discord, email, code, erstellt) VALUES ('$USER', '$PSW_HASH', '$STEAM', '0', '$DISCORD', '$EMAIL', '$CODE', '$TIMESTAMP')";
        $db -> exec($db_eintrag);

        echo "1";
      }
    }
    else
    {
      echo "6";
    }
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
