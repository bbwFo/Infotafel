<?php

include 'simple-php.php';

if (!empty($_FILES['file']['name']))
{

  $VALIDTYPES = ['png', 'jpg', 'jpeg'];

  save_file('resources/uploads/img/', $_FILES['file'], 'testfileName', $VALIDTYPES);

  echo json_encode(['state' => 'uploaded']);
}
else
{
  echo json_encode(['state' => 'no-input']);
}

?>
