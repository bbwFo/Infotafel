<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/php/db.php"); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/animate.css">
  </head>
  <body>

    <?php include("resources/php/db.php"); ?>

    <!-- <img class="BodyBg" id="Bg"> -->

    <div class="Frame" id="Frame">

      <div class="Nav">
        <p class="Logo"><span class="Block"></span>IT-Infotafel</p>

        <p class="dateandtime" id="dateandtime"></p>
        <nav>
          <ul>
            <!-- <li class="active"><p id="NavBut1"><i class="icon-info_outline"></i>Information</p></li> -->
            <!-- <li><p id="NavBut2"><i class="icon-school"></i>Schulplan</p></li> -->
            <!-- <li><p id="NavBut3"><i class="icon-fastfood"></i>Essensplan</p></li> -->
            <!-- <li><p id="NavBut3"><i class="icon-attach_file"></i>Unterlagen</p></li> -->
            <!-- <li><p id="NavBut3"><i class="icon-settings"></i>Einstellungen</p></li> -->
          </ul>
        </nav>
      </div>

      <!-- <span class="preloader" id="preloader"><i class="icon-spinner9"></i></span> -->





      <!-- PAGE-CONTENT -->
      <div class="Content" id="Content">





        <!-- <div class="Slider" data-size="1">

          <div class="Item">
            <div class="ItemInner" data-type="img">
              <img src=".files/test.png">
              <div class="ImgOverlay"></div>
            </div>
          </div>

          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
        </div> -->





        <?php

          $db_zeile = $db -> prepare("SELECT * FROM slider");
          $db_zeile -> execute();
          $NEUEVAR = $db_zeile->fetchAll();

          foreach ($NEUEVAR as $wert) {

            $slider_id = utf8_encode($wert["id"]);
            $slider_size = utf8_encode($wert["size"]);
            $slider_row = utf8_encode($wert["row"]);
        ?>

        <div class="Slider animate__animated animate__backInDown" data-size="<?php echo $slider_size; ?>" data-slider="<?php echo $slider_row ?>" style="order:<?php echo $slider_row ?>;">

          <?php
            $db_zeile2 = $db -> prepare("SELECT * FROM item WHERE slider_id = '$slider_id'");
            $db_zeile2 -> execute();
            $NEUEVAR2 = $db_zeile2->fetchAll();

            foreach ($NEUEVAR2 as $wert2) {

              $item_style = utf8_encode($wert2["style"]);
              $item_link = utf8_encode($wert2["link"]);
              $item_tag = utf8_encode($wert2["tag"]);
              $item_titel = utf8_encode($wert2["titel"]);
              $item_text = utf8_encode($wert2["text"]);
              $item_image = utf8_encode($wert2["img"]);
              $item_badge = utf8_encode($wert2["badge"]);
          ?>

            <div class="Item">


              <?php
                $db_zeile3 = $db -> prepare("SELECT * FROM tags WHERE id = '$item_tag'");
                $db_zeile3 -> execute();
                $NEUEVAR3 = $db_zeile3->fetchAll();

                foreach ($NEUEVAR3 as $wert3) {

                  $tag_name = utf8_encode($wert3["name"]);
                  $tag_color = utf8_encode($wert3["color"]);
                  $tag_icon = utf8_encode($wert3["icon"]);

                } ?>


              <div class="ItemInner"<?php if ($item_badge == 1) { ?> style="border-color:<?php echo $tag_color ?>" <?php } ?>>

                <?php if ($item_badge == 1) { ?>

                  <div class="Badge" style="background:<?php echo $tag_color ?>">
                    <i class="<?php echo $tag_icon ?>"></i>
                  </div>

                <?php } ?>


                <!-- STYLE 0 ################################################# -->
                <?php if ($item_style == 0) { ?>

                  <img src="<?php echo $item_image ?>">
                  <div class="ImgOverlay">
                    <?php if ($item_badge == 0) { ?>
                      <div class="Icon">
                        <?php if ($item_badge == 0) { ?>
                          <i class="<?php echo $tag_icon ?>"></i>
                        <?php } ?>
                      </div>
                    <?php } ?>

                    <div class="ItemContent">
                      <div class="Titel"><p><?php echo $item_titel ?></p></div>
                      <div class="Text"><p><?php echo $item_text ?></p></div>
                    </div>
                  </div>

                <?php } ?>

                <!-- STYLE 1 ################################################# -->
                <?php if ($item_style == 1) { ?>

                  <img src="<?php echo $item_image ?>">
                  <div class="Titel_Style_1"><p>
                    <?php if ($item_badge == 0) {
                      ?><i class="<?php echo $tag_icon ?>"></i><?php
                    } ?>
                    <?php echo $item_titel ?></p></div>

                <?php } ?>

                <!-- STYLE 2 ################################################# -->
                <?php if ($item_style == 2) { ?>

                  <img src="<?php echo $item_image ?>">

                <?php } ?>

                <!-- STYLE 3 ################################################# -->









              </div>
            </div>

          <?php } ?>

        </div>

        <?php } ?>








        <!-- <div class="Slider" data-size="2">
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
        </div>

        <div class="Slider" data-size="3">
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
        </div>

        <div class="Slider" data-size="2">
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
          <div class="Item"><div class="ItemInner"></div></div>
        </div>

      </div> -->






    </div>

    <!-- Sriptgedöns -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/nav.js"></script>
    <script src="resources/js/slick.min.js"></script>
    <script src="resources/js/slick.conf.js"></script>
    <script src="resources/js/marquee.js"></script>
    <script src="resources/js/bg.js"></script>
    <script src="resources/js/script.js"></script>

  </body>
</html>
