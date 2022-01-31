<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
  </head>
  <body>

    <?php
      include 'resources/php/db.php';
      include 'resources/php/script.php';

      $DEFAULT_IMAGE = 'resources/img/test.svg';
      $IMAGE_UPLOAD_PATH = 'resources/uploads/img/';

      $COUNTER = 0;
    ?>



    <div class="Overlay">
      <div class="OverlayNav">
        <i class="icon-arrow-left2 overlayCloser"></i>
      </div>
      <div class="OverlayContent">
        <!-- <p id="showOverlayID">ID</p> -->



            <!-- <form method="post" action="" enctype="multipart/form-data">

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
            </form> -->


      </div>
    </div>


    <div class="Main">


      <div class="Navigation">
        <p id="dateandtime"></p>
      </div>


      <!----------------------------------------------------------------------->

      <div class="Section-1 Slider" data-size="1">
        <?php
          $zeile = $db -> prepare("SELECT * FROM cards WHERE row = '1'");
          $zeile -> execute();
          $db_result = $zeile -> fetchAll();

          foreach ($db_result as $spalte) {
            $TITEL = $spalte["titel"];
            $TEXT = $spalte["description"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["background"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["termin"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $ICON ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $TITEL ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $TEXT ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <?php } ?>
      </div>

      <!----------------------------------------------------------------------->

      <div class="Section-2 Slider" data-size="2">
        <?php
          $zeile = $db -> prepare("SELECT * FROM cards WHERE row = '2'");
          $zeile -> execute();
          $db_result = $zeile -> fetchAll();

          foreach ($db_result as $spalte) {
            $TITEL = $spalte["titel"];
            $TEXT = $spalte["description"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["background"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["termin"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $ICON ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $TITEL ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $TEXT ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <?php } ?>
      </div>

      <!----------------------------------------------------------------------->

      <div class="Section-3 Slider" data-size="3">
        <?php
          $zeile = $db -> prepare("SELECT * FROM cards WHERE row = '3'");
          $zeile -> execute();
          $db_result = $zeile -> fetchAll();

          foreach ($db_result as $spalte) {
            $TITEL = $spalte["titel"];
            $TEXT = $spalte["description"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["background"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["termin"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $ICON ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $TITEL ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $TEXT ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <?php } ?>
      </div>

      <!----------------------------------------------------------------------->

      <div class="Section-4 Slider" data-size="2">
        <?php
          $zeile = $db -> prepare("SELECT * FROM cards WHERE row = '4'");
          $zeile -> execute();
          $db_result = $zeile -> fetchAll();

          foreach ($db_result as $spalte) {
            $TITEL = $spalte["titel"];
            $TEXT = $spalte["description"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["background"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["termin"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $ICON ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $TITEL ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $TEXT ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <?php } ?>
      </div>

      <!----------------------------------------------------------------------->

    </div>

    <!-- SCRIPTGEDÖNS -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/nav.js"></script>
    <script src="resources/js/slick.js"></script>
    <script src="resources/js/slick.conf.js"></script>
    <script src="resources/js/script.js"></script>
    <script src="resources/js/manager.js"></script>
  </body>
</html>
