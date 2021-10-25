<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/php/db.php"); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
  </head>
  <body>

    <!-- <img class="BodyBg" id="Bg"> -->

    <div class="Frame" id="Frame">

      <div class="Nav">
        <p class="Logo"><span class="Block"></span>IT-Infotafel</p>
        <nav>
          <ul>
            <li class="active"><p id="NavBut1"><i class="icon-info_outline"></i>Information</p></li>
            <li><p id="NavBut2"><i class="icon-school"></i>Schulplan</p></li>
            <li><p id="NavBut3"><i class="icon-fastfood"></i>Essensplan</p></li>
            <li><p id="NavBut3"><i class="icon-attach_file"></i>Unterlagen</p></li>
            <li><p id="NavBut3"><i class="icon-settings"></i>Einstellungen</p></li>
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
          include("resources/php/db.php");

          // error_reporting(0);

          $db_zeile = $db -> prepare("SELECT * FROM slider");
          $db_zeile -> execute();
          $NEUEVAR = $db_zeile->fetchAll();

          foreach ($NEUEVAR as $wert) {

            $slider_id = utf8_encode($wert["id"]);
            $slider_size = utf8_encode($wert["size"]);
            $slider_row = utf8_encode($wert["row"]);

            $itemNum = 1;

        ?>

        <div class="Slider" data-size="<?php echo $slider_size; ?>" style="order:<?php echo $slider_row ?>;">

          <?php

            $db_zeile2 = $db -> prepare("SELECT * FROM item WHERE slider_id = '$slider_id'");
            $db_zeile2 -> execute();
            $NEUEVAR2 = $db_zeile2->fetchAll();

            foreach ($NEUEVAR2 as $wert2) {

              $item_link = utf8_encode($wert2["link"]);
              $item_tag = utf8_encode($wert2["tag"]);
              $item_titel = utf8_encode($wert2["titel"]);
              $item_text = utf8_encode($wert2["text"]);

          ?>

            <div class="Item"><div class="ItemInner">
              <?php echo $slider_id." / ".$itemNum++ ?>
              <br><br>
              <?php echo $item_tag." / ".$item_titel." / ".$item_text ?>
            </div></div>

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
