<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ManagerDelete</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/manager.css">
  </head>
  <body>
    <?php
      session_start();

      if ($_SESSION["login"] == 0) { header("Location: login.php"); }
    ?>

    <?php include 'resources/php/db_functions.php' ?>

    <?php

      if (isset($_GET['id']))
      {
        $UUID = $_GET['id'];


        $BACKGROUND = db_get_values('cards', $UUID, 'all');
        $PDF = db_get_values('content', $UUID, 'all');

        unlink('resources/uploads/img/'.$BACKGROUND['background']);
        unlink('resources/uploads/pdf/'.$PDF['pdf']);



        db_delete('cards', $UUID);
        db_delete('content', $UUID);

        set_cookie('reload', '1', '1');

        header("Location: manager.php");
      }



    ?>


    <div class="Main">




    </div>

    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>

  </body>
</html>
