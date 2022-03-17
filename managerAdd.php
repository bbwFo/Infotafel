<link rel="stylesheet" href="resources/css/manager.css">
    <?php
      session_start();

      if ($_SESSION["login"] == 0) { header("Location: login.php"); }
    ?>

    <?php include 'resources/php/db_functions.php' ?>

    <?php

      // echo db_add('cards', array(
      //   'uuid' => 'test',
      //   'titel' => 'test',
      //   'description' => 'test',
      //   'row' => '1',
      //   'icon' => 'test',
      //   'color' => 'test',
      //   'style' => '1',
      //   'background' => 'test'
      // ));

      //
      // function db_add(string $TABLE, array $DATA)
      // {
      //   include 'resources/php/db.php';
      //
      //   $INDEX = '';
      //   $VALUE = '';
      //
      //   $X = array_keys($DATA);
      //   $Y = end($X);
      //
      //   foreach ($DATA as $INDEXES => $VALUES) {
      //
      //     if ($INDEXES == $Y)
      //     {
      //       $INDEX .= $INDEXES."";
      //       $VALUE .= "'".$VALUES."'";
      //     }
      //     else
      //     {
      //       $INDEX .= $INDEXES.", ";
      //       $VALUE .= "'".$VALUES."', ";
      //     }
      //   }
      //
      //   $EXEC_DATA = "INSERT INTO $TABLE ( $INDEX ) VALUES ( $VALUE )";
      //   $db -> exec($EXEC_DATA);
      // }
      //




      if (isset($_POST["titel"]) && isset($_POST["description"]) && isset($_POST["row"]) && isset($_POST["icon"]) && isset($_POST["color"]) && isset($_POST["style"]))
      {
        $UUID = gen_uuid('cards', '20', 'default');



        if (empty($_FILES['background']['name'])) { $BG = ''; } else { $BG = save_file('resources/uploads/img/', $_FILES['background'], $UUID); }
        if (empty($_FILES['pdf']['name'])) { $PDF = ''; } else { $PDF = save_file('resources/uploads/pdf/', $_FILES['pdf'], $UUID); }

        if (isset($_POST["termin"])) { $TERMIN =  $_POST["termin"]; } else { $TERMIN = ''; }
        if (isset($_POST["url"])) { $URL =  $_POST["url"]; } else { $URL = ''; }
        if (isset($_POST["html"])) { $HTML =  $_POST["html"]; } else { $HTML = ''; }

        db_add('cards', array(
          'uuid' => $UUID,
          'titel' => $_POST["titel"],
          'description' => $_POST["description"],
          'row' => $_POST["row"],
          'icon' => $_POST["icon"],
          'color' => $_POST["color"],
          'style' => $_POST["style"],
          'termin' => $TERMIN,
          'background' => $BG
        ));

        db_add('content', array(
          'uuid' => $UUID,
          'pdf' => $PDF,
          'url' => $URL,
          'html' => htmlentities($HTML)
        ));

        set_cookie('reload', '1', '1');

        header("Location: manager.php");
      }

    ?>

<div class="Modal_Screen_Overlay">
        <div class="Modal">
          <div class="Modal_Head">
            <div class="Modal_Head_Titel">
              <p>Neuen Eintrag erstellen</p>
            </div>
            <div class="Modal_Head_Button">
              <a href="manager.php"><i class="icon-close"></i></a>
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
                  <p class="info">Lege den Titel der Kachel fest. Nehme ein Thema oder ein Schlagword was den Inhalt sehenswert macht.</p>
                  <input type="text" name="titel" value="" autocomplete="off">
                  <p>Beschreibung</p>
                  <p class="info">Beschreibe kurz den Inhalt der Kachel und um was es sich handelt oder einfach was interresantes.</p>
                  <textarea name="description" rows="4" cols="20"></textarea>
                </div>
                <div class="ModalContentBodyItem" id="Box2">
                  <p>Reihe</p>
                  <p class="info">Lege hier den bereich fest in den die Kachel angezeigt wird.<br>Das 1. Level befindet sich ganz Oben auf dem Bildschirm.<br>Die Zahl der Kacheln in den optionen zeigt an wie viele Kacheln sich in den Level auf einer Seite im Sichtbereich gleichzeitig befinden.</p>
                  <select name="row"><?php foreach (db_foreach_values('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>">Level <?php echo $VAR["row"]; ?> - <?php echo $VAR["items"] ?> Kacheln</option><?php } ?></select>
                </div>
                <div class="ModalContentBodyItem" id="Box3">
                  <p>Icon</p>
                  <p class="info">Lege ein Icon fest das zu deinem Thema past.</p>
                  <select name="icon"><?php foreach (db_foreach_values('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?></select>
                  <p>Farbe</p>
                  <p class="info">Lege die Akzentfarbe fest.</p>
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


    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/manager.js"></script>
