<?php

include 'simple-php.php';

if (!empty($_POST['trigger']))
{
  $TIMESTAMP = changeDate('cards', 'update_date');

  echo json_encode(['state' => 'done', 'date' => $TIMESTAMP]);
}
else { echo json_encode(['state' => 'no-trigger', 'massage' => 'no-trigger']); }


?>
