
<?php
include 'simple-php.php';



if (!empty($_POST['id']))
{
  db_delete('cards', 'id', $_POST['id']);

  echo json_encode(['state' => 'done']);
}
else { echo json_encode(['state' => 'no-input']); }




?>
