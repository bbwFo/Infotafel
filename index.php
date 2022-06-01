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
      include 'resources/php/simple-php.php';
      // include 'resources/php/db_functions.php';

      $DEFAULT_IMAGE = 'resources/img/test.svg';
      $IMAGE_UPLOAD_PATH = 'resources/uploads/img/';

    ?>



    <div class="Overlay">
      <div class="OverlayNav">

        <i class="icon-arrow-left2 overlayCloser"></i>

      </div>
      <div class="OverlayContent" id="OverlayContent">

        <iframe id="OverlayContentIframe"></iframe>

      </div>
    </div>


    <div class="Main" id="Main">


      <div class="Navigation">
        <p id="dateandtime"></p>
      </div>


      <!----------------------------------------------------------------------->

      <div class="Section-1 Slider" data-size="1">
        <?php
          $zeile = $db -> prepare("SELECT * FROM cards WHERE row = '1'");
          $zeile -> execute();
          $db_result = $zeile -> fetchAll();

          foreach ($db_result as $VALUE)
          {
            $MONTH = getCalendarDate($VALUE["termin"])['MONTH'];
            $DAY = getCalendarDate($VALUE["termin"])['DAY'];

            if (empty($VALUE["background"])) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$VALUE["background"]; }
            ?>

            <div class="Item" data-card_id="<?php echo $VALUE['id'] ?>">
              <div class="ItemInner" style="border-color:<?php echo $VALUE["color"] ?>; --border-color:<?php echo $VALUE["color"] ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $VALUE["icon"] ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $VALUE["style"] ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $VALUE["icon"] ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $VALUE["titel"] ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $VALUE["description"] ?></p>
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

          foreach ($db_result as $VALUE)
          {
            $MONTH = getCalendarDate($VALUE["termin"])['MONTH'];
            $DAY = getCalendarDate($VALUE["termin"])['DAY'];

            if (empty($VALUE["background"])) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$VALUE["background"]; }
            ?>

            <div class="Item" data-card_id="<?php echo $VALUE['id'] ?>">
              <div class="ItemInner" style="border-color:<?php echo $VALUE["color"] ?>; --border-color:<?php echo $VALUE["color"] ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $VALUE["icon"] ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $VALUE["style"] ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $VALUE["icon"] ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $VALUE["titel"] ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $VALUE["description"] ?></p>
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

          foreach ($db_result as $VALUE)
          {
            $MONTH = getCalendarDate($VALUE["termin"])['MONTH'];
            $DAY = getCalendarDate($VALUE["termin"])['DAY'];

            if (empty($VALUE["background"])) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$VALUE["background"]; }
            ?>

            <div class="Item" data-card_id="<?php echo $VALUE['id'] ?>">
              <div class="ItemInner" style="border-color:<?php echo $VALUE["color"] ?>; --border-color:<?php echo $VALUE["color"] ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $VALUE["icon"] ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $VALUE["style"] ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $VALUE["icon"] ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $VALUE["titel"] ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $VALUE["description"] ?></p>
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

          foreach ($db_result as $VALUE)
          {
            $MONTH = getCalendarDate($VALUE["termin"])['MONTH'];
            $DAY = getCalendarDate($VALUE["termin"])['DAY'];

            if (empty($VALUE["background"])) { $BACKGROUND_IMG = $DEFAULT_IMAGE; }
            else { $BACKGROUND_IMG = $IMAGE_UPLOAD_PATH.$VALUE["background"]; }
            ?>

            <div class="Item" data-card_id="<?php echo $VALUE['id'] ?>">
              <div class="ItemInner" style="border-color:<?php echo $VALUE["color"] ?>; --border-color:<?php echo $VALUE["color"] ?>; background-image:url(<?php echo $BACKGROUND_IMG ?>);" data-icon="<?php echo $VALUE["icon"] ?>" data-date_month="<?php echo $MONTH ?>" data-date_day="<?php echo $DAY ?>" data-style="<?php echo $VALUE["style"] ?>">
                <div class="ItemInnerBox">
                  <div class="IconBox" data-icon="<?php echo $VALUE["icon"] ?>"></div>
                  <div class="TextBox">
                    <div class="Titel">
                      <p><?php echo $VALUE["titel"] ?></p>
                    </div>
                    <div class="Text">
                      <p><?php echo $VALUE["description"] ?></p>
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
