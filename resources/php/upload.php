<?php

$INPUT_TITEL        = $_POST["INPUT_TITEL"];
$INPUT_DESCRIPTION  = $_POST["INPUT_DESCRIPTION"];
$INPUT_ROW          = $_POST["INPUT_ROW"];
$INPUT_ICON         = $_POST["INPUT_ICON"];
$INPUT_COLOR        = $_POST["INPUT_COLOR"];
$INPUT_STYLE        = $_POST["INPUT_STYLE"];
$INPUT_TERMIN       = $_POST["INPUT_TERMIN"];
$INPUT_BACKGROUND   = $_POST["INPUT_BACKGROUND"];
// $INPUT_INHALT       = $_POST["INPUT_INHALT"];
// $INPUT_DELETE       = $_POST["INPUT_DELETE"];


// DATENBANKVERBINDUNG
include ('db.php');


$db_eintrag = "INSERT INTO
cards(
  titel,
  description,
  row,
  icon,
  color,
  style,
  termin,
  background
)
VALUES (
  '$INPUT_TITEL',
  '$INPUT_DESCRIPTION',
  '$INPUT_ROW',
  '$INPUT_ICON',
  '$INPUT_COLOR',
  '$INPUT_STYLE',
  '$INPUT_TERMIN',
  '$INPUT_BACKGROUND'
)";

$db -> exec($db_eintrag);

echo "1";



?>
