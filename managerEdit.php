<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ManagerEdit</title>
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

      if (isset($_GET['uuid']))
      {
        $UUID = $_GET['uuid'];

        $CARDS = db_get_values('cards', $UUID, 'all');
        $CONTENT = db_get_values('content', $UUID, 'all');
      }

      if (isset($_POST["titel"]) || isset($_POST["description"]) || isset($_POST["row"]) || isset($_POST["icon"]) || isset($_POST["color"]) || isset($_POST["style"]) || isset($_FILES['background']['name']) || isset($_FILES['pdf']['name']) || isset($_POST['url']) || isset($_POST['html']))
      {
        if (isset($_POST["titel"]) && $_POST["titel"] != $CARDS['titel']) { db_update('cards', $UUID, array('titel' => $_POST["titel"])); }
        if (isset($_POST["description"]) && $_POST["description"] != $CARDS['description']) { db_update('cards', $UUID, array('description' => $_POST["description"])); }
        if (isset($_POST["row"]) && $_POST["row"] != $CARDS['row']) { db_update('cards', $UUID, array('row' => $_POST["row"])); }
        if (isset($_POST["icon"]) && $_POST["icon"] != $CARDS['icon']) { db_update('cards', $UUID, array('icon' => $_POST["icon"])); }
        if (isset($_POST["color"]) && $_POST["color"] != $CARDS['color']) { db_update('cards', $UUID, array('color' => $_POST["color"])); }
        if (isset($_POST["style"]) && $_POST["style"] != $CARDS['style']) { db_update('cards', $UUID, array('style' => $_POST["style"])); }
        if (isset($_POST["termin"]) && $_POST["termin"] != $CARDS['termin']) { db_update('cards', $UUID, array('termin' => $_POST["termin"])); }
        if (!empty($_FILES['background']['name'])) { db_update('cards', $UUID, array('background' => save_file('resources/uploads/img/', $_FILES['background'], $UUID))); }
        if (!empty($_FILES['pdf']['name'])) { db_update('content', $UUID, array('pdf' => save_file('resources/uploads/img/', $_FILES['pdf'], $UUID))); }
        if (isset($_POST["url"]) && $_POST["url"] != $CONTENT['url']) { db_update('content', $UUID, array('url' => $_POST["url"])); }
        if (isset($_POST["html"]) && $_POST["html"] != $CONTENT['html']) { db_update('content', $UUID, array('html' => htmlentities($_POST["html"]))); }

        header("Location: manager.php");
      }



    ?>


    <div class="Main">

      <a class="LogoutLink" href="logout.php"><i class="icon-logout"></i></a>

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
              <label class="container" onclick='window.location.assign("#Box1")'>
                <input type="radio" name="radio" checked>
                <div class="checkmark"><p>Titel & Beschreibung</p></div>
              </label>
              <label class="container" onclick='window.location.assign("#Box2")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Reihe</p></div>
              </label>
              <label class="container" onclick='window.location.assign("#Box3")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Icon & Farbe</p></div>
              </label>
              <label class="container" onclick='window.location.assign("#Box5")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Aussehen</p></div>
              </label>
              <label class="container" onclick='window.location.assign("#Box7")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Content</p></div>
              </label>
              <hr>
              <label class="container" onclick='window.location.assign("#Box6")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Hintergrungbild</p></div>
              </label>
              <label class="container" onclick='window.location.assign("#Box4")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Termin</p></div>
              </label>
              <hr>
              <label class="container" onclick='window.location.assign("#Box8")'>
                <input type="radio" name="radio">
                <div class="checkmark"><p>Fertigstellen</p></div>
              </label>
            </div>
            <div class="ModalContentBody">
              <form method='post' accept-charset='UTF-8' enctype="multipart/form-data">

                <div class="ModalContentBodyItem" id="Box1">
                  <p>Titel</p>
                  <input type="text" name="titel" value="<?php echo $CARDS["titel"] ?>" autocomplete="off">
                  <p>Beschreibung</p>
                  <textarea name="description" rows="4" cols="20"><?php echo $CARDS["description"] ?></textarea>
                </div>

                <div class="ModalContentBodyItem" id="Box2">
                  <p>Reihe</p>
                  <p class="info">Lege hier den bereich fest in den die Kachel angezeigt wird.<br>Das 1. Level befindet sich ganz Oben auf dem Bildschirm.<br>Die Zahl der Kacheln in den optionen zeigt an wie viele Kacheln sich in den Level auf einer Seite im Sichtbereich gleichzeitig befinden.</p>
                  <select name="row"><option value="<?php echo $CARDS["row"] ?>"><?php echo $CARDS["row"] ?>. Reihe derzeit ausgewählt</option><?php foreach (db_foreach_values('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>">Level <?php echo $VAR["row"]; ?> - <?php echo $VAR["items"] ?> Kacheln</option><?php } ?></select>
                </div>

                <div class="ModalContentBodyItem" id="Box3">
                  <p>Icon</p>
                  <select name="icon"><option value="<?php echo $CARDS["icon"] ?>"><?php echo $CARDS["icon"] ?> ist derzeit ausgewählt</option><?php foreach (db_foreach_values('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?></select>
                  <p>Farbe</p>
                  <input type="color" name="color" value="<?php echo $CARDS["color"] ?>">
                </div>

                <div class="ModalContentBodyItem" id="Box4">
                  <p>Termin festlegen (optional)</p>
                  <p class="info">Es muss kein Termin angegeben werden. Das Datum ist auf der Kachel groß dargestellt.</p>
                  <input type="date" name="termin" value="<?php echo $CARDS["termin"] ?>">
                </div>

                <div class="ModalContentBodyItem" id="Box5">
                  <p>Aussehen (deaktiviert bei Termin)</p>
                  <p class="info">Ändert das Aussehen einer Kachel. (Wird deaktiviert wenn ein Termin festgelegt wurde)</p>
                  <select name="style"><option value="<?php echo $CARDS["style"] ?>"><?php echo $CARDS["style"] ?>.) Ist derzeit ausgewählt!</option><?php foreach (db_foreach_values('style') as $VAR) { ?><option value="<?php echo $VAR['style'] ?>"><?php echo $VAR['style'] ?>.) <?php echo $VAR['name'] ?> (<?php echo $VAR['description'] ?>)</option><?php } ?></select>
                </div>

                <div class="ModalContentBodyItem" id="Box6">
                  <p>Hintergrundbild (optional)</p>
                  <p class="info">Klicke auf den Kasten und lege ein Hintergrund bild für die gesamte Kachel fest.<br>(Nur .jpg, .jpeg, .png und .gif sind erlaubt!)</p>
                  <input  id="BgInput" type="file" name="background" onchange="readURL(this);" />
                  <div class="ImagePrevBox" id="ImagePrevBox">
                    <label for="BgInput"></label>
                    <img id="ImagePrev" src="">
                  </div>
                </div>

                <div class="ModalContentBodyItem" id="Box7">
                  <group>
                    <div class="input-container">
                      <input  onclick='window.location.assign("#ContentBox1")' type="radio" name="contentswitch" checked><label>PDF</label>
                    </div>
                    <div class="input-container">
                      <input  onclick='window.location.assign("#ContentBox2")' type="radio" name="contentswitch"><label>URL</label>
                    </div>
                    <div class="input-container">
                      <input  onclick='window.location.assign("#ContentBox3")' type="radio" name="contentswitch"><label>HTML</label>
                    </div>
                  </group>
                  <div class="ContentTypeBox">
                    <div class="ContentTypeBoxItem" id="ContentBox1">
                      <p class="info">Es kann nur eine PDF-Datei hochgeladen werden die größe der Datei ist aber egal!</p>
                      <input type="file" name="pdf" />
                    </div>
                    <div class="ContentTypeBoxItem" id="ContentBox2">
                      <p class="info">Nicht alle Webseiten Akzeptieren eine verbindung über einen iframe!</p>
                      <input type="url" name="url" value="<?php echo $CONTENT["url"] ?>" placeholder="https://open.mediadrake.net">
                    </div>
                    <div class="ContentTypeBoxItem" id="ContentBox3">
                      <textarea name="html" rows="10" cols="20" placeholder="<h1>Hello World!<h1><br><p style='color:green;'>My Name is Askylan! aka. HeavyMountainMax<p>"><?php echo $CONTENT["html"] ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="ModalContentBodyItem" id="Box8">
                  <button type="submit" id="upload">Eintrag anlegen</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>


    </div>

    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>

  </body>
</html>
