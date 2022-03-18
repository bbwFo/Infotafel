<?php
if (isset($_POST["titel"]) && isset($_POST["description"]) && isset($_POST["row"]) && isset($_POST["icon"]) && isset($_POST["color"]) && isset($_POST["style"]))
{
  $UUID = gen_uuid('cards', '20', 'default');



  if (empty($_FILES['background']['name'])) { $BG = ''; } else { $BG = save_file('resources/uploads/img/', $_FILES['background'], $UUID); }
  if (empty($_FILES['pdf']['name'])) { $PDF = ''; } else { $PDF = save_file('resources/uploads/pdf/', $_FILES['pdf'], $UUID); }

  if (isset($_POST["termin"])) { $TERMIN =  $_POST["termin"]; } else { $TERMIN = ''; }
  if (isset($_POST["url"])) { $URL =  $_POST["url"]; } else { $URL = ''; }
  if (isset($_POST["html"])) { $HTML =  $_POST["html"]; } else { $HTML = ''; }

  db_add('cards', array(
    'uuid' => $UUID,
    'titel' => $_POST["titel"],
    'description' => $_POST["description"],
    'row' => $_POST["row"],
    'icon' => $_POST["icon"],
    'color' => $_POST["color"],
    'style' => $_POST["style"],
    'termin' => $TERMIN,
    'background' => $BG
  ));

  db_add('content', array(
    'uuid' => $UUID,
    'pdf' => $PDF,
    'url' => $URL,
    'html' => htmlentities($HTML)
  ));

  set_cookie('reload', '1', '1');

  echo 'done!';
}
else {
  echo 'no!';
}
?>
