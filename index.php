<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/php/php_functions/db.php"); ?>
  <?php include('resources/php/php_functions/functions.php'); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/php_functions.css">
  </head>
  <body>

    <?php include("resources/php/db.php"); ?>

    <!-- <img class="BodyBg" id="Bg"> -->

    <div class="Frame" id="Frame">

      <div class="Nav">
        <p class="Logo"><span class="Block"></span>IT-Infotafel</p>

        <p class="dateandtime" id="dateandtime"></p>

      </div>

      <!-- <span class="preloader" id="preloader"><i class="icon-spinner9"></i></span> -->





      <!-- PAGE-CONTENT -->
      <div class="Content" id="Content">



        <!-- <div class="Preloader">
          <span id="preloader"><i class="icon-spinner2 loader"></i><i class="icon-hipster2 middle"></i></span>
        </div> -->


        <div class="BigSite">
          <!-- <iframe src="http://localhost/arklifenet/mediadrake/"></iframe> -->


          <?php
          // foreach (db_select_all_from("user") as $wert) {
          //
          //   echo utf8_encode($wert["username"]);?><br><br><?php
          //   echo utf8_encode($wert["password"]);?><br><br><?php
          //   echo utf8_encode($wert["var"]);?><br><br><?php
          //
          // }



          start_global_session("askylan");


          // db_update_table();







          // echo login("RedDrake","4321");

          ?>












          <div class="RegistForm" id="RegistForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-user-plus"></i>
            </div>
            <i id="registLoader" class="icon-spinner8"></i>
            <p class="massage registOutput_All"></p>
            <input id="registInput_Username" type="text" spellcheck="false" value="pskylan" placeholder="Username">
            <p class="massage registOutput_Username"></p>
            <input id="registInput_Passwort1" type="password" spellcheck="false" value="1234" placeholder="Passwort">
            <input id="registInput_Passwort2" type="password" spellcheck="false" value="1234" placeholder="Passwort wiederholen">
            <p class="massage registOutput_Passwort"></p>
            <input id="registInput_Steam" type="text" spellcheck="false" value="2389745802" placeholder="Steam64-ID">
            <p class="massage registOutput_Steam"></p>
            <input id="registInput_Discord" type="text" spellcheck="false" value="84567233426787654" placeholder="Discord-Name & Tag">
            <p class="massage registOutput_Discord"></p>
            <input id="registInput_Email" type="text" spellcheck="false" value="maxmerkl.drive@gmail.com" placeholder="Email">
            <p class="massage registOutput_Email"></p>
            <label class="container">Ich habe die Regeln von ARK-LIFE.NET gelesen und stimme diesen zu.
              <input type="checkbox" checked id="registInput_Rules">
              <span class="checkmark"></span>
            </label>
            <div class="ButtonBox">
              <button onclick="" type="button" name="button"><i class="icon-arrow-left4"></i></button>
              <button onclick="sendRegist()" type="button">Weiter<i class="icon-arrow-right4"></i></button>
            </div>
          </div>






        </div>


        <?php include ('resources/blueprints/sliders.php.php'); ?>








    </div>

    <!-- Sriptgedöns -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/nav.js"></script>
    <script src="resources/js/slick.min.js"></script>
    <script src="resources/js/slick.conf.js"></script>
    <script src="resources/js/marquee.js"></script>
    <script src="resources/js/script.js"></script>
    <script src="resources/php/php_functions/php_action.js"></script>

  </body>
</html>
