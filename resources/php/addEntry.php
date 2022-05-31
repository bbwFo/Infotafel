
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
  $ID = gen_id('cards', 'id', 10, '0123456789');

  db_add('cards', [
    'id' => $ID,
    'titel' => $_POST['titel'],
    'description' => $_POST['description'],
    'row' => $_POST['row'],
    'icon' => $_POST['icon'],
    'style' => $_POST['style'],
    'color' => $_POST['color'],
    'termin' => $_POST['termin'],
    'html' => $_POST['html']
  ]);

  echo json_encode(['state' => 'done', 'id' => $ID]);
}
else { echo json_encode(['state' => 'no-input']); }




?>
