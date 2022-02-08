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
      <!-- <div class="MainItem" add><i class="icon-add"></i><p>Hinzufügen</p></div>
      <div class="MainItem" show><i class="icon-grid"></i><p>Alle anzeigen</p></div>
      <div class="MainItem" edit><i class="icon-edit"></i><p>Bearbeiten</p></div>
      <div class="MainItem" delete><i class="icon-delete"></i><p>Löschen</p></div> -->


      <?php
        // if (isset($_FILES['pdf']['name']))
        // {
        //   $UUID = gen_uuid();
        //
        //   echo file_save('resources/uploads/img/', $_FILES['pdf'], $UUID);
        //
        //   // db_add('content', array(
        //   //   'uuid' => $UUID,
        //   //   'pdf' => $PDF_NAME
        //   // ));
        //
        // }






      ?>

      <!-- <form method='post' accept-charset='UTF-8' enctype="multipart/form-data">
        <input type="file" name="pdf" />
        <br>
        <button type="submit" id="upload">Eintrag anlegen</button>
      </form> -->


      <?php
        if (isset($_POST["titel"]) && isset($_POST["description"]) && isset($_POST["row"]) && isset($_POST["icon"]) && isset($_POST["color"]) && isset($_POST["style"]) && isset($_FILES['file']['name']))
        {
          $UUID = gen_uuid();

          $BACKGROUND_NAME = file_save('resources/uploads/img/', $_FILES['file'], $UUID);

          db_add('cards', array(
            'uuid' => $UUID,
            'titel' => $_POST["titel"],
            'description' => $_POST["description"],
            'row' => $_POST["row"],
            'icon' => $_POST["icon"],
            'color' => $_POST["color"],
            'style' => $_POST["style"],
            'termin' => $_POST["termin"],
            'background' => $BACKGROUND_NAME
          ));

          $PDF_NAME = file_save('resources/uploads/pdf/', $_FILES['pdf'], $UUID);

          db_add('content', array(
            'uuid' => $UUID,
            'pdf' => $PDF_NAME,
            'url' => $_POST["url"],
            'html' => $_POST["html"]
          ));

        }
      ?>


      <div class="Modal_Screen_Overlay">
        <div class="Modal">

          <div class="Modal_Head">
            <div class="Modal_Head_Titel">
              <p>Neuen Eintrag erstellen</p>
            </div>
            <div class="Modal_Head_Button">
              <i class="icon-close"></i>
            </div>
          </div>

          <div class="Modal_Content">
            <div class="Modal_Content_Menu">
              <label class="container"onclick='window.location.assign("#Box1")'>
                <input type="radio" checked="checked" name="radio">
                <div class="checkmark"><p>Titel</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box2")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Beschreibung</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box3")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Reihe</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box4")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Icon</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box5")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Farbe</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box6")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Termin (optional)</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box7")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Kacheltype</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box8")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Hintergrungbild</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box9")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Content</p></div>
              </label>

              <label class="container"onclick='window.location.assign("#Box10")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Fertigstellen</p></div>
              </label>

            </div>
            <div class="ModalContentBody">

              <form method='post' accept-charset='UTF-8' enctype="multipart/form-data">

                <div class="ModalContentBodyItem" id="Box1">
                  <p>Titel</p>
                  <input type="text" name="titel" value="">
                </div>

                <div class="ModalContentBodyItem" id="Box2">
                  <p>Beschreibung</p>
                  <textarea name="description" rows="4" cols="20"></textarea>
                </div>

                <div class="ModalContentBodyItem" id="Box3">
                  <p>Reihe</p>
                  <select name="row"><?php foreach (get_all_values('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>"><?php echo $VAR["row"]; ?> Reihe (<?php echo $VAR["items"] ?> Items)</option><?php } ?></select>
                </div>

                <div class="ModalContentBodyItem" id="Box4">
                  <p>Icon</p>
                  <select name="icon"><?php foreach (get_all_values('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?></select>
                </div>

                <div class="ModalContentBodyItem" id="Box5">
                  <p>Farbe</p>
                  <input type="color" name="color" value="#ffffff">
                </div>

                <div class="ModalContentBodyItem" id="Box6">
                  <p>Termin festlegen (optional)</p>
                  <p class="info">Es muss kein Termin angegeben werden. Das Datum ist auf der Kachel groß dargestellt.</p>
                  <input type="date" name="termin" value="">
                </div>

                <div class="ModalContentBodyItem" id="Box7">
                  <p>Kachel-Typ (deaktiviert bei Termin)</p>
                  <p class="info">Ändert das Aussehen einer Kachel. (Wird deaktiviert wenn ein Termin festgelegt wurde)</p>
                  <select name="style"><?php foreach (get_all_values('style') as $VAR) { ?><option value="<?php echo $VAR['style'] ?>"><?php echo $VAR['style'] ?> <?php echo $VAR['name'] ?> (<?php echo $VAR['description'] ?>)</option><?php } ?></select>
                </div>

                <div class="ModalContentBodyItem" id="Box8">
                  <p>Hintergrundbild</p>
                  <p class="info">Lege ein Hintergrund bild für die Kachel fest (.jpg, .jpeg, .png, .gif)</p>
                  <input type="file" name="file" />
                </div>


                <div class="ModalContentBodyItem" id="Box9">
                  <p>PDF</p>
                  <input type="file" name="pdf" />
                  <p>URL</p>
                  <input type="url" name="url" value="">
                  <p>HTML</p>
                  <textarea name="html" rows="4" cols="20"></textarea>
                </div>

                <div class="ModalContentBodyItem" id="Box10">
                  <button type="submit" id="upload">Eintrag anlegen</button>
                </div>



              </form>




            </div>
          </div>

        </div>


      </div>





      <!-- <form method='post' accept-charset='UTF-8' enctype="multipart/form-data">

        <p>Titel</p>
        <input type="text" name="titel" value="">
        <br>

        <p>Beschreibung</p>
        <textarea name="description" rows="4" cols="20"></textarea>
        <br>

        <p>Reihe</p>
        <select name="row"><?php foreach (get_all_values('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>"><?php echo $VAR["row"]; ?> Reihe (<?php echo $VAR["items"] ?> Items)</option><?php } ?></select>
        <br>

        <p>Icon</p>
        <select name="icon"><?php foreach (get_all_values('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?></select>
        <br>

        <p>Farbe</p>
        <input type="color" name="color" value="#ffffff">
        <br>

        Kachel-Typ (deaktiviert bei Termin)
        <select name="style"><?php foreach (get_all_values('style') as $VAR) { ?><option value="<?php echo $VAR['style'] ?>"><?php echo $VAR['style'] ?> <?php echo $VAR['name'] ?> (<?php echo $VAR['description'] ?>)</option><?php } ?></select>
        <br>

        <p>Termin festlegen (optional)</p>
        <input type="date" name="termin" value="">
        <br>

        <p>Hintergrundbild</p>
        <input type="file" name="file" />
        <br>

        <hr>
        <br>

        <p>PDF</p>
        <input type="file" name="pdf" />
        <br>

        <p>URL</p>
        <input type="url" name="url" value="">
        <br>

        <p>HTML</p>
        <textarea name="html" rows="4" cols="20"></textarea>
        <br>

        <hr>
        <br>

        <button type="submit" id="upload">Eintrag anlegen</button>
      </form> -->








    </div>



    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>

  </body>
</html>
