<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/manager.css">
  </head>
  <body>
    <?php
      session_start();

      if ($_SESSION["login"] == 0) { header("Location: login.php"); }
    ?>

    <?php include 'resources/php/db.php' ?>
    <?php include 'resources/php/db_functions.php' ?>


    <div class="Main">

      <a class="LogoutLink" href="logout.php"><i class="icon-logout"></i></a>
      <!-- <div class="MainItem" add><i class="icon-add"></i><p>Hinzufügen</p></div>
      <div class="MainItem" show><i class="icon-grid"></i><p>Alle anzeigen</p></div>
      <div class="MainItem" edit><i class="icon-edit"></i><p>Bearbeiten</p></div>
      <div class="MainItem" delete><i class="icon-delete"></i><p>Löschen</p></div> -->






      <ol>
        <a href="managerAdd.php"><i class="icon-add"></i>Hinzufügen</a>
        <?php
        foreach (db_foreach_values('cards') as $VALUE)
        {
          ?>
            <li>Level <?php echo $VALUE['row'] ?> - <?php echo $VALUE['titel'] ?> - <?php echo $VALUE['description'] ?>
              <a href="managerEdit.php?uuid=<?php echo $VALUE['uuid'] ?>"><i class="icon-edit"></i>Bearbeiten</a>
              <a href="managerDelete.php?uuid=<?php echo $VALUE['uuid'] ?>"><i class="icon-bin"></i>Löschen</a>
            </li>
          <?php
        }
        ?>
      </ol>



    </div>



    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>

  </body>
</html>
