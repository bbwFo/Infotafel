
<?php
include 'simple-php.php';

if (
  !empty($_POST['titel']) &&
  !empty($_POST['description']) &&
  !empty($_POST['row']) &&
  !empty($_POST['icon']) &&
  !empty($_POST['style']) &&
  !empty($_POST['color']) &&
  !empty($_POST['html'])
  )
{
  db_update('cards', 'id', $_POST['id'], [
    'titel' => $_POST['titel'],
    'description' => $_POST['description'],
    'row' => $_POST['row'],
    'icon' => $_POST['icon'],
    'style' => $_POST['style'],
    'color' => $_POST['color'],
    'termin' => $_POST['termin'],
    'html' => $_POST['html']
  ]);

  echo json_encode(['state' => 'done']);
}
else { echo json_encode(['state' => 'no-input']); }


?>
