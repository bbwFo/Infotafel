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

      if ($_SESSION["login"] == 0)
      {
        header("Location: login.php");
      }
    ?>

    <?php include 'resources/php/db.php' ?>
    <?php include 'resources/php/db_functions.php' ?>


    <?php
      if (isset($_POST["titel"]) && isset($_POST["description"]) && isset($_POST["row"]) && isset($_POST["icon"]) && isset($_POST["color"]) && isset($_POST["style"]) && isset($_FILES['file']['name']))
      {
        $UUID = gen_uuid();

        $FILENAME = file_save('resources/uploads/img/', $_FILES['file'], $UUID);

        db_add('cards', array(
          'uuid' => $UUID,
          'titel' => $_POST["titel"],
          'description' => $_POST["description"],
          'row' => $_POST["row"],
          'icon' => $_POST["icon"],
          'color' => $_POST["color"],
          'style' => $_POST["style"],
          'termin' => $_POST["termin"],
          'background' => $FILENAME
        ));
      }
    ?>

    <!-- <form method='post' accept-charset='UTF-8' enctype="multipart/form-data">

      <p>Titel</p>
      <input id="input_titel" type="text" name="titel" value="">
      <br>

      <p>Beschreibung</p>
      <textarea id="input_description" name="description" rows="4" cols="20"></textarea>
      <br>

      <p>Reihe</p>
      <select id="input_row" class="" name="row">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br>

      <p>Icon</p>
      <select id="input_icon" class="" name="icon">
        <?php
          foreach (get_all_values('icons') as $spalte)
          {
            $ICON_NAME = $spalte["name"];
            $ICON_UNICODE = $spalte["unicode"]; ?>

            <option value="<?php echo $ICON_UNICODE ?>"><?php echo $ICON_UNICODE ?> <?php echo $ICON_NAME ?></option>
        <?php } ?>
      </select>

      <br>

      <p>Farbe</p>
      <input id="input_color" type="color" name="color" value="#ffffff">
      <br>

      Kachel-Typ (deaktiviert bei Termin)
      <select id="input_style" class="" name="style">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br>

      <p>Termin festlegen</p>
      <input id="input_termin" type="date" name="termin" value="">
      <br>



      <p>Hintergrundbild</p>
      <input id="input_background" type="file" name="file" />
      <br>

      <button type="submit" id="upload">Eintrag anlegen</button>
    </form> -->



    <!-- <div class="DatabaseTable">
      <?php
      foreach (get_all_values('cards') as $VALUE)
      {

        ?><div class="DatabaseTableRow">
            <input type="text" name="" value="<?php echo $VALUE["titel"] ?>">
            <input type="text" name="" value="<?php echo $VALUE["description"] ?>">
            <select name="">
              <?php
              foreach (get_all_values('areas') as $DB_VALUE)
              {
                if ($DB_VALUE["row"] == $VALUE["row"])
                {
                  ?><option value="<?php echo $DB_VALUE["row"] ?>" selected><?php echo $DB_VALUE["row"] ?></option><?php
                }
                else
                {
                  ?><option value="<?php echo $DB_VALUE["row"] ?>"><?php echo $DB_VALUE["row"] ?></option><?php
                }
              }
              ?>
            </select>
            <select name="">
              <?php
              foreach (get_all_values('icons') as $DB_VALUE)
              {
                if ($DB_VALUE["unicode"] == $VALUE["icon"])
                {
                  ?><option value="<?php echo $DB_VALUE["unicode"] ?>" selected><?php echo $DB_VALUE["unicode"] ?> <?php echo $DB_VALUE["name"] ?></option><?php
                }
                else
                {
                  ?><option value="<?php echo $DB_VALUE["unicode"] ?>"><?php echo $DB_VALUE["unicode"] ?> <?php echo $DB_VALUE["name"] ?></option><?php
                }
              }
              ?>
            </select>
            <input type="color" name="" value="<?php echo $VALUE["color"] ?>">
            <select name="">
              <?php
              foreach (get_all_values('style') as $DB_VALUE)
              {
                if ($DB_VALUE["style"] == $VALUE["style"])
                {
                  ?><option value="<?php echo $DB_VALUE["style"] ?>" selected><?php echo $DB_VALUE["style"] ?> <?php echo $DB_VALUE["name"] ?> (<?php echo $DB_VALUE["description"] ?>)</option><?php
                }
                else
                {
                  ?><option value="<?php echo $DB_VALUE["style"] ?>"><?php echo $DB_VALUE["style"] ?> <?php echo $DB_VALUE["name"] ?> (<?php echo $DB_VALUE["description"] ?>)</option><?php
                }
              }
              ?>
            </select>
            <input type="date" name="" value="<?php echo $VALUE["termin"] ?>">

            <input type="file" name="" value="">

            <i class="icon-save"></i>
            <i class="icon-delete"></i>

          </div><?php
      } ?>
    </div> -->








    <div class="Main">

      <a class="LogoutLink" href="manager_logout.php"><i class="icon-logout"></i></a>
      <div class="MainItem" add><i class="icon-add"></i><p>Hinzufügen</p></div>
      <div class="MainItem" show><i class="icon-grid"></i><p>Alle anzeigen</p></div>
      <div class="MainItem" edit><i class="icon-edit"></i><p>Bearbeiten</p></div>
      <div class="MainItem" delete><i class="icon-delete"></i><p>Löschen</p></div>

    </div>



    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>

  </body>
</html>
