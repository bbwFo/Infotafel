<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
  </head>
  <body>
    <?php include("resources/php/db.php"); ?>



    <?php


      $counter = 1;

    ?>

    <div class="Content">

      <div class="Content-Area-1" id="Content-Area-1">
        <div class="Area_Item Area_Item_A">
          <div class="Area_Item_Innerframe">
            <div class="Area_Item_Innerframe_Item" id="frame1">
              1
            </div>
            <div class="Area_Item_Innerframe_Item" id="frame2">
              2
            </div>
          </div>
        </div>
        <div class="Area_Item Area_Item_B"></div>
      </div>

      <div class="Content-Area-2" id="Content-Area-2">
        <div class="Area_Item Area_Item_A">




          <div class="map">

            <?php

              $x1 = 1; $y1 = 1;
              $x2 = 1; $y2 = 1;

              $i = 1;
              $counter = 1;

              do
              {
                do {

                  ?>
                    <div class="map_mark" style="grid-area: <?php echo $x1 ?>/<?php echo $x2 ?>/<?php echo $y1 ?>/<?php echo $y2 ?>;">
                      <!-- <?php echo $counter ?> -->

                      <i class="icon-voicemail1"></i>
                    </div>
                  <?php

                  $x2++; $y2++;

                  $i++;
                  $counter++;

                } while ($i <= 10);

                $x1++; $y1++;
                $x2 = 1; $y2 = 1;

                $i = 1;

              } while ($counter <= 100);
            ?>

          </div>



        </div>
      </div>

      <div class="Content-Area-3" id="Content-Area-3">
        <div class="Area_Item Area_Item_A"></div>
        <div class="Area_Item Area_Item_B"></div>
        <div class="Area_Item Area_Item_C"></div>
      </div>

      <div class="Content-Area-4" id="Content-Area-4">
        <div class="Area_Item Area_Item_A"></div>
        <div class="Area_Item Area_Item_B"></div>
      </div>

    </div>








    <!-- Scriptgedöns -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/content-manager.js"></script>
    <script src="resources/js/nav.js"></script>
    <script src="resources/js/script.js"></script>

  </body>
</html>
