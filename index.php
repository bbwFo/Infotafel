<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
  </head>
  <body>

    <?php include 'resources/php/db.php' ?>
    <?php include 'resources/php/script.php' ?>

    <?php

      $DEFAULT_IMAGE = 'resources/img/test.svg';

      $COUNTER = 0;

    ?>

    <div class="Overlay">
      <div class="OverlayNav">
        <i class="icon-arrow-left2 overlayCloser"></i>
      </div>
      <div class="OverlayContent">
        <p id="showOverlayID">ID</p>
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
            $TEXT = $spalte["text"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["image"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["date"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $IMAGE = $DEFAULT_IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $IMAGE ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
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
            $TEXT = $spalte["text"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["image"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["date"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $IMAGE = $DEFAULT_IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $IMAGE ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
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
            $TEXT = $spalte["text"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["image"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["date"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $IMAGE = $DEFAULT_IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $IMAGE ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
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
            $TEXT = $spalte["text"];
            $STYLE = $spalte["style"];
            $COLOR = $spalte["color"];
            $IMAGE = $spalte["image"];
            $ICON = $spalte["icon"];
            $DATE = $spalte["date"];

            $MONTH = getCalendarDate($DATE)['MONTH'];
            $DAY = getCalendarDate($DATE)['DAY'];

            if (empty($IMAGE)) { $IMAGE = $DEFAULT_IMAGE; }
            ?>

            <div class="Item" data-card_id="<?php echo $COUNTER++ ?>">
              <div class="ItemInner" style="border-color:<?php echo $COLOR ?>; --border-color:<?php echo $COLOR ?>; background-image:url(<?php echo $IMAGE ?>);" data-icon="<?php echo $ICON ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $STYLE ?>">
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
  </body>
</html>
