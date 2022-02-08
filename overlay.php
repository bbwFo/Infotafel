<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Overlay</title>
    <link rel="stylesheet" href="resources/css/overlay.css">
  </head>
  <body style="color: #fff;">

    <?php

      include 'resources/php/db_functions.php';

      if (isset($_GET['uuid']))
      {
        $OVER_CARD = get_values('cards', $_GET['uuid'], array('titel','description'));

        $OVER_CONTENT = get_values('content', $_GET['uuid'], array('pdf','url','html'));



        if (isset($OVER_CONTENT['pdf']))
        {
          ?>


          <iframe src="resources/uploads/pdf/<?php echo $OVER_CONTENT['pdf'] ?>#toolbar=0"></iframe>



          <?php
        }
        else if (isset($OVER_CONTENT['url']))
        {
          ?><iframe src="<?php echo $OVER_CONTENT['url'] ?>"></iframe><?php
        }
        else if (isset($OVER_CONTENT['html']))
        {
          ?>
          <div class="OverlayHTML"><?php echo $OVER_CONTENT['html'] ?></div>
          <?php
        }
      }
    ?>











  </body>
</html>
