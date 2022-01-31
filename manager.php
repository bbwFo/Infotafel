<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
  </head>
  <body>

    <?php include 'resources/php/db.php' ?>

    <form method="post" action="" enctype="multipart/form-data">

      <p>Titel</p>
      <input id="input_titel" type="text" name="" value="">
      <br>

      <p>Beschreibung</p>
      <textarea id="input_description" name="name" rows="4" cols="20"></textarea>
      <br>

      <p>Reihe</p>
      <select id="input_row" class="" name="">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br>

      <p>Icon</p>
      <select id="input_icon" class="" name="">
        <?php
          $zeile = $db -> prepare("SELECT * FROM icons");
          $zeile -> execute();
          $db_result = $zeile -> fetchAll();

          foreach ($db_result as $spalte) {
            $ICON_NAME = $spalte["name"];
            $ICON_UNICODE = $spalte["unicode"]; ?>

            <option value="<?php echo $ICON_UNICODE ?>"><?php echo $ICON_UNICODE ?> <?php echo $ICON_NAME ?></option>
        <?php } ?>
      </select>

      <br>

      <p>Farbe</p>
      <input id="input_color" type="color" name="" value="#ffffff">
      <br>

      Kachel-Typ (deaktiviert bei Termin)
      <select id="input_style" class="" name="">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br>

      <p>Termin festlegen</p>
      <input id="input_termin" type="date" name="" value="">
      <br>



      <p>Hintergrundbild</p>
      <input id="input_background" type="file" name="file" />
      <br>

      <button type="button" id="upload">Eintrag anlegen</button>
    </form>



    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>

  </body>
</html>
