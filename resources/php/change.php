<?php

include 'simple-php.php';

session_start();

if (!empty($_POST['trigger']))
{
  $DATABASE_DATE = changeDate('cards', 'update_date');

  if (isset($_SESSION["change"]))
  {
    $CURRENTDATE = $_SESSION["change"];

    if ($DATABASE_DATE != $CURRENTDATE)
    {
      echo json_encode(['state' => 'change', 'massage' => "↻ Aktualisiert: ($CURRENTDATE) -> ($CHANGEDATE)"]);
      $_SESSION["change"] = $DATABASE_DATE;
    }
    else { echo json_encode(['state' => 'no-change', 'massage' => 'Keine änderungen']); }
  }
  else
  {
    $_SESSION["change"] = $DATABASE_DATE;
    echo json_encode(['state' => 'no-change', 'massage' => 'Änderungs-Cookie angellegt']);
  }
}
else { echo json_encode(['state' => 'no-trigger', 'massage' => 'no-trigger']); }


?>
