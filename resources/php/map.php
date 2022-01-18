<?php
include ('db.php');

$MAP_SAVE = $_POST["MAP_SAVE"];

$update = $db -> prepare("UPDATE map SET map_save = '$MAP_SAVE' WHERE id = 9");
$update -> execute();


?>
