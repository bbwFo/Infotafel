<?php

include 'simple-php.php';

session_start();

if (!empty($_POST['trigger']))
{
  $CHANGEDATE = changeDate('cards', 'update_date');

  if (isset($_SESSION["change"]))
  {
    $CURRENTDATE = $_SESSION["change"];

    if ($CHANGEDATE != $CURRENTDATE)
    {
      echo json_encode(['state' => 'change', 'massage' => "↻ Aktualisiert: ($CURRENTDATE) -> ($CHANGEDATE)"]);
      $_SESSION["change"] = $CHANGEDATE;
    }
    else { echo json_encode(['state' => 'no-change', 'massage' => 'Keine änderungen']); }
  }
  else
  {
    $_SESSION["change"] = $CHANGEDATE;
    echo json_encode(['state' => 'no-change', 'massage' => 'Änderungs-Cookie angellegt']);
  }
}
else { echo json_encode(['state' => 'no-trigger', 'massage' => 'no-trigger']); }


?>
