<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/php/php_functions/db.php"); ?>
  <?php include('resources/php/php_functions/functions.php'); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
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


          // db_update_table();

          ?>



          <div class="LoginForm" id="LoginForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <!-- <i class="icon-login1"></i> -->
            </div>
            <p id="loginOutput"></p>
            <input id="loginInput1" type="text" value="" placeholder="Username">
            <input id="loginInput2" type="password" value="" placeholder="Passwort">
            <button onclick="sendLogin()" type="button" name="button">Einloggen<i class="icon-arrow-right4"></i></button>
          </div>






          <div class="VerifyForm" id="VerifyForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-key"></i>
            </div>
            <p class="info_massage">Deinen Verify-Code bekommst du bei einem unserer Team-Mitglider im Support unseres Discord-Servers.</p>
            <p class="massage" id="verifyOutput_All"></p>
            <input id="verifyInput_Username" type="text" value="" placeholder="Username">
            <p class="massage" id="verifyOutput_Username"></p>
            <input id="verifyInput_Code" type="text" value="" placeholder="Verify-Code">
            <p class="massage" id="verifyOutput_Code"></p>
            <button onclick="sendVerify()" type="button" name="button">Account Verifizieren<i class="icon-arrow-right4"></i></button>
          </div>






          <div class="RegistForm" id="RegistForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-user-add"></i>
            </div>
            <p class="massage" id="registOutput_All"></p>
            <input id="registInput_Username" type="text" value="" placeholder="Username">
            <p class="massage" id="registOutput_Username"></p>
            <input id="registInput_Passwort1" type="password" value="" placeholder="Passwort">
            <input id="registInput_Passwort2" type="password" value="" placeholder="Passwort wiederholen">
            <p class="massage" id="registOutput_Passwort"></p>
            <input id="registInput_Email" type="text" value="" placeholder="Email">
            <p class="massage" id="registOutput_Email"></p>
            <button onclick="sendRegist()" type="button" name="button">Registrieren<i class="icon-arrow-right4"></i></button>
          </div>




          <?php




          // echo login("RedDrake","4321");

          ?><br><br><?php

          // echo regist("RedDrake1337","4321","reddke@gmail.com");

          ?><br><br><?php

          // echo verify("RedDrake1337","3784-5908-4007");

          // echo regist_mail("askylan");

          // if (login("askylan","1234") == 1) {
          //   echo "string";
          // }

          ?>

          <br><br><br>








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
