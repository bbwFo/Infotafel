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


      <div class="ModalFrame" id="ModalFrame">

      </div>


      <div class="MainHead">Infotafel-Manager</div>
      <div class="MainMenu">
        <div class="Modal_Content_Menu">
          <label class="container" onclick='window.location.assign("#Box1")'>
            <input type="radio" name="menuradio" checked>
            <div class="checkmark"><p>Dashbord<i class="icon-equalizer1"></i></p></div>
          </label>
          <hr>
          <label class="container" onclick='openAddModal();'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Hinzufügen<i class="icon-edit"></i></p></div>
          </label>
          <hr>
          <label class="container" onclick='window.location.assign("#Box3")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>1. Level<i class="icon-format_list_bulleted"></i></p></div>
          </label>
          <label class="container" onclick='window.location.assign("#Box5")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>2. Level<i class="icon-format_list_bulleted"></i></p></div>
          </label>
          <label class="container" onclick='window.location.assign("#Box7")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>3. Level<i class="icon-format_list_bulleted"></i></p></div>
          </label>
          <label class="container" onclick='window.location.assign("#Box7")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>4. Level<i class="icon-format_list_bulleted"></i></p></div>
          </label>
          <hr>
          <label class="container" onclick='window.location.assign("#Box1")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Einstellungen<i class="icon-settings1"></i></p></div>
          </label>
          <!-- <hr>
          <button type="button"><p>Ausloggen<i class="icon-logout"></i></p></button> -->

          <hr>
          <label class="container" onclick='window.location.assign("logout.php")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Ausloggen<i class="icon-logout"></i></p></div>
          </label>
          <p class="copyright">&copy; HeavyMountainMax - 2022</p>
        </div>
      </div>
      <div class="MainBody">

        <ol>

          <?php
          foreach (db_foreach_values('cards') as $VALUE)
          {
            ?>
              <li>
                Level <?php echo $VALUE['row'] ?> - <?php echo $VALUE['titel'] ?> - <?php echo $VALUE['description'] ?>
                <button type="button" onclick="openEditModal('<?php echo $VALUE['uuid'] ?>');"><i class="icon-edit"></i></button>
                <button type="button" onclick="deleteCard('<?php echo $VALUE['uuid'] ?>');"><i class="icon-bin"></i></button>
              </li>
            <?php
          }
          ?>
        </ol>

      </div>

    </div>


    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>


  </body>
</html>
