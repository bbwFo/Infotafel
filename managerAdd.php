<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ManagerAdd</title>
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

      if (isset($_POST["titel"]) && isset($_POST["description"]) && isset($_POST["row"]) && isset($_POST["icon"]) && isset($_POST["color"]) && isset($_POST["style"]) && isset($_FILES['background']['name']) && isset($_FILES['pdf']['name']) && isset($_POST['url']) && isset($_POST['html']))
      {
        $UUID = gen_uuid('cards', '20', 'default');

        db_add('cards', array(
          'uuid' => $UUID,
          'titel' => $_POST["titel"],
          'description' => $_POST["description"],
          'row' => $_POST["row"],
          'icon' => $_POST["icon"],
          'color' => $_POST["color"],
          'style' => $_POST["style"],
          'termin' => $_POST["termin"],
          'background' => save_file('resources/uploads/img/', $_FILES['background'], $UUID)
        ));

        db_add('content', array(
          'uuid' => $UUID,
          'pdf' => save_file('resources/uploads/pdf/', $_FILES['pdf'], $UUID),
          'url' => $_POST["url"],
          'html' => htmlentities($_POST["html"])
        ));

        header("Location: manager.php");
      }

    ?>


    <div class="Main">


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
                  <input type="text" name="titel" value="" autocomplete="off">
                  <p>Beschreibung</p>
                  <textarea name="description" rows="4" cols="20"></textarea>
                </div>
                <div class="ModalContentBodyItem" id="Box2">
                  <p>Reihe</p>
                  <p class="info">Lege hier den bereich fest in den die Kachel angezeigt wird.<br>Das 1. Level befindet sich ganz Oben auf dem Bildschirm.<br>Die Zahl der Kacheln in den optionen zeigt an wie viele Kacheln sich in den Level auf einer Seite im Sichtbereich gleichzeitig befinden.</p>
                  <select name="row"><?php foreach (db_foreach_values('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>">Level <?php echo $VAR["row"]; ?> - <?php echo $VAR["items"] ?> Kacheln</option><?php } ?></select>
                </div>
                <div class="ModalContentBodyItem" id="Box3">
                  <p>Icon</p>
                  <select name="icon"><?php foreach (db_foreach_values('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?></select>
                  <p>Farbe</p>
                  <input type="color" name="color" value="#ffffff">
                </div>
                <div class="ModalContentBodyItem" id="Box4">
                  <p>Termin festlegen (optional)</p>
                  <p class="info">Es muss kein Termin angegeben werden. Das Datum ist auf der Kachel groß dargestellt.</p>
                  <input type="date" name="termin" value="">
                </div>
                <div class="ModalContentBodyItem" id="Box5">
                  <p>Aussehen (deaktiviert bei Termin)</p>
                  <p class="info">Ändert das Aussehen einer Kachel. (Wird deaktiviert wenn ein Termin festgelegt wurde)</p>
                  <select name="style"><?php foreach (db_foreach_values('style') as $VAR) { ?><option value="<?php echo $VAR['style'] ?>"><?php echo $VAR['style'] ?> <?php echo $VAR['name'] ?> (<?php echo $VAR['description'] ?>)</option><?php } ?></select>
                </div>
                <div class="ModalContentBodyItem" id="Box6">
                  <p>Hintergrundbild (optional)</p>
                  <p class="info">Klicke auf den Kasten und lege ein Hintergrund bild für die gesamte Kachel fest.<br>(Nur .jpg, .jpeg, .png und .gif sind erlaubt!)</p>
                  <input  id="BgInput" type="file" name="background" onchange="readURL(this);" />
                  <div class="ImagePrevBox" id="ImagePrevBox">
                    <label for="BgInput"></label>
                    <img id="ImagePrev" src="#" />
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
                      <input type="url" name="url" value="" placeholder="https://open.mediadrake.net">
                    </div>
                    <div class="ContentTypeBoxItem" id="ContentBox3">
                      <textarea name="html" rows="10" cols="20" placeholder="<h1>Hello World!<h1><br><p style='color:green;'>My Name is Askylan! aka. HeavyMountainMax<p>"></textarea>
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
