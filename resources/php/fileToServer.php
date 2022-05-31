<?php

include 'simple-php.php';

if (!empty($_FILES['file']['name']))
{
  $X = save_file('../../resources/uploads/img/', $_FILES['file'], $_POST['name'], ["jpg", "jpeg", "png", "gif", "pdf"]);

  echo $X;
}
else
{
  echo json_encode(['state' => 'no-input']);
}

?>
