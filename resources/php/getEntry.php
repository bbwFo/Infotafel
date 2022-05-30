
<?php
include 'simple-php.php';



if (!empty($_POST['id']))
{
  $VALUE = db_get('cards', 'id', $_POST['id'], 'all');

  echo json_encode([
    'state' => 'done',
    'titel' => $VALUE['titel'],
    'description' => $VALUE['description'],
    'row' => $VALUE['row'],
    'icon' => $VALUE['icon'],
    'style' => $VALUE['style'],
    'color' => $VALUE['color'],
    'termin' => $VALUE['termin'],
    'id' => $VALUE['id']
  ]);
}
else { echo json_encode(['state' => 'no-input']); }




?>
