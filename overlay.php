<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Overlay</title>
    <link rel="stylesheet" href="resources/css/overlay.css">
  </head>
  <body style="color: #fff;">

    <?php

      include 'resources/php/simple-php.php';

      if (isset($_GET['uuid']))
      {

        $DATA = db_get('cards', 'id', $_GET['uuid'], 'all');




        if (!empty($DATA['pdf']))
        {
          ?>
          <iframe src="resources/uploads/pdf/<?php echo $DATA['pdf'] ?>#toolbar=0"></iframe>
          <?php
        }
        else if (!empty($DATA['url']))
        {
          ?><iframe sandbox src="<?php echo $DATA['url'] ?>"></iframe><?php
        }
        else if (!empty($DATA['html']))
        {
          ?>
          <div class="OverlayHTML"><?php echo $DATA['html'] ?></div>
          <?php
        }
      }
    ?>











  </body>
</html>
