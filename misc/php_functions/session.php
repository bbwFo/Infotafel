<?php

function start_global_session($user){

  include ('db.php');

  $zeile = $db -> prepare("SELECT * FROM user WHERE username = '$user'");
  $zeile -> execute();
  $db_result = $zeile -> fetchAll();

  $session_id = sha1($user);

  session_name($session_id);

  session_start();

  foreach ($db_result as $spalte) {
    $_SESSION['username'] = $spalte["username"];
    $_SESSION['email'] = $spalte["email"];
    $_SESSION['steam_id'] = $spalte["steam_id"];
    $_SESSION['steam_username'] = $spalte["steam_username"];
    $_SESSION['discord'] = $spalte["discord"];
    $_SESSION['xp'] = $spalte["xp"];
    $_SESSION['coins'] = $spalte["coins"];
    $_SESSION['diamonds'] = $spalte["diamonds"];
  }
}

// session_unset();
// session_destroy();

?>
