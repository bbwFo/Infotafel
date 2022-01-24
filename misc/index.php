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









          <div class="map_app">



            <?php


              // function db_select_all_from($TABELLE){
              //
              //   include ('resources/php/db.php');
              //
              //   $zeile = $db -> prepare("SELECT * FROM $TABELLE");
              //   $zeile -> execute();
              //   $result = $zeile -> fetchAll();
              //
              //   return $result;
              // }



              // foreach (db_select_all_from("map") as $wert)
              // {
              //   $map = utf8_encode($wert["map_save"]);
              // }

              $x1 = 1; $y1 = 1; $x2 = 1; $y2 = 1; $i = 1; $counter = 1; $lar = 50;


            ?>


            <div class="map_frame">
              <div class="map" id="map">
              <?php
                // if (isset($map)) {
                //
                //   foreach (db_select_all_from("map") as $wert)
                //   {
                //     $map = utf8_encode($wert["map_save"]);
                //     echo $map;
                //   }
                //
                // }
                // else {


                  do {
                    do {



                      ?>
                        <div class="map_mark" data-map="<?php echo $counter ?>" style="grid-area: <?php echo $x1 ?>/<?php echo $x2 ?>/<?php echo $y1 ?>/<?php echo $y2 ?>;">

                        </div>
                      <?php

                      $counter++;

                      $x2++; $y2++; $i++;

                    } while ($i <= $lar);

                    $x1++; $y1++; $x2 = 1; $y2 = 1; $i = 1;

                  } while ($counter <= ($lar * $lar));


                // }
              ?>
              </div>

            </div>


            <div class="map_settings">


              Karte Auswählen

              <select class="" name="" id="colorSelect">
                <option value="map_BLUE" selected>Valguero</option>
                <option value="map_RED">map2</option>
              </select>

              <br>




              Farbe
              <br>
              <div class="map_settings_radios">
                <div class="radio">
                  <input id="radio-1" name="radio" type="radio" checked>
                  <label for="radio-1" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-2" name="radio" type="radio">
                  <label  for="radio-2" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-3" name="radio" type="radio">
                  <label  for="radio-3" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-4" name="radio" type="radio">
                  <label  for="radio-4" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>


              </div>


              <br>



              Farbe
              <br>
              <div class="map_settings_radios">
                <div class="radio">
                  <input id="radio-1" name="radio" type="radio" checked>
                  <label for="radio-1" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-2" name="radio" type="radio">
                  <label  for="radio-2" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-3" name="radio" type="radio">
                  <label  for="radio-3" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-4" name="radio" type="radio">
                  <label  for="radio-4" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>


              </div>



              <br>



              Farbe
              <br>
              <div class="map_settings_radios">
                <div class="radio">
                  <input id="radio-1" name="radio" type="radio" checked>
                  <label for="radio-1" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-2" name="radio" type="radio">
                  <label  for="radio-2" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-3" name="radio" type="radio">
                  <label  for="radio-3" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-4" name="radio" type="radio">
                  <label  for="radio-4" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>

                <div class="radio">
                  <input id="radio-5" name="radio" type="radio">
                  <label  for="radio-5" class="radio-label"></label>
                </div>


              </div>


              Farbe

              <select class="" name="" id="colorSelect">
                <option value="map_BLUE" selected>Blau</option>
                <option value="map_RED">Rot</option>
                <option value="map_GREEN">Grün</option>
                <option value="map_TEST">ADMIN</option>
                <option value="map_CUNSTRUCTION">ONBUILD</option>
              </select>

              <br>

              Textur

              <select class="" name="" id="textureSelect">
                <option value="map_BLUE" selected>Keine</option>
                <option value="map_RED">Liniert</option>

              </select>

              <br>

              Icon
              <select class="" name="" id="pinSelect">
                <option value="home" selected>&#xf29c;</option>
                <option value="location_pin">&#xebd7;</option>
                <option value="person_pin_circle">&#xefef;</option>
                <option value="not_listed_location">&#xf29c;</option>
                <option value="close">&#xecdb;</option>
                <option value="onbuild">&#xe918;</option>
              </select>


              <br>

              <div class="colorPiker">
                <input type="color" name="" value="">
              </div>


              <br>




              <button type="button" name="button" onclick="saveMap()">Auf Karte Speichern</button>

            </div>
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
